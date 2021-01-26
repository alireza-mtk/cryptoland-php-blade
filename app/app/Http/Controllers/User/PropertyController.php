<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Property;
use App\Feature;
use App\PropertyImageGallery;
use Carbon\Carbon;
use Toastr;
use Auth;
use File;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()
            ->withCount('comments')
            ->where('agent_id', Auth::id())
            ->paginate(env("PAGINATION_COUNT", 10));

        return view('agent.properties.index', compact('properties'));
    }

    public function create()
    {
        $features = Feature::all();

        return view('agent.properties.create', compact('features'));
    }


    public function store(Request $request)
    {


        $request->validate([

            'title'     => 'required|max:255',
            'address'     => 'required',
            'alley'   => 'required|int',
            'neighborhood_id'   => 'required|int',
            'portion_number'      => 'required|int',
            'seller_name'   => 'required',
            'seller_phone_number'  => 'required',
            'area'      => 'required|int',
            'price'   => 'required|int',
            'bedroom'      => 'required|int',
            'deed'      => 'required',
            'purpose'      => 'required',
            'property_type'     => 'required',
            'description'        => 'required',
            'status'        => 'required',
            'purpose'        => 'required',
            "gallaryimage[]" => 'image|mimes:jpeg,jpg,png',

        ]);


        $property = new Property();
        $property->agent_id = Auth::id();
        $property->title    = $request->title;
        $property->price    = $request->price;
        $property->purpose  = $request->purpose;
        $property->bedroom  = $request->bedroom;
        $property->address  = $request->address;
        $property->seller_name  = $request->seller_name;
        $property->seller_phone_number  = $request->seller_phone_number;
        $property->alley  = $request->alley;
        $property->area     = $request->area;
        $property->neighborhood_id     = $request->neighborhood_id;
        $property->description        = $request->description;
        $property->property_type        = $request->property_type;
        $property->portion_number        = $request->portion_number;

        if (isset($request->featured)) {
            $property->featured = $request->featured;
        }
        if (isset($request->status)) {
            $property->status = $request->status;
        }
        if (isset($request->deed)) {
            $property->deed = $request->deed;
        }

        // Just for testing purposes
        $property->neighborhood_id     = $request->neighborhood_id;

        $features = array_filter($request->features, fn($value) => !is_null($value) && $value !== '');

        $property->save();

    
        // attaching the features
        $property->features()->attach($features);

        $gallary = $request->file('gallaryimage');

        if ($gallary) {
            foreach ($gallary as $images) {
                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                $galimage['size'] = $images->getClientSize();
                $galimage['property_id'] = $property->id;

                if (!Storage::disk('public')->exists('property/gallery')) {
                    Storage::disk('public')->makeDirectory('property/gallery');
                }
                $propertyimage = Image::make($images)->stream();
                Storage::disk('public')->put('property/gallery/' . $galimage['name'], $propertyimage);

                $property->gallery()->create($galimage);
            }
        }

        Toastr::success('message', 'Property created successfully.');
        return redirect()->route('agent.properties.index');
    }


    public function edit(Property $property)
    {
        return redirect()->route('agent.properties.index');
    }


    public function update(Request $request, $property)
    {
        
        return redirect()->route('agent.properties.index');
    }

    public function destroy(Property $property)
    {
        return redirect()->route('agent.properties.index');
    }

    // DELETE GALERY IMAGE ON EDIT
    public function galleryImageDelete(Request $request)
    {

        $gallaryimg = PropertyImageGallery::find($request->id)->delete();

        if (Storage::disk('public')->exists('property/gallery/' . $request->image)) {
            Storage::disk('public')->delete('property/gallery/' . $request->image);
        }

        if ($request->ajax()) {

            return response()->json(['msg' => true]);
        }
    }
}
