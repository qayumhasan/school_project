<?php

namespace App\Http\Controllers\Admin;

use App\ExamTerm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamTermController extends Controller
{
    public function index()
    {
        $terms= ExamTerm::select(['id', 'name', 'status'])->where('deleted_status', NULL)->get();
        return view('admin.exam_master.exam.term.index', compact('terms'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $addCategory = new ExamTerm();
        $addCategory->name = $request->name;
        $addCategory->save();

        session()->flash('successMsg', 'Term inserted successfully:)');
        return response()->json('Term inserted successfully');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $updateCategory = ExamTerm::where('id', $request->id)->first();
        $updateCategory->name = $request->name;
        $updateCategory->save();

        session()->flash('successMsg', 'Term updated successfully:)');
        return response()->json('Term updated successfully');
    }

    public function changeStatus($termId)
    {
        $statusChange = ExamTerm::where('id', $termId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Term is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Term is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($termId)
    {
        ExamTerm::where('id', $termId)->singleDelete();
        $notification = array(
            'messege' => 'Term is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getTermByAjax($termId)
    {
        $term = ExamTerm::select(['id', 'name'])->where('id', $termId)->first();
        return response()->json($term);
    }
}
