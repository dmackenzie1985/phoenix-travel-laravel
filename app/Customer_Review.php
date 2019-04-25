<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 * Name: David Mackenzie
 * Date: 25/05/2017
 * Description: Customer_Review model for database
 * File: Customer_Review.php
 * Updated By: David Mackenzie
 * Updated: 25/05/2017
 */

class Customer_Review extends Model
{
    //Primary key
    public $primaryKey = 'customer_review_no';

    //Table name
    protected $table = 'customer_reviews';

    //Defines which Trip a Customer Review belongs to('model','foreignkey')
    public function trip(){
        return $this->belongsTo('App\Trip','trip_id');
    }
}
