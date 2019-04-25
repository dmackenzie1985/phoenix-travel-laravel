<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Trip model for database
 * File: Trip.php
 * Updated By: David Mackenzie
 * Updated: 19/05/2017
 */

class Trip extends Model
{
    //Primary Key
     public $primaryKey = 'trip_id';

    //Table name
    protected $table = 'trips';

    //Defines which Tour a Trip belongs to('model','foreignkey')
    public function tour(){
        return $this->belongsTo('App\Tour','tour_no');
    }

    public function trip_booking(){
        return $this->hasOne('App\Trip_Booking','trip_id');
    }

    //Get reviews for a particular trip
    public function reviews(){
        return $this->hasMany('App\Customer_Review','trip_id');
    }
}
