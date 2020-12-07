<?php

namespace App\Http\Controllers\Admin;

use App\Route;
use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RouteVehicle;

class TransportController extends Controller
{
    public function index()
    {
        $assignedRoutes = Route::with(['routeVehicles', 'routeVehicles.vehicle'])
            ->where('is_assigned_vehicle', 1)
            ->select(['id', 'name', 'status'])
            ->get();
        $formRoutes = Route::where('is_assigned_vehicle', 0)
            ->where('status', 1)
            ->select(['id', 'name'])
            ->get();
        $formVehicles = Vehicle::where('status', 1)
            ->select(['id', 'vehicle_model'])
            ->get();
        return view('admin.transport.assign_vehicle.index', compact('assignedRoutes', 'formVehicles', 'formRoutes'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'route_id' => 'required',
            'vehicle_ids' => 'required',
        ]);

        foreach ($request->vehicle_ids as $vehicle_id) {
            $assignVehicles = new RouteVehicle();
            $assignVehicles->route_id = $request->route_id;
            $assignVehicles->vehicle_id = $vehicle_id;
            $assignVehicles->save();
        }
        $updateRoute = Route::where('id', $request->route_id)->first();
        $updateRoute->is_assigned_vehicle = 1;
        $updateRoute->save();
        $notification = array(
            'messege' => 'Vehicle assigned successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getAssignedRouteByAjax($routeId)
    {
        $route = Route::with(['routeVehicles'])->where('id', $routeId)->first();
        $vehicles = Vehicle::where('status', 1)->get();

        return view('admin.transport.assign_vehicle.ajax_view.edit_modal_view', compact('route', 'vehicles'));
    }

    public function update(Request $request, $routeId)
    {
        $allPreviousAssignedVehicles = RouteVehicle::where('route_id', $routeId)->get();
        foreach ($allPreviousAssignedVehicles as $value) {
            $value->delete();
        }
        foreach ($request->vehicle_ids as $vehicle_id) {
            $assignVehicles = new RouteVehicle();
            $assignVehicles->route_id = $routeId;
            $assignVehicles->vehicle_id = $vehicle_id;
            $assignVehicles->save();
        }

        $notification = array(
            'messege' => 'Assigned vehicles updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function delete($routeId)
    {
        $routeVehicles = RouteVehicle::where('route_id', $routeId)->get();
        foreach ($routeVehicles as $value) {
            $value->singleDelete();
        }
        $updateRoute = Route::where('id', $routeId)->first();
        $updateRoute->is_assigned_vehicle = 0;
        $updateRoute->save();
        $notification = array(
            'messege' => 'Assigned vehicles deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any assigned vehicle.',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        foreach ($request->deleteId as $routeId) {
            $assignedVehicles = RouteVehicle::where('route_id', $routeId)->get();
            foreach ($assignedVehicles as $value) {
                $value->delete();
            }
            $updateRoute = Route::where('id', $routeId)->first();
            $updateRoute->is_assigned_vehicle = 0;
            $updateRoute->save();
        }

        $notification = array(
            'messege' => 'Assigned vehicles deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
