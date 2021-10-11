<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Illuminate\Support\Facades\Session;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id','username','password','accesslist_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function employee()
    {
        return $this->hasOne('App\Employee', 'id', 'employee_id');
    }
    public function site()
    {
        return $this->hasOne('App\Site', 'id', 'site_id');
    }
    public function Project()
    {
        return $this->hasOne('App\Project', 'id', 'project_id');
    }


}
