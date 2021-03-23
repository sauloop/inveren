<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Category::class);

        $title = "Listado categorías";

        $categories = Category::all();

        return view('categories.index', compact('title', 'categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);

        $title = 'Nueva categoría';

        $category = new Category();

        return view('categories.create', compact('title', 'category'));
    }

    public function store(CreateCategoryRequest $request)
    {
        $this->authorize('create', Category::class);

        $request->createCategory();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return redirect()->route('categories.index');
    }
}
