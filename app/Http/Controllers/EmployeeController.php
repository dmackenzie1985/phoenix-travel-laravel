<?php

namespace App\Http\Controllers;

use App\User;
use App\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control routes for Employees page
 * File: EmployeeController.php
 * Updated By: David Mackenzie
 * Updated: 13/06/2017
 */

class EmployeeController extends Controller
{
    //The constructor has code to restrict access to users that are logged in
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\AdminMiddleware');
    }

    //View all customers
    public function all(){
        $e = User::orderBy('id','asc')->get();
        return view('employee.employees',['employees'=>$e]);
    }

    //Add an employee displayForm
    public function add(){
        return view('employee.displayForm');
    }

    //Edit a employee form
    public function displayEditForm(Employee $employee){
        return view('employee.displayEditForm',['employee'=>$employee]);
    }

    //Update a user function
    public function update(Request $request){
        $e = Employee::find($request->id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ],[
        ]);

        $e->name=$request->name;
        $e->email=$request->email;
        $e->password=Hash::make($request->password);
        $e->role=$request->role;

        //Update Record
        $e->save();

        return redirect('/employees');
    }

    //Delete Employee
    public function delete($id){
        User::findOrFail($id)->delete();
        return redirect('/employees');
    }

}
