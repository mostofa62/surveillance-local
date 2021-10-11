<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
    public function encephalitis()
    {
        return $this->hasOne('App\Encephality', 'id','encephality_id');
    }
    public function surveillance()
    {
        return $this->hasOne('App\Encephality', 'id','surveillance_id');
    }
    public function ownerHomeDomisticAnimal()
    {
        return $this->hasMany('App\DomesticAnimal', 'question_id','id')->where('animal_husbandry_type', 0);
    }
    public function ownerDomisticAnimal()
    {
        return $this->hasMany('App\DomesticAnimal', 'question_id','id')->where('animal_husbandry_type', 1);
    }
    public function neighbourDomisticAnimal()
    {
        return $this->hasMany('App\DomesticAnimal', 'question_id','id')->where('animal_husbandry_type', 2);
    }
}
