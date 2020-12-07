<?php

namespace App;

use App\ClassSection;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    public function classSections()
    {
        return $this->hasMany(ClassSection::class);
    }
}
