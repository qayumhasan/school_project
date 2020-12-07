<?php

namespace App;

use App\Vehicle;
use Illuminate\Database\Eloquent\Model;

class RouteVehicle extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
