<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Brian2694\Toastr\Facades\Toastr;

class JobCategoryController extends Controller
{
    public function index()
    {
        $jobcategories = JobCategory::latest()->paginate(env("PAGINATION_COUNT", 10));
        return view('admin.jobcategories.index', compact('jobcategories'));
    }


    public function create()
    {
        return view('admin.jobcategories.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:job_categories|max:255',
            'job_group_id' => 'required|int',
        ]);

        $category = new JobCategory();
        $category->name = $request->name;
        $category->job_group_id = $request->job_group_id;

        $category->save();

        Toastr::success('message', 'Job Category created successfully.');
        return redirect()->route('admin.jobcategories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $jobcategory = JobCategory::find($id);
        return view('admin.jobcategories.edit', compact('jobcategory'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:job_categories|max:255',
            'job_group_id' => 'required|int',
        ]);

        $category = JobCategory::find($id);
        $category->name = $request->name;
        $category->job_group_id = $request->job_group_id;
        $category->save();

        Toastr::success('message', 'Job Category updated successfully.');
        return redirect()->route('admin.jobcategories.index');
    }


    public function destroy($id)
    {
        $category = JobCategory::find($id);
        $category->delete();

        Toastr::success('message', 'Job Category deleted successfully.');
        return back();
    }
}
