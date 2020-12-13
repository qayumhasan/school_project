<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PhoneCallLog;
use Illuminate\Http\Request;

class PhoneCallLogController extends Controller
{
    public function index()
    {
        $logs = PhoneCallLog::all();
        return view('admin.admission.call_log.index',compact('logs'));
    }

    public function store(Request $request)
    {
        $log = new PhoneCallLog;
        $log->name = $request->name;
        $log->phone = $request->phone;
        $log->date = $request->date;
        $log->details = $request->description;
        $log->next_date = $request->next_date;
        $log->call_duration = $request->call_duration;
        $log->note = $request->note;
        $log->call_type = $request->call_type;
        $log->save();

        $notification = array(
            'messege' => 'Call Log Store successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



    
    public function edit($id)
    {
        $logs = PhoneCallLog::findOrFail($id);
        return view('admin.admission.call_log.ajax.edit',compact('logs'));
    }

    public function show($id)
    {
        $logs = PhoneCallLog::findOrFail($id);
        return view('admin.admission.call_log.ajax.view',compact('logs'));
    }

    public function update(Request $request , $id)
    {
        $log = PhoneCallLog::findOrFail($id);
        $log->name = $request->name;
        $log->phone = $request->phone;
        $log->date = $request->date;
        $log->details = $request->description;
        $log->next_date = $request->next_date;
        $log->call_duration = $request->call_duration;
        $log->note = $request->note;
        $log->call_type = $request->call_type;
        $log->save();

        $notification = array(
            'messege' => 'Call Log Store successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $visitor = PhoneCallLog::findOrFail($id);
        if($visitor){
            $visitor->delete();
        }
        $notification = array(
            'messege' => 'Call Log Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function status ($id)
    {
        
        $statusChange = PhoneCallLog::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Call Log Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Call Log Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function multiDelete(Request $request)
    {
        foreach($request->deleteId as $row){
            $visitor = PhoneCallLog::findOrFail($row);
                if($visitor){
                    $visitor->delete();
                }
        }

        $notification = array(
            'messege' => 'Call Log  Multi Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


}
