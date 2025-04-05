<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use App\Models\Category;
use App\Models\Commande;
use App\Models\CommandeLivre;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Carbon::setLocale('fr');
Route::get('/', function () {
    if(Auth::check()){
        if(auth()->user()->hasRole('admin')){
            Carbon::setLocale('fr');
            $user = auth()->user();
            $current_date = now()->toDateString();
            $nb_commande = Commande::whereDate('created_at', $current_date)->count();
            $total_montant = (int)Commande::whereDate('created_at', now()->toDateString())->sum('total_amount');
            $validated_command = Commande::where('statut', '=', 'expédiée')->count();
            $clients = User::all();
            $nb_client = 0;
            $recent_commands = Commande::all();
            foreach ($clients as $client) {
                if($client->hasRole('user')){
                    $nb_client++;
                }
            }
            return view('admin.index', [
                'connected_user' => $user,
                'daily_commande' => $nb_commande,
                'daily_amount' => $total_montant,
                'validated_command' => $validated_command,
                'nb_client' => $nb_client,
                'recent_commands' => $recent_commands
            ]);
        }
        $categories = Category::all();
       $books = Book::paginate(4);
        $auteurs = Book::pluck('author')->unique()->toArray();

        return view('user.index',
        [
            'books' => $books,
            'categories'=> $categories,
            'authors' => $auteurs
        ]
        );
    }else{
        return view('auth.login');
    }

});
// Route pour consulter une facture existante
Route::get('/factures/{commande}', [App\Http\Controllers\FactureController::class, 'show'])
    ->name('factures.show')
    ->middleware('auth');


Route::middleware(['auth'])->prefix('/zlibrary')->name('user.')
    ->controller(ClientController::class)
    ->group(function (){
        Route::get('/user-commands', 'userCommands')->name('commands');
        Route::get('/command-details/{commande}', 'commandDetails')
            ->name('command-details');
        Route::get('/profil', 'userProfil')->name('profil');
        Route::post('/command-confirm', 'execCommand')->name('command-confirm');
        Route::get('/mes-commandes/{commande}/facture', [CommandController::class, 'downloadInvoice'])->name('facture');


    });

Route::middleware(['auth'])->controller(CartController::class)->prefix('cart')->name('cart.')
    ->group(function (){
       Route::post('/add/{book}', 'addToCart')->name('add');
        Route::get('/', 'show')->name('show');
        Route::post('/clear', 'clear')->name('clear');
        Route::delete('/delete/{id}', 'removeFromCard')->name('delete');
        Route::post('/increment/{id}', 'increment')->name('increment');
        Route::post('/decrement/{id}', 'decrement')->name('decrement');

    });

Route::middleware(['auth'])->prefix('/commands')->name('commande.')
    ->controller('App\Http\Controllers\CommandController')
    ->group(function (){
        Route::get('/', 'index')->name('index');
       Route::post('/update-status/{commande}', 'updateStatus')->name('update-status');
    });

Route::middleware(['auth'])->prefix('/books')->name('books.')
    ->controller(BookController::class)
    ->group(function (){
        Route::get('/', 'index')->name('index');
        Route::get('/all', 'getAll')->name('all');
        Route::post('/new', 'store');
        Route::get('/new', 'create')->name('create');
        Route::get('/update/{id}', 'edit')->name('edit');
        Route::post('/update/{book}', 'update')->name('update');
        Route::get('/show/{book}', 'show')->name('show-book');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/admin/commandes', [CommandController::class, 'index'])->name('commandes.index');
    Route::get('/admin/commandes/{commande}', [CommandController::class, 'show'])->name('commandes.show');
    Route::patch('/admin/commandes/{commande}/status', [CommandController::class, 'updateStatus'])->name('commandes.updateStatus');
    Route::get('/admin/paiements', function (){
        return
        view('admin.paiement',
        [
            'paiements' => \App\Models\Paiement::paginate(10)
        ]);
    })->name('paiements');
    Route::get('/admin/users', function (){
        $all = User::all();
        $users = [];
        foreach ($all as $user){
            if($user->hasRole('user')){
                $users[$user->id] = $user;
            }
        }
        Carbon::setLocale('fr');
        return view('admin.client',
        [
            'users' => $users
        ]
        );
    })->name('users');
});


require __DIR__.'/auth.php';
