<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCart($id){
        $item = Item::findOrFail($id);
        $cart = new Order();

        $cart->account_id = auth()->user()->id;
        $cart->item_id = $item->id;
        $cart->price = $item->price;

        $cart->save();

        return redirect('home');
    }

    public function displayCart(){
        $user = Auth::user();
        $cartItems = Order::where('account_id', $user->id)->get();

        return view('user.cart', compact('cartItems'));
    }

    public function checkOut(){
        $user = Auth::user();
        Order::where('account_id', $user->id)->delete();

        return redirect()->route('homePage');
    }

    public function deleteCartItem($id){
        $card = Order::where('id', $id)->first();   
        
        $card->delete();

        return redirect()->route('displayCart');
    }
}
