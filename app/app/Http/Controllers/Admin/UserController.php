<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Support\Facades\Hash;
use App\Feature;
use App\PropertyImageGallery;
use App\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;
use Auth;
use File;

class UserController extends Controller
{

    public function index()
    {

        $users = User::where("role_id", 2)->paginate(env("PAGINATION_COUNT", 10));
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'username'     => 'required|unique:users',
            'email'   => 'required|unique:users',
            'phone_number' => 'required|unique:users|min:11|max:11',
            'about'   => 'required',
            'password' => 'required|confirmed|min:6',
            'address'   => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');

        if (isset($image)) {
            $currentDate = Carbon::now()->getTimestamp();
            $imagename = $currentDate . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('agent')) {
                Storage::disk('public')->makeDirectory('agent');
            }
            $propertyimage = Image::make($image)->stream();
            Storage::disk('public')->put('agent/' . $imagename, $propertyimage);
        } else {
            $imagename = 'default.png';
        }


        $agent = new User();
        $agent->name    = $request->name;
        $agent->username = $request->username;
        $agent->role_id = 2;
        $agent->email    = $request->email;
        $agent->about    = $request->about;
        $agent->password = Hash::make($request->password);
        $agent->phone_number    = $request->phone_number;
        $agent->address     = $request->address;
        $agent->image    = $imagename;

        $agent->save();


        Toastr::success('message', 'Property created successfully.');
        return redirect()->route('admin.agents');
    }


    public function show($id)
    {
        $user = User::find($id)->where("role_id" , 2)->first();
        return view('admin.users.edit', compact('user'));
    }


    public function edit(Property $property)
    {
        return "edit";
        
        $features = Feature::all();
        $property = Property::find($property->id);

        $videoembed = $this->convertYoutube($property->video);

        return view('admin.properties.edit');
    }


    public function update(Request $request, $id)
    {

        return "update";
        $request->validate([
            'name'     => 'required|max:255',
            'about'   => 'required',
            'address'   => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $agent = User::findOrFail($id);

        $image = $request->file('image');

        if (isset($image)) {
            $currentDate = Carbon::now()->getTimestamp();
            $imagename = $currentDate . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('agent')) {
                Storage::disk('public')->makeDirectory('agent');
            }
            $propertyimage = Image::make($image)->stream();
            // Delete previous image
            if (Storage::disk('public')->exists('agent/' . $agent->image)) {
                Storage::disk('public')->delete('agent/' . $agent->image);
            }
            Storage::disk('public')->put('agent/' . $imagename, $propertyimage);
        }



        $agent->name        = $request->name;
        $agent->about         = $request->about;
        $agent->address        = $request->address;
        if (isset($image))
            $agent->image      = $imagename;
        $agent->save();


        Toastr::success('message', 'Agent updated successfully.');
        return redirect()->route('adminshowagent');
    }


    public function destroy(User $user)
    {

        $theAgent = User::find($agent->id);
        if (Storage::disk('public')->exists('agent/' . $theAgent->image)) {
            Storage::disk('public')->delete('agent/' . $theAgent->image);
        }
        $theAgent->delete();
        Toastr::success('message', 'Agent deleted successfully.');
        return back();
    }


    public function galleryImageDelete(Request $request)
    {

        $gallaryimg = PropertyImageGallery::find($request->id)->delete();

        if (Storage::disk('public')->exists('property/gallery/' . $request->image)) {
            Storage::disk('public')->delete('property/gallery/' . $request->image);
        }

        if ($request->ajax()) {

            return response()->json(['msg' => $gallaryimg]);
        }
    }

}
