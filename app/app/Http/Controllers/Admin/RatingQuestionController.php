<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RatingQuestion;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RatingQuestionController extends Controller
{
    public function index()
    {
        $ratingquestions = RatingQuestion::latest()->get();
        return view('admin.ratingquestions.index', compact('ratingquestions'));
    }

    public function create()
    {
        return view('admin.ratingquestions.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|unique:job_groups|max:255'
        ]);

        $ratingQuestion = new RatingQuestion();
        $ratingQuestion->question = $request->question;
        $ratingQuestion->save();

        Toastr::success('message', 'Question created successfully.');
        return redirect()->route('admin.ratingquestions.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $ratingquestion = RatingQuestion::find($id);
        return view('admin.ratingquestions.edit', compact('ratingquestion'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|unique:rating_questions|max:255'
        ]);

        $ratingQuestion = RatingQuestion::find($id);
        $ratingQuestion->question = $request->question;
        $ratingQuestion->save();

        Toastr::success('message', 'Rating Question updated successfully.');
        return redirect()->route('admin.ratingquestions.index');
    }


    public function destroy($id)
    {
        $ratingQuestion = RatingQuestion::find($id);
        $ratingQuestion->delete();

        Toastr::success('message', 'Rating Question deleted successfully.');
        return back();
    }
}
