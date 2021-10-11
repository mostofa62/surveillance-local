<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUpContact extends Model
{

	protected $table = 'covic19_general_fu_contact';

    protected $fillable = [
        'mobile_no',
        'name',
            

    ];
    public static function questionText(){


        return [
        
        'bn'=>[
            'mobile_no'=>'Mobile No',
            'name'=>'Name',            
        ]][session('language')];


    }
}
