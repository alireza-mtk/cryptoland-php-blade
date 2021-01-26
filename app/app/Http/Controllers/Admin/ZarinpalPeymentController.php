<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZarinpalPeyment;
use Illuminate\Http\Request;

class ZarinpalPeymentController extends Controller
{

    public function index()
    {
        $peyments = ZarinpalPeyment::latest()->paginate(env("PAGINATION_COUNT", 10));
        return view('admin.peyments.index', compact('peyments'));
    }


    public function create()
    {
        //
        return redirect()->back();
    }


    public function store(Request $request)
    {

        //
        return redirect()->back();
    }


    public function show($id)
    {
        //
        return redirect()->back();
    }


    public function edit($id)
    {
        //
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        return redirect()->back();
    }


    public function destroy($id)
    {
        return redirect()->back();

        // $comment = Comment::findorfail($id);
        // $comment->delete();
        // Toastr::success('message', 'Comment deleted successfully.');
        // return back();
    }
}
