<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use App\Feature;
use App\PropertyImageGallery;
use App\Comment;
use App\Neighborhood;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
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
            ->paginate(env("PAGINATION_COUNT", 10));

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $neighborhoods = Neighborhood::all();
        return view('admin.properties.create', ['neighborhoods' => $neighborhoods->all()]);
    }


    public function store(Request $request)
    {
        $request->validate([

            'title'     => 'required|max:255',
            'address'     => 'required',
            'alley'   => 'required|int',
            'neighborhood_id'   => 'required|int',
            'portion_number'      => 'required|int',
            'area'      => 'required|int',
            'price'   => 'required|int',
            'bedroom'      => 'required|int',
            'seller_name'      => 'required',
            'seller_phone_number'      => 'required',
            'deed'      => 'required',
            'purpose'      => 'required',
            'property_type'     => 'required',
            'description'        => 'required',
            'status'        => 'required',
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
            $property->featured = 1;
        }
        if (isset($request->status)) {
            $property->status = $request->status;
        }
        if (isset($request->deed)) {
            $property->deed = $request->deed;
        }

        // Just for testing purposes
        $property->neighborhood_id     = $request->neighborhood_id;



        $property->save();

        
        // attaching the features
        $property->features()->attach($request->features);

        // $property->neiborhood()->attach($request->neighborhood);
        $gallary = $request->file('gallaryimage');
        if ($gallary) {

            foreach ($gallary as $images) {

                // dd("images exists", $images);

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
        return redirect()->route('admin.properties.index');
    }


    public function show(Property $property)
    {
        return view("admin.properties.index");
    }


    public function edit(Property $property)
    {
        $property = Property::find($property->id);
        $neighborhoods = Neighborhood::all();

        return view('admin.properties.edit', [
            'neighborhoods' => $neighborhoods->all(),
            'property' => $property,
        ]);
    }


    public function update(Request $request)

    {
        $request->validate([

            'title'     => 'required|max:255',
            'address'     => 'required',
            'alley'   => 'required|int',
            'neighborhood_id'   => 'required|int',
            'portion_number'      => 'required|int',
            'area'      => 'required|int',
            'price'   => 'required|int',
            'bedroom'      => 'required|int',
            'deed'      => 'required|boolean',
            'purpose'      => 'required',
            'seller_name'      => 'required',
            'seller_phone_number'      => 'required',
            'property_type'     => 'required',
            'description'        => 'required',
            'status'        => 'required',
            "gallaryimage[]" => 'image|mimes:jpeg,jpg,png',

        ]);

        $property = Property::find($request->id);
        $property->title    = $request->title;
        $property->price    = $request->price;
        $property->purpose  = $request->purpose;
        $property->bedroom  = $request->bedroom;
        $property->address  = $request->address;
        $property->alley  = $request->alley;
        $property->area     = $request->area;
        $property->neighborhood_id     = $request->neighborhood_id;
        $property->description        = $request->description;
        $property->property_type        = $request->property_type;
        $property->portion_number        = $request->portion_number;
        $property->neighborhood_id     = $request->neighborhood_id;

        if (isset($request->featured)) {
            $property->featured = 1;
        }
        if (isset($request->status)) {
            $property->status = $request->status;
        }
        if (isset($request->deed)) {
            $property->deed = $request->deed;
        }



        $property->save();

        // sync the features
        $property->features()->sync($request->features);
        
        $gallary = $request->file('gallaryimage');
        if ($gallary) {

            //deleting the gallery for this item
            $this->propertyGalleryImageDelete($property->id);

            //refilling the gallery with new items
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

        Toastr::success('message', 'Property updated successfully.');
        return redirect()->route('admin.properties.index');
    }

    public function destroy(Property $property)
    {
        $property = Property::find($property->id);

        if (Storage::disk('public')->exists('property/' . $property->image)) {
            Storage::disk('public')->delete('property/' . $property->image);
        }
        if (Storage::disk('public')->exists('property/' . $property->floor_plan)) {
            Storage::disk('public')->delete('property/' . $property->floor_plan);
        }

        $property->delete();

        //deleting the gallery
        $this->propertyGalleryImageDelete($property->id);

        $property->comments()->delete();

        Toastr::success('message', 'Property deleted successfully.');
        return back();
    }


    public function propertyGalleryImageDelete($id)
    {
        //getting the items
        $gallaryimg = PropertyImageGallery::where("property_id", $id)->get();

        //deleting the items
        foreach ($gallaryimg as $item) {

            //deleting the files
            if (Storage::disk('public')->exists('property/gallery/' . $item->image)) {
                Storage::disk('public')->delete('property/gallery/' . $item->image);
            }

            //deletting the items
            PropertyImageGallery::destroy($item->id);
        }
    }
}
