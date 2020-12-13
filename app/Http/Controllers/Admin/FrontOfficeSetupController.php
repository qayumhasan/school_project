<?php

namespace App\Http\Controllers\Admin;

use App\FrontOffice;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FrontOfficeSetupController extends Controller
{
    
    public function index()
    {
        $fronts =FrontOffice::select(['type','name','id'])->get()->groupBy('type');
        return view('admin.admission.setup.index',compact('fronts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ],
        [
            'name.required'=>'Propuse name Field  is required',
        ]
    );
        $front = new FrontOffice;
        $front->type = 'propuse';
        $front->name = $request->name;
        $front->save();

        
        $notification = array(
            'messege' => 'Front Office Propuse Created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function delete($id)
    {
        FrontOffice::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Front Office Propuse Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'name'=>'required'
        ],
        [
            'name.required'=>'Propuse name Field  is required',
        ]
    );
        $front = FrontOffice::findOrFail($id);
        $front->type = 'propuse';
        $front->name = $request->name;
        $front->save();
        
        return response()->json(['successMsg'=>'Front Office Propuse Update Created successfully:)']);
    }


    // complain store area start

    public function complainStore (Request $request)
    {
        $request->validate([
            'name'=>'required'
        ],
        [
            'name.required'=>'Complain Type name Field  is required',
        ]
    );
        $front = new FrontOffice;
        $front->type = 'complain';
        $front->name = $request->name;
        $front->save();

        
        
        $notification = array(
            'messege' => 'Front Office Complain Type Created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    
    public function Complaindelete($id)
    {
        FrontOffice::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Front Office Complain Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function complainUpdate(Request $request , $id)
    {
        $request->validate([
            'name'=>'required'
        ],
        [
            'name.required'=>'Compalin name Field  is required',
        ]
    );
        $front = FrontOffice::findOrFail($id);
        $front->type = 'complain';
        $front->name = $request->name;
        $front->save();
        
        return response()->json(['successMsg'=>'Front Office Complain Update successfully:)']);
    }
   





    
    // reference store area start

    public function referenceStore (Request $request)
    {
        
        $request->validate([
            'name'=>'required'
        ],
        [
            'name.required'=>'Reference name Field  is required',
        ]
    );
        $front = new FrontOffice;
        $front->type = 'reference';
        $front->name = $request->name;
        $front->save();

        
        
        $notification = array(
            'messege' => 'Front Office Reference Type Created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    
    public function referencdelete($id)
    {
        FrontOffice::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Front Office Reference Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function referenceUpdate(Request $request , $id)
    {
        $request->validate([
            'name'=>'required'
        ],
        [
            'name.required'=>'Reference name Field  is required',
        ]
    );
        $front = FrontOffice::findOrFail($id);
        $front->type = 'reference';
        $front->name = $request->name;
        $front->save();
        
        return response()->json(['successMsg'=>'Front Office Reference Update successfully:)']);
    }
}
