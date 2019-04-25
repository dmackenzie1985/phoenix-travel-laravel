<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Tour model used for database
 * File: Tour.php
 * Updated By: David Mackenzie
 * Updated: 19/05/2017
 */

class Tour extends Model
{
    public $primaryKey = 'tour_no';

    protected $table = 'tours';
    //Get itineraries for a particular Tour,(model,foreignkey)
    public function itineraries(){
        return $this->hasMany('App\Itinerary','tour_no');
    }

    //Get trips for a particular Tour
    public function trips(){
        return $this->hasMany('App\Trip','tour_no');
    }
}
