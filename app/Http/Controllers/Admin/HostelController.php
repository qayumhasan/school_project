<?php

namespace App\Http\Controllers\Admin;

use App\Hostel;
use App\RoomType;
use App\HostelRoom;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    // show all the hostel name
    public function index()
    {
        $hostels = Hostel::all();
        return view('admin.hostel.hostel',compact('hostels'));
    }

    // store hostel

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'hostel_name' => 'required',
            'type' => 'required|numeric',
            'address' => 'required',
            'intake' => 'required|numeric',
            'description' => 'required',
        ]);

        Hostel::insert([
            'hostel_name'=>$request->hostel_name,
            'type'=>$request->type,
            'address'=>$request->address,
            'intake'=>$request->intake,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'messege' => 'Hostel Created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // get data for edit

    public function edit($id)
    {
        $hostels =Hostel::findOrFail($id);
        return response()->json($hostels);
    }


    // update data

    public function update(Request $request)
    {

        $this->validate($request, [
            'hostel_name' => 'required',
            'type' => 'required|numeric',
            'address' => 'required',
            'intake' => 'required|numeric',
            'description' => 'required',
        ]);

        Hostel::findOrFail($request->id)->update([
            'hostel_name'=>$request->hostel_name,
            'type'=>$request->type,
            'address'=>$request->address,
            'intake'=>$request->intake,
            'description'=>$request->description,
        ]);

        $notification = array(
            'messege' => 'Hostel Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // delete hostel

    public function destroy($id)
    {
        Hostel::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Hostel deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // status update
    public function statusUpdate($id)
    {
         
        
        $statusChange = Hostel::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Hostel Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Hostel Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // hostel multi delelte

    public function hostelMultiDelete(Request $request)
    {
        if($request->deleteId == null){
            $notification = array(
                'messege' => 'You did not select any Hostel',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }else {
            foreach ($request->deleteId as $type_id) {
                Hostel::findOrFail($type_id)->delete();
            }
        }
        $notification = array(
            'messege' => 'Hostel deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // hostel room
    public function hostelroom(){
        $hostel=Hostel::where('status',1)->get();
        $rooms=RoomType::where('status',1)->get();
        $hostelroom=HostelRoom::OrderBy('id','DESC')->get();
        return view('admin.hostel.hostelroom',compact('hostel','rooms','hostelroom'));
    }

    //Hostel Room submit
    public function hostelroomstore(Request $request){
        $insert=HostelRoom::insert([
            'room_number'=>$request['room_number'],
            'hostel_type'=>$request['hostel_type'],
            'room_type'=>$request['room_type'],
            'num_of_bed'=>$request['num_of_bed'],
            'cost_per_bed'=>$request['cost_per_bed'],
            'description'=>$request['description'],
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
             $notification = array(
            'messege' => 'HostelRoom Insert successfully:)',
            'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
             $notification = array(
            'messege' => 'HostelRoom Insert Faild:)',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
        }
    } 

    // active
    public function hostelroomactive($id){
        $active=HostelRoom::where('id',$id)->update([
            'status'=>'1',
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($active){
            $notification = array(
            'messege' => 'HostelRoom Active success',
            'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
            $notification = array(
            'messege' => 'HostelRoom Active Faild',
            'alert-type' => 'error'
            );
        return Redirect()->back()->with($notification);
        }
    }
    // deactive
     public function hostelroomdeactive($id){
        $deactive=HostelRoom::where('id',$id)->update([
            'status'=>'0',
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($deactive){
            $notification = array(
            'messege' => 'HostelRoom DeActive success',
            'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
            $notification = array(
            'messege' => 'HostelRoom DeActive Faild',
            'alert-type' => 'error'
            );
        return Redirect()->back()->with($notification);
        }
    }
    // deleted
    public function hostelroomdelete($id){
        $delete=HostelRoom::where('id',$id)->delete();
        if($delete){
            $notification = array(
            'messege' => 'HostelRoom Delete success',
            'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
        }else{
            $notification = array(
            'messege' => 'HostelRoom Delete Faild',
            'alert-type' => 'error'
            );
        return Redirect()->back()->with($notification);
        }
    }
    // edit
     public function hostelroomedit($id){

        $data=HostelRoom::where('id',$id)->first();
        return response()->json($data);
       
    }
    // update
    public function hostelroomupdate(Request $request){
        $id=$request->id;
        $update=HostelRoom::where('id',$id)->update([
            'room_number'=>$request['room_number'],
            'hostel_type'=>$request['hostel_type'],
            'room_type'=>$request['room_type'],
            'num_of_bed'=>$request['num_of_bed'],
            'cost_per_bed'=>$request['cost_per_bed'],
            'description'=>$request['description'],
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            $notification = array(
            'messege' => 'HostelRoom Update success',
                'alert-type' => 'success'
                );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'HostelRoom Update Faild',
                'alert-type' => 'error'
                );
            return Redirect()->back()->with($notification);
        }

    }

    // room multidel
    public function hostelroommultidel(Request $request){
        $deleteid=$request->Input('delid');
        //return $deleteid;
         if($deleteid){
             $delet=HostelRoom::whereIn('id',$deleteid)->delete();
             if($delet){
                 $notification=array(
                    'messege'=>'success',
                    'alert-type'=>'success'
                     );
                 return redirect()->back()->with($notification);
             }else{
                 $notification=array(
                    'messege'=>'error',
                    'alert-type'=>'error'
                     );
                 return redirect()->back()->with($notification);
                }
         }else{
            $notification=array(
                'messege'=>'Nothing To Delete',
                'alert-type'=>'info'
                 );
             return redirect()->back()->with($notification);
         }
    }


}
