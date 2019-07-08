<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;
use App\History;
use App\User;


class Unit extends Model
{
    //
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function histories()
    {
        return $this->hasMany('App\History');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
