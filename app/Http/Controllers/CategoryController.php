<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index(Request $request){

        $categories = Category::get();

        return view('admin.category.index', compact('categories'));
    }

    public function create(Request $request){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.category.index');
    }

    public function delete($id){
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
