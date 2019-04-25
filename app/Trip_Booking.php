<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 * Name: David Mackenzie
 * Date: 25/05/2017
 * Description: Trip_Booking model for database
 * File: Customer_Review.php
 * Updated By: David Mackenzie
 * Updated: 25/05/2017
 */

class Trip_Booking extends Model
{
    //Primary key
    public $primaryKey = 'trip_booking_no';

    //Foreign Key
    public $foreignKey = 'trip_id';

    //Table name
    protected $table = 'trip_bookings';

    //Get the trip for a Trip Booking
    public function trip(){
        return $this->hasOne('App\Trip', 'trip_id');
    }

    public function customer_booking(){
        return $this->hasOne('App\Customer_Booking','trip_booking_no');
    }

}
