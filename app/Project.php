<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    use SoftDeletes;

    public function supervisor()
    {
        return $this->hasOne('App\User', 'id', 'supervisor_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
    public function employeeList()
    {
        return $this->hasMany('App\User', 'project_id','id');
    }
}
