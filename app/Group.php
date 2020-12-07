<?php

namespace App;

use App\Admin;
use App\StudentAdmission;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function studentAdmissions()
    {
        return $this->hasMany(StudentAdmission::class);
    }

}
