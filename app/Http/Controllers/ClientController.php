<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Commande;
use App\Models\CommandeLivre;
use Carbon\Carbon;
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
        Carbon::setLocale('fr');
        $commandes = Commande::all()->where('user_id', '=', auth()->user()->id);

        return view('user.commands',
        [
            'commands' => $commandes
        ]
        );
    }
    public function commandDetails(Commande $commande)
    {
        Carbon::setLocale('fr');
        return view('user.show-command-details', [
            'commande' => $commande
        ]);
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
        $total_amount = 0;
        foreach ($data as $command) {
            $total_amount += $command['quantity'] * $command['price'];
        }
        $commande = new Commande();
        $commande->total_amount = $total_amount;
        $commande->user_id = auth()->user()->id;
        $commande->save();
        foreach ($data as $command) {
            $commande_livre = new CommandeLivre();
            $commande_livre->commande_id = $commande->id;
            $commande_livre->quantity = $command['quantity'];
            $commande_livre->book_id = $command['id'];
            $commande_livre->unit_price = $command['price'];
            $commande_livre->save();
        }
        session(['cart' => []]);


        return redirect()->back()->with('success', 'commande passée avec succès !');
    }
}
