<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostalReceive;
use Illuminate\Http\Request;

class PostalRecevicController extends Controller
{

    public function index()
    {
        
        $postals = PostalReceive::all();
        return view('admin.admission.postal_receive.index',compact('postals'));
    }

    public function store(Request $request)
    {
        

        $log = new PostalReceive;
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
            'messege' => 'Postal Receives Store successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



    
    public function edit($id)
    {
        $postal = PostalReceive::findOrFail($id);
        return view('admin.admission.postal_receive.ajax.edit',compact('postal'));
    }

    public function show($id)
    {
        $postal = PostalReceive::findOrFail($id);
        return view('admin.admission.postal_receive.ajax.view',compact('postal'));
    }

    public function update(Request $request , $id)
    {
        $log = PostalReceive::findOrFail($id);
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
            'messege' => 'Postal Receives Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $visitor = PostalReceive::findOrFail($id);
        if($visitor){
            $visitor->delete();
        }
        $notification = array(
            'messege' => 'Postal Receives Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function status ($id)
    {
        
        $statusChange = PostalReceive::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Postal Receives Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Postal Receives Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function multiDelete(Request $request)
    {
        foreach($request->deleteId as $row){
            $visitor = PostalReceive::findOrFail($row);
                if($visitor){
                    $visitor->delete();
                }
        }

        $notification = array(
            'messege' => 'Postal Receives  Multi Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
