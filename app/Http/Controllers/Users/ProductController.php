<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index() {
        // Lấy danh sách sản phẩm từ cơ sở dữ liệu
        $listProduct = Product::all();

        // Truyền biến $listProduct sang view
        return view('users.shop', compact('listProduct'));
    }

//    public function create()
//    {
//        $categories = Category::all();
//
//
//        return view('admin.products.addProduct',compact('categories'));
//    }
//
//    public function store(Request $request)
//    {
//        // Validate the request data
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'price' => 'required|numeric',
////            'description' => 'required|string',
//            'category_id' => 'required|exists:categories,id',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif |max:2048',
//        ]);
//
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//
//
//        if ($request->hasFile('image')) {
//            $file = $request->file('image');
//            $newName = time() . '.' . $file->getClientOriginalExtension();
//            $file->move(public_path('imageProduct'), $newName);
//            $linkImage = 'imageProduct/' . $newName;
//        } else {
//            $linkImage = null;
//        }
//
//        $product = new Product();
//        $product->name = $request->name;
//        $product->price = $request->price;
////        $product->price = $request->description;
//        $product->images = $linkImage;
//        $product->category_id = $request->input('category_id');
//        $product->save();
//        return redirect()->route('admin.products.listProduct')->with('error', 'Product added successfully');
//    }
//
//
//    public function edit($id)
//    {
//
//        $product = Product::findOrFail($id);
//        $categories = Category::all();
//        if (!$product) {
//            return redirect()->route('admin.products.listProduct')->with('error', 'Product not found');
//        }
//        return view('admin.products.update', compact('product','categories'));
//    }
//
//    public function update(Request $request, $id)
//    {
//        // Validate the request data
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:255',
//            'price' => 'required|numeric',
//            'description' => 'required|string',
//            'category_id' => 'required|exists:categories,id',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
//        ]);
//
//        // Check if validation fails
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
//
//        // Find the product by id
//        $product = Product::find($id);
//
//        if (!$product) {
//            return redirect()->back()->with('error', 'Product not found');
//        }
//
//        // Update product details
//        $product->name = $request->input('name');
//        $product->price = $request->input('price');
//        $product->description = $request->input('description');
//        $product->category_id = $request->input('category_id');
//
//        // Handle image upload
//        if ($request->hasFile('image')) {
//            // Delete old image if exists
//            if ($product->images && file_exists(public_path($product->images))) {
//                unlink(public_path($product->images));
//            }
//
//            // Upload new image
//            $image = $request->file('image');
//            $imageName = time() . '.' . $image->extension();
//            $image->move(public_path('images'), $imageName);
//            $product->images = 'images/' . $imageName;
//        }
//
//        // Save the updated product
//        if ($product->save()) {
//            return redirect()->route('admin.products.listProduct')->with('success', 'Product updated successfully');
//        } else {
//            return redirect()->back()->with('error', 'Failed to update product');
//        }
//    }
//
//
//    public function delete($id)
//    {
//        $product = Product::find($id);
//
//        if ($product) {
//            $product->delete();
//            return redirect()->route('admin.products.listProduct')->with('success', 'Product deleted successfully');
//        } else {
//            return redirect()->route('admin.products.listProduct')->with('error', 'Product not found');
//        }
//    }

}
