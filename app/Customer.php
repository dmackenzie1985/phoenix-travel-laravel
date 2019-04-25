<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Customer model for database
 * File: Customer.php
 * Updated By: David Mackenzie
 * Updated: 11/05/2017
 */

class Customer extends Model
{
    //Primary key
    public $primaryKey = 'customer_id';

    //Table name
    protected $table = 'customers';

    //Get booking for a particular Customer
    public function trips(){
        return $this->hasMany('App\Customer_Booking','customer_id');
    }

}
