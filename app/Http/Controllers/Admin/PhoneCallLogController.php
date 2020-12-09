<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneCallLogController extends Controller
{
    public function index()
    {
        $visitors = [];
        return view('admin.admission.call_log.index',compact('visitors'));
    }
}
