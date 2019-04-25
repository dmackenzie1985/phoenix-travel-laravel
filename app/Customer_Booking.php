<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 * Name: David Mackenzie
 * Date: 25/05/2017
 * Description: Customer_Booking model for database
 * File: Customer_Booking.php
 * Updated By: David Mackenzie
 * Updated: 25/05/2017
 */

class Customer_Booking extends Model
{
    //Primary key
    public $primaryKey = 'customer_booking_id';

    //Foreign Key
    public $foreignKey = 'customer_id';

    //Table name
    protected $table = 'customer_bookings';

    //Defines which Tour a Itinerary belongs to('model','foreignkey')
    public function customer(){
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function trip_booking(){
        return $this->hasOne('App\Trip_Booking', 'trip_booking_no');
    }
}
