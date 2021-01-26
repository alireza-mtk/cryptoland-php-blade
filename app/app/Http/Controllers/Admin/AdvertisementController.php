<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use App\AdvertisementImageGallery;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Neighborhood;
use App\PropertyImageGallery;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;
use Auth;
use Throwable;

class AdvertisementController  extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::latest()->paginate(env("PAGINATION_COUNT", 10));

        return view('admin.advertisements.index', compact('advertisements'));
    }


    public function create()
    {
        return view('admin.advertisements.create');
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
            'deed'      => 'required',
            'purpose'      => 'required',
            'advertisement_type'     => 'required',
            'description'        => 'required',
            'status'        => 'required',
            "gallaryimage[]" => 'image|mimes:jpeg,jpg,png',

        ]);



        $advertisement = new Advertisement();
        $advertisement->agent_id = Auth::id();
        $advertisement->title    = $request->title;
        $advertisement->price    = $request->price;
        $advertisement->purpose  = $request->purpose;
        $advertisement->bedroom  = $request->bedroom;
        $advertisement->address  = $request->address;
        $advertisement->alley  = $request->alley;
        $advertisement->area     = $request->area;
        $advertisement->neighborhood_id     = $request->neighborhood_id;
        $advertisement->description        = $request->description;
        $advertisement->advertisement_type        = $request->advertisement_type;
        $advertisement->portion_number        = $request->portion_number;

        if (isset($request->featured)) {
            $advertisement->featured = 1;
        }
        if (isset($request->status)) {
            $advertisement->status = $request->status;
        }
        if (isset($request->deed)) {
            $advertisement->deed = $request->deed;
        }

        // Just for testing purposes
        $advertisement->neighborhood_id     = $request->neighborhood_id;


        $advertisement->save();
        // $advertisement->neiborhood()->attach($request->neighborhood);
        $gallary = $request->file('gallaryimage');

        if ($gallary) {
            foreach ($gallary as $images) {
                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                $galimage['size'] = $images->getClientSize();
                $galimage['advertisement_id'] = $advertisement->id;

                if (!Storage::disk('public')->exists('advertisement/gallery')) {
                    Storage::disk('public')->makeDirectory('advertisement/gallery');
                }
                $advertisementimage = Image::make($images)->stream();
                Storage::disk('public')->put('advertisement/gallery/' . $galimage['name'], $advertisementimage);

                $advertisement->gallery()->create($galimage);
            }
        }

        Toastr::success('message', 'Advertisement created successfully.');
        return redirect()->route('admin.advertisements.index');
    }


    public function show($id)
    {
        return view("admin.advertisements.index");
    }


    public function edit($id)
    {

        $advertisement   = Advertisement::find($id);
        return view(
            'admin.advertisements.edit',
            compact('advertisement')
        );
    }


    public function update(Request $request, $id)
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
            'deed'      => 'required',
            'purpose'      => 'required',
            'advertisement_type'     => 'required',
            'description'        => 'required',
            'status'        => 'required',
            "gallaryimage[]" => 'image|mimes:jpeg,jpg,png',

        ]);



        $advertisement = Advertisement::find($id);
        $advertisement->title    = $request->title;
        $advertisement->price    = $request->price;
        $advertisement->purpose  = $request->purpose;
        $advertisement->bedroom  = $request->bedroom;
        $advertisement->address  = $request->address;
        $advertisement->alley  = $request->alley;
        $advertisement->area     = $request->area;
        $advertisement->neighborhood_id     = $request->neighborhood_id;
        $advertisement->description        = $request->description;
        $advertisement->advertisement_type        = $request->advertisement_type;
        $advertisement->portion_number        = $request->portion_number;

        if (isset($request->featured)) {
            $advertisement->featured = 1;
        }
        if (isset($request->status)) {
            $advertisement->status = $request->status;
        }
        if (isset($request->deed)) {
            $advertisement->deed = $request->deed;
        }

        // Just for testing purposes
        $advertisement->neighborhood_id     = $request->neighborhood_id;


        $advertisement->save();
        // $advertisement->neiborhood()->attach($request->neighborhood);
        $gallary = $request->file('gallaryimage');


        if ($gallary) {

            //deleting the gallery for this item
            $this->advertisementGalleryImageDelete($advertisement->id);

            foreach ($gallary as $images) {

                $currentDate = Carbon::now()->toDateString();
                $galimage['name'] = 'gallary-' . $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                $galimage['size'] = $images->getClientSize();
                $galimage['advertisement_id'] = $advertisement->id;

                if (!Storage::disk('public')->exists('advertisement/gallery')) {
                    Storage::disk('public')->makeDirectory('advertisement/gallery');
                }
                $advertisementimage = Image::make($images)->stream();
                Storage::disk('public')->put('advertisement/gallery/' . $galimage['name'], $advertisementimage);

                $advertisement->gallery()->create($galimage);
            }
        }

        Toastr::success('message', 'Advertisement updated successfully.');
        return redirect()->route('admin.advertisements.index');
    }


    public function destroy($id)
    {
        $property = Advertisement::find($id);

        $property->delete();

        //deleting the gallery
        $this->advertisementGalleryImageDelete($property->id);

        $property->comments()->delete();

        Toastr::success('message', 'Advertisement deleted successfully.');
        return back();
    }


    public function advertisementGalleryImageDelete($id)
    {
        //getting the items
        $gallaryimg = AdvertisementImageGallery::where("advertisement_id", $id)->get();

        //deleting the items
        foreach ($gallaryimg as $item) {

            //deleting the files
            if (Storage::disk('public')->exists('advertisment/gallery/' . $item->image)) {
                Storage::disk('public')->delete('advertisment/gallery/' . $item->image);
            }

            //deletting the items
            AdvertisementImageGallery::destroy($item->id);
        }
    }
}
