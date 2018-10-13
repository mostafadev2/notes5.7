<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get()->toArray();
        return view('category.index' , compact('categories'));

    }

    public function create() {
        return view('category.create');

    }

    public function store(Request $request) {
        $validatedData = $request->validate([
                'name' => 'required|unique:categories|max:255'
        ]);
        $category = new Category();
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->save();
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255' . ($request->name != $category->name ? '|unique:categories' : '')
        ]);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect(route('categories.edit', $category))->with('status', 'Category updated!');

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(route('categories.index'))->with('status', 'Category Deleted!');
    }
}

