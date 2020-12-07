<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{

	protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_type', 'description',
    ];
}
