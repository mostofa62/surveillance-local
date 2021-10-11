<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Illuminate\Support\Facades\Session;
use DB;

class Employee extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    protected $table = 'employees';
    public function user()
    {
        return $this->hasOne('App\User', 'employee_id','id');
    }

}
