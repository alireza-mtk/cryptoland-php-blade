<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\JobGroup;
use App\Models\JobImageGallery;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class JobGroupController extends Controller
{
    public function index()
    {
        $jobgroups = JobGroup::latest()->paginate(env("PAGINATION_COUNT", 10));
        return view('admin.jobgroups.index', compact('jobgroups'));
    }


    public function create()
    {
        return view('admin.jobgroups.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:job_groups|max:255',
            'image' => 'required',
            "image" => 'image|mimes:jpeg,jpg,png',
        ]);

        $group = new JobGroup();
        $group->name = $request->name;
        $group->save();


        $gallery = [$request->file('image')];

        if ($gallery) {

            foreach ($gallery as $images) {

                $currentDate = Carbon::now()->timestamp;
                $galimage['name'] = $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                $galimage['size'] = $images->getSize();

                if (!Storage::disk('public')->exists('groups/')) {
                    Storage::disk('public')->makeDirectory('groups/');
                }
                $theImage = Image::make($images)->stream();
                Storage::disk('public')->put('groups/' . $galimage['name'], $theImage);

                $group->gallery()->create($galimage);
            }
        }

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
            'name' => 'required|unique:job_groups|max:255',
            "image" => 'image|mimes:jpeg,jpg,png',
        ]);

        $group = JobGroup::find($id);
        $group->name = $request->name;
        $group->save();

        dd($request->all());

        $gallery = $request->file('image') ? [$request->file('image')] : [];

        if ($gallery) {

            // delete previous files
            $this->galleryImageDelete($group->id);

            foreach ($gallery as $images) {

                $currentDate = Carbon::now()->timestamp;
                $galimage['name'] = $currentDate . '-' . uniqid() . '.' . $images->getClientOriginalExtension();
                $galimage['size'] = $images->getSize();

                if (!Storage::disk('public')->exists('groups/')) {
                    Storage::disk('public')->makeDirectory('groups/');
                }
                $theImage = Image::make($images)->stream();
                Storage::disk('public')->put('groups/' . $galimage['name'], $theImage);

                $group->gallery()->create($galimage);
            }
        }

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


    public function galleryImageDelete($id)
    {
        //getting the items
        $images = ImageGallery::where(["imageable_type" => 'App\Models\JobGroup', 'imageable_id' => $id])->get();
        //deleting the items
        foreach ($images as $item) {

            // dont remove the default image
            if ($item->name == 'default.png' || $item->name == 'default.jpg')
                continue;

            //deleting the files
            if (Storage::disk('public')->exists('groups/' . $item->name)) {
                Storage::disk('public')->delete('groups/' . $item->name);
            }

            //deletting the items
            JobImageGallery::destroy($item->id);
        }
    }
}
