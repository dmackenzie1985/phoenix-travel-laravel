<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control routes for Report page
 * File: ReportController.php
 * Updated By: David Mackenzie
 * Updated: 11/05/2017
 */

class ReportController extends Controller
{

    //The constructor has code to restrict access to users that are logged in
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\StaffMiddleware');
    }


    //View all Reports
    public function all(){
        return view('report.reports');
    }
}
