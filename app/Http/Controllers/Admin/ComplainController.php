<?php

namespace App\Http\Controllers\Admin;

use App\Complain;
use App\FrontOffice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function index()
    {
        
        $complains = Complain::all();
        $sources = FrontOffice::where('type','sources')->get();
        $types = FrontOffice::where('type','complain')->get();
        return view('admin.admission.complains.index',compact('complains','sources','types'));
    }

    public function store(Request $request)
    {
       

        $log = new Complain;
        $log->type = $request->type;
        $log->source = $request->source;
        $log->complain_by = $request->complain_by;
        $log->phone = $request->Phone;
        $log->date = $request->date;
        $log->description = $request->details;
        $log->action_taken = $request->action_taken;
        $log->assingned = $request->assigned;
        $log->note = $request->note;
        $log->save();

        
        $notification = array(
            'messege' => 'Complain Store successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



    
    public function edit($id)
    {
        $complain = Complain::findOrFail($id);
        $types = FrontOffice::where('type','complain')->get();
        
        $sources = FrontOffice::where('type','sources')->get();
        return view('admin.admission.complains.ajax.edit',compact('complain','sources','types'));
    }

    public function show($id)
    {
        $complain = Complain::findOrFail($id);
        return view('admin.admission.complains.ajax.view',compact('complain'));
    }

    public function update(Request $request , $id)
    {
        $log = Complain::findOrFail($id);
        $log->type = $request->type;
        $log->source = $request->source;
        $log->complain_by = $request->complain_by;
        $log->phone = $request->Phone;
        $log->date = $request->date;
        $log->description = $request->details;
        $log->action_taken = $request->action_taken;
        $log->assingned = $request->assigned;
        $log->note = $request->note;
        $log->save();

        $notification = array(
            'messege' => 'Complain Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $visitor = Complain::findOrFail($id);
        if($visitor){
            $visitor->delete();
        }
        $notification = array(
            'messege' => 'Complain Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function status ($id)
    {
        
        $statusChange = Complain::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Complain Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Complain Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function multiDelete(Request $request)
    {
        foreach($request->deleteId as $row){
            $visitor = Complain::findOrFail($row);
                if($visitor){
                    $visitor->delete();
                }
        }

        $notification = array(
            'messege' => 'Complain  Multi Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
