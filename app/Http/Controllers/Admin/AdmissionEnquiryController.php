<?php

namespace App\Http\Controllers\Admin;

use App\AdmissionEnquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionEnquiryController extends Controller
{
    public function index ()
    {
        $enquiry =AdmissionEnquiry::all();
        return view('admin.admission.enquiry.index',compact('enquiry'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'source'=>'required',
            'class'=>'required',
            'no_of_child'=>'required',
        ]);
        $enquiry = new AdmissionEnquiry;
        $enquiry->name= $request->name;
        $enquiry->phone= $request->phone;
        
        $enquiry->email= $request->email;
        $enquiry->address= $request->address;
        $enquiry->description= $request->description;
        $enquiry->note= $request->note;
        $enquiry->date= $request->date;
        $enquiry->next_date= $request->next_date;
        $enquiry->assigned= $request->assigned;
        $enquiry->ref= $request->reference;
        $enquiry->source= $request->source;
        $enquiry->class= $request->name;
        $enquiry->no_of_child= $request->no_of_child;
        
        $enquiry->save();
        
        return \response()->json(['successMsg' => 'Successfully Admission Enquiry Created!.']);
        

    }


    public function search(Request $request)
    {
        $request->validate([
            'date'=>'required',
            'source'=>'required',
        ]);

        $enquiry =AdmissionEnquiry::where([['date',$request->date],['source',$request->source]])->get();

        return view('admin.admission.enquiry.ajax.details',compact('enquiry'));


        
    }
}
