<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Illuminate\Support\Facades\Session;
use DB;

class Setting extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    protected $table = 'settings';


}
