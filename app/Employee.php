<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //Primary Key
    public $primaryKey = 'id';

    //Table name
    protected $table = 'users';
}
