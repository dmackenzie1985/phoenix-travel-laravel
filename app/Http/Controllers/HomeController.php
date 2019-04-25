<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control home page for users
 * File: HomeController.php
 * Updated By: David Mackenzie
 * Updated: 11/05/2017
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return redirect('/AdminHP');
        } else if (Auth::user()->role == 'staff') {
            return redirect('/StaffHP');
        }
        return redirect('auth.login');
    }

}
