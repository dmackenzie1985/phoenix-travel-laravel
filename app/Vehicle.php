<?php
/**
 * Created by PhpStorm.
 * User: Dave
 * Date: 19/05/2017
 * Time: 6:03 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
/*
 * Name: David Mackenzie
 * Date: 19/05/2017
 * Description: Vehicle Model
 * File: Trip.php
 * Updated By: David Mackenzie
 * Updated: 19/05/2017
 */

class Vehicle extends Model
{
    //Primary Key
    public $primaryKey = 'rego_no';

    //Stop autoincrement primary key
    public $incrementing = false;
}