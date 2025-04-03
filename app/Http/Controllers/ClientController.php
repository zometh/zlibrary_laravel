<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
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
    }
    public function userCommands()
    {
        return view('user.commands');
    }
    public function commandDetails()
    {
        return view('user.show-command-details');
    }
    public function userProfil()
    {
        return view('user.profil');
    }
    public function cart(){
        return view('user.cart');
    }
    public function execCommand()
    {
        $data = session('cart');
        $data = [];
        session(['cart' => $data]);
        return redirect()->back()->with('success', 'commande passée avec succès !');
    }
}
