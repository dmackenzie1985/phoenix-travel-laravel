<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Hash;

/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control routes for Staff users
 * File: StaffController.php
 * Updated By: David Mackenzie
 * Updated: 10/06/2017
 */
class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // go to view for register
    public function staffHomePage(){
         //dd("loged in as Staff");
        return View('staff.staffHomePage');
    }

    //Update staff details
    public function displayEditForm(Employee $employee){
        return view('staff.updateUser',['employee'=>$employee]);
    }

    //Update a staff details
    public function update(Request $request){
        $e = Employee::find($request->id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ],[
        ]);

        $e->name=$request->name;
        $e->email=$request->email;

        //Update Record
        $e->save();

        return redirect('/home');
    }

    //Display staff password update form
    public function displayPasswordUpdate(Employee $employee){
        return view('staff.updatePassword',['employee'=>$employee]);
    }

    //Update a staff details
    public function updatePassword(Request $request){
        $e = Employee::find($request->id);

        $this->validate($request, [
            'password' => 'required|min:6',
            'password-confirm' => 'confirmed',
        ],[
        ]);

        //Save new password in the database
        $e->password=Hash::make($request->password);

        //Update Record
        $e->save();

        return redirect('/home');
    }
}
