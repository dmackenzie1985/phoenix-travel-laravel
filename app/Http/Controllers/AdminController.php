<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control routes for Admin users
 * File: AdminController.php
 * Updated By: David Mackenzie
 * Updated: 11/05/2017
 */

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // go to view for register
    public function adminHomePage(){
        //dd("you are logged in as ADMIN");
        return View('admin.adminHomePage');
    }
}