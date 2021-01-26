<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Message;
use App\Neighborhood;
use Illuminate\Http\Request;
use App\Testimonial;
use App\Property;
use App\Service;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;


class ApiController extends Controller
{

    // Manage Advertisements
    public function advertisements()
    {
        $advertisments = Advertisement::paginate(10);
        return response()->json(['advertisments' => $advertisments], 200);
    }
    public function singleAdvertisement(Request $request)
    {
        $this->validateInputs($request, ['id' => "required|int"]);

        $advertisement = Advertisement::findOrFail($request->id)->with('gallery', 'user')
        ->first();

        return response()->json(['advertisement' => $advertisement] , 200);
    }

    // Manage Agents
    public function agents()
    {
        $agents = User::where("role_id" , 2)->paginate(10);
        return response()->json(['agents' => $agents], 200);
    }
    public function singleAgent(Request $request)
    {
        $this->validateInputs($request, ['id' => "required|int"]);

        $agent = User::findOrFail($request->id)->where("role_id" , 2)
        ->first();

        return response()->json(['agent' => $agent] , 200);
    }


    // manage properties
    public function properties(Request $request)
    {

        // we could add validation if require
        if($request->sort == 1){
            $sort_column = "created_at";
            $sort_type = "ASC";
        }
        else if($request->sort == 2){
            $sort_column = "price";
            $sort_type = "ASC";
        }
        else if($request->sort == 3){
            $sort_column = "price";
            $sort_type = "DESC";
        }
        else if($request->sort == 4){
            $sort_column = "area";
            $sort_type = "ASC";
        }
        else{
            $sort_column = "created_at";
            $sort_type = "DESC";       
        }

        $portion_number     = $request->portion_number;
        $neighborhood_id     = $request->neighborhood_id;
        $purpose     = $request->purpose;
        $property_type     = $request->property_type;
        $deed     = $request->deed;
        $bedroom     = $request->bedroom;
        if(isset($request->featured))
            $featured = 1;
        else
            $featured = 0;
        $minprice     = $request->minprice;
        $maxprice     = $request->maxprice;
        $minarea     = $request->minarea;
        $maxarea     = $request->maxarea;


        $properties = Property::withCount('comments')

            ->when($portion_number, function ($query, $portion_number) {
                return $query->where('portion_number', '=', $portion_number);
            })
            ->when($neighborhood_id, function ($query, $neighborhood_id) {
                return $query->where('neighborhood_id', '=', $neighborhood_id);
            })
            ->when($purpose, function ($query, $purpose) {
                return $query->where('purpose', '=', $purpose);
            })
            ->when($property_type, function ($query, $property_type) {
                return $query->where('property_type', '=', $property_type);
            })
            ->when($minprice, function ($query, $minprice) {
                return $query->where('price', '>=', $minprice);
            })
            ->when($deed, function ($query, $deed) {
                return $query->where('deed', '=', 1);
            })
            ->when($bedroom, function ($query, $bedroom) {
                return $query->where('bedroom', '=', $bedroom);
            })
            ->when($maxprice, function ($query, $maxprice) {
                return $query->where('price', '<=', $maxprice);
            })
            ->when($minarea, function ($query, $minarea) {
                return $query->where('area', '>=', $minarea);
            })
            ->when($maxarea, function ($query, $maxarea) {
                return $query->where('area', '<=', $maxarea);
            })
            ->when($featured, function ($query, $featured) {
                return $query->where('featured', '=', 1);
            })
            ->orderBy($sort_column, $sort_type)            
            ->paginate(env("PAGINATION_COUNT", 10));



            return response()->json(['properties' =>
            $properties
            ], 200);

      
    }
    public function singleProperty(Request $request)
    {
        $this->validateInputs($request, ['id' => "required|int"]);

        $property = Property::findOrFail($request->id)->with('gallery', 'user', 'comments')
        ->first();

        return response()->json(['property' => $property] , 200);
    }

    // manage neighborhoods
    public function neighborhoods(){

        $neighborhoods = Neighborhood::pluck('name', 'id');
        return response()->json($neighborhoods);

    }


     // manage contact us
     public function submitContactForm(Request $request)
     {
        $this->validateInputs($request, [
            'name'      => 'required',
            'email'     => 'required',
            'phone_number'     => 'required',
            'message'   => 'required'
        ]);

        $message  = $request->message;
        $mailfrom = $request->email;

        Message::create([
            'agent_id'  => 1,
            'name'      => $request->name,
            'email'     => $mailfrom,
            'phone'     => $request->phone_number,
            'message'   => $message
        ]);

        $adminname  = User::find(1)->name;
        $mailto     = $request->mailto;

        Mail::to($mailto)->send(new Contact($message, $adminname, $mailfrom));

        return response()->json(['message' => 'Message send successfully.']);
        
    }


    public function validateInputs(Request $request, Array $validateParameters){

        //make an api validator
        $validator = \Validator::make($request->all(), $validateParameters);
    
        if ($validator->fails()) {

            $responseArr['success'] = false;
            $responseArr['message'] = $validator->errors();
            response()->json($responseArr, 400);
            die();
        }

    }
   
}
