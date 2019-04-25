<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control routes for Admin and Staff
 * File: RolesController.php
 * Updated By: David Mackenzie
 * Updated: 11/05/2017
 */
class RolesController extends Controller
{
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
        return view('home');
    }

}
