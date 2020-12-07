<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RoomType;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        
        $roomtypes = RoomType::all();
        
        return view('admin.hostel.room_type',compact('roomtypes'));
    }

    // Room Type store

    public function store(Request $request)
    {
        $this->validate($request, [
            'room_type' => 'required',
            'description' => 'required'
        ]);

        RoomType::insert([
            'room_type'=>$request->room_type,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'messege' => 'Room Type Create successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // edit room type

    public function edit($id)
    {
        $roomtype =RoomType::findOrFail($id);

        return response()->json($roomtype);
    }

    // update room type

    public function update(Request $request)
    {

        
        $this->validate($request, [
            'room_type' => 'required|unique:classes,name,' . $request->id,
            'description' => 'required'
        ]);

        RoomType::findOrFail($request->id)->update([
            'room_type'=>$request->room_type,
            'description'=>$request->description,
        ]);

        $notification = array(
            'messege' => 'Room Type Update successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
        
    }


    // Multi delete

    public function multipleDelete(Request $request)
    {
        
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any route',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $type_id) {
                RoomType::where('id', $type_id)->delete();
            }
        }
        $notification = array(
            'messege' => 'Room Type deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // destroy room type

    public function destroy ($id)
    {
        RoomType::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Room Type is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // room type status change

    public function changeStatus($id)
    {
        
        $statusChange = RoomType::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Room Type Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Room Type Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
