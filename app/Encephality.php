<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Encephality extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
    public function schedule_desc()
    {
        return $this->hasOne('App\Schedule', 'encephality_id','id')->orderBy('id', 'desc');
    }
    public function question()
    {
        return $this->hasOne('App\Question', 'encephality_id','id');
    }
    public function ownerHomeDomisticAnimal()
    {
        return $this->hasMany('App\DomesticAnimal', 'encephality_id','id')->where('animal_husbandry_type', 0);
    }
    public function ownerDomisticAnimal()
    {
        return $this->hasMany('App\DomesticAnimal', 'encephality_id','id')->where('animal_husbandry_type', 1);
    }
    public function neighbourDomisticAnimal()
    {
        return $this->hasMany('App\DomesticAnimal', 'encephality_id','id')->where('animal_husbandry_type', 2);
    }
}
