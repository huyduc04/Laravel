<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function listCategory(Request $request)
    {
        $page = 10;
        $query = $request->input('query');
        $id = $request->input('id');
        $name = $request->input('name');
        $priceMin = $request->input('price_min');
        $priceMax = $request->input('price_max');

        $listCategory = Category::query();

        if ($query) {
            $listCategory->where(function($q) use ($query) {
                $q->where('id', 'like', "%{$query}%")
                    ->orWhere('name', 'like', "%{$query}%");
            });
        }

        if ($name) {
            $listCategory->where('name', 'like', "%{$name}%");
        }

        $listCategory = $listCategory->paginate($page);

        return view('admin.category.listCategory', compact('listCategory'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.category.addCategory',compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('imageCategory'), $newName);
            $linkImage = 'imageCategory/' . $newName;
        } else {
            $linkImage = null;
        }

        // Create new category
        $category = new Category();
        $category->name = $request->input('name');
        $category->images = $linkImage;
        $category->save();

        return redirect()->route('admin.category.listCategory')->with('success', 'Category added successfully');
    }


    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.listCategory')->with('error', 'Category not found');
        }
        return view('admin.category.update', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp,avif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $category->name = $request->input('name');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->images && file_exists(public_path($category->images))) {
                unlink(public_path($category->images));
            }

            // Upload new image
            $images = $request->file('image');
            $imagesName = time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagesName);
            $category->images = 'images/' . $imagesName;
        }

        if ($category->save()) {
            return redirect()->route('admin.category.listCategory')->with('success', 'Category updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update Category');
        }
    }


    public function delete($id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            return redirect()->route('admin.category.listCategory')->with('success', 'Category deleted successfully');
        } else {
            return redirect()->route('admin.category.listCategory')->with('error', 'Category not found');
        }
    }



}
