<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Toastr;


class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::latest()->paginate(env("PAGINATION_COUNT", 10));
        return view('admin.comments.index', compact('comments'));
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

        $agent = Comment::findOrFail($id);

        $agent->approved = !$agent->approved;

        $agent->save();

        Toastr::success('message', 'Comment updated successfully.');
        return redirect()->back();
    }


    public function destroy($id)
    {

        $comment = Comment::findorfail($id);
        $comment->delete();
        Toastr::success('message', 'Comment deleted successfully.');
        return back();
    }
}
