<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ViewController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('users.detail', compact('product'));
    }
}
