<?php

namespace App\Http\Controllers\Admin;

use App\FrontOffice;
use App\Http\Controllers\Controller;
use App\VisitorList;
use Illuminate\Http\Request;

class VisitorListController extends Controller
{
    public function index()
    {
        $visitors = VisitorList::all();
        $propose = FrontOffice::where('type','propuse')->get();
        
        return view('admin.admission.visitor.index',compact('visitors','propose'));   
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'purpose'=>'required',
            'name'=>'required',
            'phone'=>'required',
        ]);

        $visitor = new VisitorList();
        $visitor->purpose = $request->purpose;
        $visitor->name = $request->name;
        $visitor->phone = $request->phone;
        $visitor->id_card = $request->id_card;
        $visitor->no_of_person = $request->no_of_person;
        $visitor->date = $request->date;
        $visitor->intime = $request->in_time;
        $visitor->out_time = $request->out_time;
        $visitor->note = $request->description;
        if ($request->hasFile('doc')) {
            $visitor->doc = $request->file('doc')->store('public/uploads/visitor');
        }
        $visitor->save();
        $notification = array(
            'messege' => 'Visitor assigned successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $visitor = VisitorList::findOrFail($id);
        $propose = FrontOffice::where('type','propuse')->get();
        return view('admin.admission.visitor.ajax.edit',compact('visitor','propose'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'purpose'=>'required',
            'name'=>'required',
            'phone'=>'required',
        ]);

        $visitor = VisitorList::findOrFail($id);
        $visitor->purpose = $request->purpose;
        $visitor->name = $request->name;
        $visitor->phone = $request->phone;
        $visitor->id_card = $request->id_card;
        $visitor->no_of_person = $request->no_of_person;
        $visitor->date = $request->date;
        $visitor->intime = $request->in_time;
        $visitor->out_time = $request->out_time;
        $visitor->note = $request->description;
        if ($request->hasFile('doc')) {
            $visitor->doc = $request->file('doc')->store('public/uploads/visitor');
        }
        
        $visitor->save();
        $notification = array(
            'messege' => 'Visitor Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $visitor = VisitorList::findOrFail($id);
        if($visitor){
            $visitor->delete();
        }
        $notification = array(
            'messege' => 'Visitor Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function status ($id)
    {
        
        $statusChange = VisitorList::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Visitor Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Visitor Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function multiDelete(Request $request)
    {
        foreach($request->deleteId as $row){
            $visitor = VisitorList::findOrFail($row);
                if($visitor){
                    $visitor->delete();
                }
        }

        $notification = array(
            'messege' => 'Visitor Multi Multi Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
