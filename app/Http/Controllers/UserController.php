<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function shop(Request $request)
    {

        $page = 12;
        $query = $request->input('query');

        $listProduct = Product::where('id', 'like', "%{$query}%")
            ->orWhere('name', 'like', "%{$query}%")
            ->orWhere('price', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate($page);

        return view('users.shop', compact('listProduct'));
    }
}
