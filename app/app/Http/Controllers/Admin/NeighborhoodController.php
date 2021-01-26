<?php

namespace App\Http\Controllers\Admin;

use App\Neighborhood;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;

class NeighborhoodController extends Controller
{
    public function index()
    {
        $neighborhoods = Neighborhood::latest()->paginate(env("PAGINATION_COUNT", 10));

        return view('admin.neighborhoods.index', compact('neighborhoods'));
    }


    public function create()
    {
        return view('admin.neighborhoods.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:neighborhoods|max:255',
            'image' => 'required|mimes:jpeg,jpg,png,gif',

        ]);


        $image = $request->file('image');

        if (isset($image)) {
            $currentDate = Carbon::now()->getTimestamp();
            $imagename = $currentDate . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('neighborhood')) {
                Storage::disk('public')->makeDirectory('neighborhood');
            }
            $neighborhood = Image::make($image)->resize(160, 160)->save($imagename);
            Storage::disk('public')->put('neighborhood/' . $imagename, $neighborhood);
        } else {
            $imagename = 'default.png';
        }

        $neighborhood = new Neighborhood();
        $neighborhood->name = $request->name;
        $neighborhood->image = $imagename;
        $neighborhood->save();

        Toastr::success('message', 'Neighborhood created successfully.');
        return redirect()->route('admin.neighborhoods.index');
    }


    public function show($id)
    {
        // return view('admin.neighborhoods.single');
    }


    public function edit($id)
    {


        $neighborhood = Neighborhood::find($id);

        return view('admin.neighborhoods.edit', compact('neighborhood'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif',
        ]);
 
        $neighborhood = Neighborhood::find($id);

        $image = $request->file('image');


        if (isset($image)) {
            $currentDate = Carbon::now()->getTimestamp();
            $imagename = $currentDate . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('neighborhood')) {
                Storage::disk('public')->makeDirectory('neighborhood');
            }
            if (Storage::disk('public')->exists('neighborhood/' . $neighborhood->image)) {
                Storage::disk('public')->delete('neighborhood/' . $neighborhood->image);
            }
            $neighborhoodimg = Image::make($image)->resize(160, 160)->save($imagename);
            Storage::disk('public')->put('neighborhood/' . $imagename, $neighborhoodimg);
        } else {
            $imagename = $neighborhood->image;
        }


        $neighborhood->name = $request->name;
        $neighborhood->image = $imagename;
        $neighborhood->save();

        Toastr::success('message', 'Neighborhood updated successfully.');
        return redirect()->route('admin.neighborhoods.index');
    }


    public function destroy($id)
    {
        $neighborhood = Neighborhood::find($id);

        if (Storage::disk('public')->exists('neighborhood/' . $neighborhood->image)) {
            Storage::disk('public')->delete('neighborhood/' . $neighborhood->image);
        }

        $neighborhood->delete();

        Toastr::success('message', 'Neighborhood deleted successfully.');
        return back();
    }
}
