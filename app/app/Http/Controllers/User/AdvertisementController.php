<?php

namespace App\Http\Controllers\User;

use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;
use Auth;

class AdvertisementController  extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::latest()->where("agent_id", Auth::user()->id)->paginate(env("PAGINATION_COUNT", 10));

        return view('agent.advertisements.index', compact('advertisements'));
    }


    public function create()
    {
        return view('agent.advertisements.create');
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
            $advertisement->featured = $request->featured;
        }
        if (isset($request->status)) {
            $advertisement->status = $request->status;
        }
        if (isset($request->deed)) {
            $advertisement->deed = $request->deed;
        }

        // Just for testing purposes
        $advertisement->neighborhood_id  = $request->neighborhood_id;


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
        return redirect()->route('agent.advertisements.index');
    }



    public function show($id)
    {
        // return view('admin.neighborhoods.single');
    }


    public function edit($id)
    {

        return view('admin.neighborhoods.edit');


        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'image' => 'mimes:jpeg,jpg,png'
        ]);

        $image = $request->file('image');
        $slug  = str_slug($request->name);
        $category = Category::find($id);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('category/slider')) {
                Storage::disk('public')->makeDirectory('category/slider');
            }
            if (Storage::disk('public')->exists('category/slider/' . $category->image)) {
                Storage::disk('public')->delete('category/slider/' . $category->image);
            }
            $slider = Image::make($image)->resize(1600, 480)->save($imagename);
            Storage::disk('public')->put('category/slider/' . $imagename, $slider);

            if (!Storage::disk('public')->exists('category/thumb')) {
                Storage::disk('public')->makeDirectory('category/thumb');
            }
            if (Storage::disk('public')->exists('category/thumb/' . $category->image)) {
                Storage::disk('public')->delete('category/thumb/' . $category->image);
            }
            $thumb = Image::make($image)->resize(500, 330)->save($imagename);
            Storage::disk('public')->put('category/thumb/' . $imagename, $thumb);
        } else {
            $imagename = $category->image;
        }

        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imagename;
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
