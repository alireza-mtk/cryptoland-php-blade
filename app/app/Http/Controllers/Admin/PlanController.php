<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Brian2694\Toastr\Facades\Toastr;

class PlanController extends Controller
{
    
    public function index()
    {
        $plans = Plan::latest()->paginate(env("PAGINATION_COUNT", 10));
        return view('admin.plans.index', compact('plans'));
    }


    public function create()
    {
        return view('admin.plans.create');
    }


    public function store(Request $request)
    {

        
        $request->validate([
            'name' => 'required|unique:tags|max:255',
            'duration' => 'required|int',
            'price' => 'required|int',
        ]);

        $tag = new Plan();
        $tag->name = $request->name;
        $tag->price = $request->price;
        $tag->duration = $request->duration;
        $tag->save();

        Toastr::success('message', 'Plan created successfully.');
        return redirect()->route('admin.plans.index');
    }


    // public function show($id)
    // {
    //     //
    // }


    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('admin.plans.edit', compact('plan'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $plan = Plan::find($id);
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->duration = $request->duration;
        $plan->save();

        Toastr::success('message', 'Plan updated successfully.');
        return redirect()->route('admin.plans.index');
    }


    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan->delete();

        Toastr::success('message', 'Plan deleted successfully.');
        return back();
    }
}
