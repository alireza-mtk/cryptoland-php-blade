<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Toastr;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(env("PAGINATION_COUNT", 10));

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:categories|max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();

        Toastr::success('message', 'Category created successfully.');
        return redirect()->route('admin.categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|max:255',
        ]);

        $category = Category::find($id);
        $category->slug = Str::slug($request->name, '-');
        $category->name = $request->name;
        $category->save();

        Toastr::success('message', 'Category updated successfully.');
        return redirect()->route('admin.categories.index');
    }


    public function destroy($id)
    {
        $category = Category::find($id);

        if (Storage::disk('public')->exists('category/slider/' . $category->image)) {
            Storage::disk('public')->delete('category/slider/' . $category->image);
        }

        if (Storage::disk('public')->exists('category/thumb/' . $category->image)) {
            Storage::disk('public')->delete('category/thumb/' . $category->image);
        }

        $category->delete();
        $category->posts()->detach();

        Toastr::success('message', 'Category deleted successfully.');
        return back();
    }
}
