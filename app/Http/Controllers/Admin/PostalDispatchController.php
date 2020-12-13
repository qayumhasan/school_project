<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostalDispatch;
use Illuminate\Http\Request;

class PostalDispatchController extends Controller
{
    public function index()
    {
        
        $postals = PostalDispatch::all();
        return view('admin.admission.postal_dispatch.index',compact('postals'));
    }

    public function store(Request $request)
    {
        

        $log = new PostalDispatch;
        $log->title = $request->title;
        $log->ref_no = $request->ref_no;
        $log->address = $request->address;
        $log->note = $request->note;
        $log->from_title = $request->form_title;
        $log->date = $request->date;
        $log->doc = $request->note;

        if ($request->hasFile('doc')) {
            $log->doc = $request->file('doc')->store('public/uploads/postal');
        }
        
        $log->save();

        $notification = array(
            'messege' => 'Postal Dispatch Store successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



    
    public function edit($id)
    {
        $postal = PostalDispatch::findOrFail($id);
        return view('admin.admission.postal_dispatch.ajax.edit',compact('postal'));
    }

    public function show($id)
    {
        $postal = PostalDispatch::findOrFail($id);
        return view('admin.admission.postal_dispatch.ajax.view',compact('postal'));
    }

    public function update(Request $request , $id)
    {
        $log = PostalDispatch::findOrFail($id);
        $log->title = $request->title;
        $log->ref_no = $request->ref_no;
        $log->address = $request->address;
        $log->note = $request->note;
        $log->from_title = $request->form_title;
        $log->date = $request->date;
        $log->doc = $request->note;

        if ($request->hasFile('doc')) {
            $log->doc = $request->file('doc')->store('public/uploads/postal');
        }
        
        $log->save();

        $notification = array(
            'messege' => 'Postal Dispatch Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $visitor = PostalDispatch::findOrFail($id);
        if($visitor){
            $visitor->delete();
        }
        $notification = array(
            'messege' => 'Postal Dispatch Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function status ($id)
    {
        
        $statusChange = PostalDispatch::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Postal Dispatch Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Postal Dispatch Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function multiDelete(Request $request)
    {
        foreach($request->deleteId as $row){
            $visitor = PostalDispatch::findOrFail($row);
                if($visitor){
                    $visitor->delete();
                }
        }

        $notification = array(
            'messege' => 'Postal Dispatch  Multi Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
