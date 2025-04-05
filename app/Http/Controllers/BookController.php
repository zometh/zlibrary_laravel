<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Commande;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        Carbon::setLocale('fr');
        $user = auth()->user();
        $current_date = now()->toDateString();
        $nb_commande = Commande::whereDate('created_at', $current_date)->count();
        $total_montant = (int)Commande::whereDate('created_at', now()->toDateString())->sum('total_amount');
        $validated_command = Commande::where('statut', '=', 'expédiée')->count();
        $clients = \App\Models\User::all();
        $nb_client = 0;
        $recent_commands = Commande::all();
        foreach ($clients as $client) {
            if($client->hasRole('user')){
                $nb_client++;
            }
        }

        return view('admin.index',
        [
        'connected_user' => $user,

            'daily_commande' => $nb_commande,
            'daily_amount' => $total_montant,
            'validated_command' => $validated_command,
            'nb_client' => $nb_client,
            'recent_commands' => $recent_commands
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create',
        [
            'categories' => $categories
        ]
        );
        //
    }

    public function getAll()
    {
        $books = Book::all();
        $user = auth()->user();
        return view('admin.books.books',
        [
            'books' => $books,
            'connected_user' => $user
        ]
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BooksRequest $request)
    {


        $datas = $request->validated();

        /** @var UploadedFile $image */
        $image = $request->validated('image');
        $datas['image'] =  $image->store('books','public');
        Book::create($datas);


        return redirect()->route('books.all')
            ->with('success', 'Livre ajouté !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('user.show-book',
        [
            'book' => $book
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('admin.books.create', [
            'book' => $book,
            'categories' => $categories

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BooksRequest $request, Book $book)
    {
        $datas = $request->validated();

        /** @var UploadedFile $image */
        $image = $request->validated('image');
        $datas['image'] =  $image->store('books','public');

        $this->removeFile($book->image);
        $book->update($datas);

        return redirect()->route('books.all')
            ->with('success', 'Livre modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $this->removeFile($book->image);
        $book->delete();
        return redirect()->route('books.all')
            ->with(['success' => 'Livre supprimé !',

                ]);
    }
    function removeFile(string $file){
        $path = 'public/'.$file;
        if(Storage::exists($path)){


            Storage::delete($path);


        }
    }
}
