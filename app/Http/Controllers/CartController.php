<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function addToCart($id)
    {
        $book = Book::findOrFail($id);


        $cart = session()->get('cart', []);


        if (isset($cart[$id])) {
            return redirect()->back()->with('success', 'Ce livre existe dèja dans le panier');
        } else {

            $cart[$id] = $book->toArray();
            $cart[$id]['quantity'] = 1;
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Livre ajouté au panier !');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function show()
    {

        return view('user.cart');
    }
    public function clear(){
        session(['cart' => []]);
        return redirect()->back()->with('success', 'Panier vidé avec succès !');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function increment($id)
    {
        $cart = session()->get('cart', []);


        if (isset($cart[$id])) {
            $quantity = $cart[$id]['quantity'];
            $book_quantity = Book::find($id)->stock;
            if($quantity < $book_quantity){

                $cart[$id]['quantity']++;
                session(['cart' => $cart]);
            }

            return redirect()->back();
        }


        return redirect()->back()->with('success', 'Livre ajouté au panier !');
    }
    public function decrement($id)
    {
        $cart = session()->get('cart', []);


        if (isset($cart[$id])) {

            $quantity = $cart[$id]['quantity'];

            if($quantity -1 != 0){

                $cart[$id]['quantity']--;
                session(['cart' => $cart]);
            }

            return redirect()->back();
        }


        return redirect()->back()->with('success', 'Livre ajouté au panier !');
    }
    public function removeFromCard($id)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);

            session(['cart' => $cart]);
        }
        return redirect()->back()->with('success', 'Livre supprimé du panier.');
    }

}
