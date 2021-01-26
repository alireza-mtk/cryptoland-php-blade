<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use Brian2694\Toastr\Facades\Toastr;

class JobController extends Controller
{
    public function index()
    {

        $jobs = Job::latest()->paginate(env("PAGINATION_COUNT", 10));
        return view('admin.jobs.index', compact('jobs'));
    }


    public function create()
    {
        // return view('admin.jobgroups.create');   
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:job_groups|max:255'
        ]);

        $group = new JobGroup();
        $group->name = $request->name;
        $group->save();

        Toastr::success('message', 'Job Group created successfully.');
        return redirect()->route('admin.jobgroups.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $jobgroup = JobGroup::find($id);
        return view('admin.jobgroups.edit', compact('jobgroup'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|unique:job_groups|max:255'
        ]);

        $group = JobGroup::find($id);
        $group->name = $request->name;
        $group->save();

        Toastr::success('message', 'Job Group updated successfully.');
        return redirect()->route('admin.jobgroups.index');
    }


    public function destroy($id)
    {
        $group = JobGroup::find($id);
        $group->delete();

        Toastr::success('message', 'Job Group deleted successfully.');
        return back();
    }
}
