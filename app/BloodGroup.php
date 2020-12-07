<?php

namespace App;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function employee()
    {
        return $this->belongsTo(Admin::class);
    }
}
