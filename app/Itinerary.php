<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Itinerary model used for database
 * File: Itinerary.php
 * Updated By: David Mackenzie
 * Updated: 11/05/2017
 */

class Itinerary extends Model
{
    //Primary Key
    public $primaryKey = 'itinerary_no';

    //Defines which Tour a Itinerary belongs to('model','foreignkey')
    public function tour(){
        return $this->belongsTo('App\Tour','tour_no');
    }
}
