<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUpFamily extends Model
{
    protected $table = 'covic19_general_fu_family';

    protected $fillable = [
        'name',
        'age',
        'mobile_no',
        'fever',
        'fever_on_set',
        'fever_cessation',
        'cough',
        'cough_on_set',
        'cough_cessation',
        'respiratory_distress',
        'respiratory_distress_on_set',
        'respiratory_distress_cessation',
        'sore_throat',
        'sore_throat_on_set',
        'sore_throat_cessation',               

    ];
}
