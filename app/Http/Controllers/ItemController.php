<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getAllProducts(){
        $items = Item::paginate(10);

        return view('user.main', compact('items'));
    }

    public function getProductDetail(Item $item){
        return view('user.detail', compact('item'));
    }
}
