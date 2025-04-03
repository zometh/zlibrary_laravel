<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Models\Book;
use App\Models\Category;
use App\Models\Role;
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

Route::get('/', function () {
    if(Auth::check()){
        if(auth()->user()->hasRole('admin')){
            $user = auth()->user();
            return view('admin.index', [
                'connected_user' => $user
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



Route::middleware(['auth'])->prefix('/zlibrary')->name('user.')
    ->controller(ClientController::class)
    ->group(function (){
        Route::get('/user-commands', 'userCommands')->name('commands');
        Route::get('/command-details', 'commandDetails')
            ->name('command-details');
        Route::get('/profil', 'userProfil')->name('profil');
        Route::post('/command-confirm', 'execCommand')->name('command-confirm');

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

require __DIR__.'/auth.php';
