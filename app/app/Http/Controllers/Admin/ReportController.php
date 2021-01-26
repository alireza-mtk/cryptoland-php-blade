<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(env("PAGINATION_COUNT", 10));
        return view('admin.reports.index', compact('reports'));
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
