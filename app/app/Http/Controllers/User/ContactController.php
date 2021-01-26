<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Support\Facades\Hash;
use App\Feature;
use App\PropertyImageGallery;
use App\Comment;
use App\Contact;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Toastr;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::where("user_id", Auth::user()->id)->paginate(env("PAGINATION_COUNT", 10));
        return view('agent.contacts.index', compact('contacts'));
    }


    public function create()
    {

        return view('agent.contacts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:255',
            'last_name'     => 'required|max:255',
            'phone_number' => 'required|unique:contacts|min:11|max:11',
            'description'   => 'required',
        ]);


        $contact = new Contact();
        $contact->user_id = Auth::user()->id;
        $contact->name    = $request->name;
        $contact->last_name = $request->last_name;
        $contact->phone_number    = $request->phone_number;
        $contact->description    = $request->description;

        $contact->save();


        Toastr::success('message', 'Contact created successfully.');
        return redirect()->route('agent.contact.index');
    }


    public function show($id)
    {
        $agent = User::find($id);
        return view('agent.contacts.edit', compact('agent'));
    }


    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('agent.contacts.edit', compact('contact'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'name'     => 'required|max:255',
            'last_name'   => 'required|max:255',
            'description'   => 'required',
            'phone_number' => 'required|max:11|min:11',
        ]);


        $contact = Contact::findOrFail($id);




        $contact->name        = $request->name;
        $contact->last_name         = $request->last_name;
        $contact->phone_number        = $request->phone_number;
        $contact->description        = $request->description;

        $contact->save();


        Toastr::success('message', 'Contact updated successfully.');
        return redirect()->route('agent.contact.index');
    }


    public function destroy($id)
    {


        $theContact = Contact::findOrFail($id);
        $theContact->delete();
        Toastr::success('message', 'Contact deleted successfully.');
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

    // YOUTUBE LINK TO EMBED CODE
    private function convertYoutube($youtubelink, $w = 250, $h = 140)
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe width=\"$w\" height=\"$h\" src=\"//www.youtube.com/embed/$2\" frameborder=\"0\" allowfullscreen></iframe>",
            $youtubelink
        );
    }
}
