<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Trip;
use App\Tour;
use App\Trip_Booking;
use App\Customer_Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control routes for Customer page
 * File: CustomerController.php
 * Updated By: David Mackenzie
 * Updated: 25/05/2017
 */

class CustomerController extends Controller
{

    //The constructor has code to restrict access to users that are logged in
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\StaffMiddleware');
    }


    //View all customers
    public function all(){
        $c = Customer::orderBy('customer_id','asc')->get();
        return view('customer.customers',['customers'=>$c]);
    }

    //Add a customer form
    public function add(){
        return view('customer.displayForm');
    }

    //Edit a Customer form
    public function displayEditForm(Customer $customer){
        return view('customer.displayEditForm',['customer'=>$customer]);
    }

    //Save a new customer
    public function save(Request $request){
        $c = new Customer();

        $c->first_name=$request->first;
        $c->middle_initial=$request->initial;
        $c->last_name=$request->last;
        $c->street_no=$request->street_no;
        $c->street_name=$request->street_name;
        $c->suburb=$request->suburb;
        $c->postcode=$request->postcode;
        $c->email=$request->email;
        $c->phone=$request->phone;
        $c->enabled='0';
        $c->akey=md5($request->password);

        //Save new record
        $c->save();

        /*
        $customers = Customer::orderBy('customer_id','asc')->get();
        return view('customer.customers',['customers'=>$customers]);
        */
        return redirect(url('/customers'));
    }

    //Update an existing customer
    public function update(Request $request){
       $c=Customer::find($request->customer_id);
        $c->first_name=$request->first;
        $c->middle_initial=$request->initial;
        $c->last_name=$request->last;
        $c->street_no=$request->street_no;
        $c->street_name=$request->street_name;
        $c->suburb=$request->suburb;
        $c->postcode=$request->postcode;
        $c->email=$request->email;
        $c->phone=$request->phone;
        $c->akey=md5($request->password);

        $c->save();

        return redirect(url('/customers'));

    }

    //Validate a customer form
    public function store(Request $request)
    {
        //dd($request);
        //Validates and store the data..
        $this->validate($request, [
            'first' => 'required|min:2|max:35',
            'last' => 'required|min:2|max:35',
            'street_no' => 'required|min:1|max:10',
            'street_name' => 'required|min:3|max:50',
            'suburb' => 'required|min:3|max:35',
            'postcode' => 'required|min:4|max:4',
            'email' => 'required|email|min:5|max:150',
            'password'=>'required|min:6|max:50'
        ], [
            'first.required' => 'The first name field is required.',
            'first.min' => 'The first name must be at least 2 characters.',
            'first.max' => 'The first name may not be greater than 35 characters.',
            'last.required' => 'The last name field is required',
            'last.min' => 'The last name must be at least 2 characters.',
            'street_no.required' => 'The street number is required.',
            'street_no.min'=>'Street number must have at least 1 number',
            'street_no.max'=>'Street number cannot be more than 10 numbers',
            'street_name.required' => 'The street name is required.',
            'street_name.min'=>'The street name must be at least 3 characters',
            'street_name.max'=>'The strret name cannot be more than 50 characters',
            'suburb.required'=>'The suburb field is required',
            'suburb.min' => 'The suburb must be at least 3 characters.',
            'suburb.max' => 'The suburb cannot be more than 50 characters',
            'postcode.required'=>'The postcode field is required',
            'postcode.min'=>'The postcode must be 4 digits',
            'postcode.max'=>'The postcode must be 4 digits',
            'email.required'=>'The email field is required',
            'email.min'=>'The email must be at least 5 characters',
            'email.max'=>'The email cannot be more than 150 characters',
            'password.required'=>'The password field is required',
            'password.min'=>'The password must be at least 6 characters',
            'password.max'=>'The password must be 50 characters or less',
        ]);

        //Pass request object to save method and display customers page
        $this->save($request);
        $customers = Customer::orderBy('customer_id','asc')->get();
        return view('customer.customers',['customers'=>$customers]);
    }

    //Validate a customer update form
    public function updateStore(Request $request)
    {
        //dd($request);
        //Validates and store the data..
        $this->validate($request, [
            'first' => 'required|min:2|max:35',
            'last' => 'required|min:2|max:35',
            'street_no' => 'required|min:1|max:10',
            'street_name' => 'required|min:3|max:50',
            'suburb' => 'required|min:3|max:35',
            'postcode' => 'required|min:4|max:4',
            'email' => 'required|email|min:5|max:150',
            'password'=>'required|min:6|max:50',
        ], [
            'first.required' => 'The first name field is required.',
            'first.min' => 'The first name must be at least 2 characters.',
            'first.max' => 'The first name may not be greater than 35 characters.',
            'last.required' => 'The last name field is required',
            'last.min' => 'The last name must be at least 2 characters.',
            'street_no.required' => 'The street number is required.',
            'street_no.min'=>'Street number must have at least 1 number',
            'street_no.max'=>'Street number cannot be more than 10 numbers',
            'street_name.required' => 'The street name is required.',
            'street_name.min'=>'The street name must be at least 3 characters',
            'street_name.max'=>'The street name cannot be more than 50 characters',
            'suburb.required'=>'The suburb field is required',
            'suburb.min' => 'The suburb must be at least 3 characters.',
            'suburb.max' => 'The suburb cannot be more than 50 characters',
            'postcode.required'=>'The postcode field is required',
            'postcode.min'=>'The postcode must be 4 digits',
            'postcode.max'=>'The postcode must be 4 digits',
            'email.required'=>'The email field is required',
            'email.min'=>'The email must be at least 5 characters',
            'email.max'=>'The email cannot be more than 150 characters',
            'password.required'=>'The password field is required',
            'password.min'=>'The password must be at least 6 characters',
            'password.max'=>'The password must be 50 characters or less',
        ]);

        //Pass request object to save method and display customers page
        $this->update($request);
        $customers = Customer::orderBy('customer_id','asc')->get();
        return view('customer.customers',['customers'=>$customers]);
    }

    //Delete customer
    public function delete($id){
        Customer::findOrFail($id)->delete();
        $c = Customer::orderBy('customer_id','asc')->get();
        return view('customer.customers',['customers'=>$c]);
    }

    //Enable customer
    public function enable($id){
        $c=Customer::find($id);
        $c->enabled='1';
        $c->save();
        $c = Customer::orderBy('customer_id','asc')->get();
        return view('customer.customers',['customers'=>$c]);
    }

    //Enable customer
    public function disable($id){
        $c=Customer::find($id);
        $c->enabled='0';
        $c->save();
        $c = Customer::orderBy('customer_id','asc')->get();
        return view('customer.customers',['customers'=>$c]);
    }

    //Display form for booking a trip for a customer
    public function bookTrip($id){
        $c=Customer::find($id);
        $trips = Trip::orderBy('trip_id','asc')->get();
        $tours = Tour::orderBy('tour_no','asc')->get();
        return view('customer.customerBooking',['customer'=>$c,'trips'=>$trips,'tours'=>$tours]);
    }

    //Display form for updating a trip for a customer
    public function updateBookTrip($id){
        $trips = Trip::orderBy('trip_id','asc')->get();
        $tours = Tour::orderBy('tour_no','asc')->get();
        $customer_booking=Customer_Booking::find($id);
        $trip_booking=Trip_Booking::find($customer_booking->trip_booking_no);
        $customer=Customer::find($customer_booking->customer_id);

        return view('customer.updateCustomerBooking',['customer_booking'=>$customer_booking,
            'trip_booking'=>$trip_booking,'trips'=>$trips,'tours'=>$tours,'customer'=>$customer]);
    }

    //Create a booking for a customer in the database
    public function addBooking(Request $request){
        //Get trip_booking_id
        $trip_booking= Trip::find($request->trip_id)->trip_booking()->get();

        //Create new customer booking
        $customer_booking = new Customer_Booking();
        $customer_booking->trip_booking_no = $trip_booking[0]->trip_booking_no;
        $customer_booking->customer_id=$request->customer_id;
        $customer_booking->num_concessions=$request->num_concessions;
        $customer_booking->num_adults=$request->num_adults;

        //Save the current customer booking record
        $customer_booking->save();

        //Update trips booked passengers
        $trip=Trip::find($request->trip_id);
        $trip->booked_passengers+=$request->num_concessions;
        $trip->booked_passengers+=$request->num_adults;

        //Update trip passengers bookings
        $trip->save();

        //Get all trips for a customer
        $trips = DB::table('trips AS tr')
            ->join('trip_bookings AS tb','tr.trip_id','=','tb.trip_id')
            ->join('customer_bookings AS cb','cb.trip_booking_no', '=','tb.trip_booking_no')
            ->join('customers AS c','c.customer_id','=','cb.customer_id')
            ->where('c.customer_id', '=', $customer_booking->customer_id)
            ->select('tr.*','cb.*')
            ->get();

        $c=Customer::find($customer_booking->customer_id);

        return view('customer.viewCustomerBookings',['trips'=>$trips,'customer'=>$c]);
    }

    //Update a booking in the database for a customer
    public function updateBooking(Request $request){

        //Update customer booking record
        $customer_booking = Customer_Booking::find($request->customer_booking_id);

        //Remove previously booked passengers
        $trip=Trip::find($request->trip_id);
        $trip->booked_passengers-=$customer_booking->num_concessions;
        $trip->booked_passengers-=$customer_booking->num_adults;

        //Update customer booking record
        $customer_booking->num_adults=$request->num_adults;
        $customer_booking->num_concessions=$request->num_concessions;

        //Add new amount of passengers to trip
        $trip->booked_passengers+=$request->num_concessions;
        $trip->booked_passengers+=$request->num_adults;

        //Save trip record
        $trip->save();

        //Save customer booking record
        $customer_booking->save();

        //Get all trips for a customer
        $trips = DB::table('trips AS tr')
            ->join('trip_bookings AS tb','tr.trip_id','=','tb.trip_id')
            ->join('customer_bookings AS cb','cb.trip_booking_no', '=','tb.trip_booking_no')
            ->join('customers AS c','c.customer_id','=','cb.customer_id')
            ->where('c.customer_id', '=', $customer_booking->customer_id)
            ->select('tr.*','cb.*')
            ->get();

        $c=Customer::find($customer_booking->customer_id);

        return view('customer.viewCustomerBookings',['trips'=>$trips,'customer'=>$c]);
    }

    //Delete a booking in the database for a customer
    public function deleteBooking($id){
        //Find customer booking record to delete
        $customer_booking = Customer_Booking::find($id);

        //Find trip booking record in database
        $trip_booking = Trip_Booking::find($customer_booking->trip_booking_no);

        //Find trip record to update in database
        $trip = Trip::find($trip_booking->trip_id);
        $trip->booked_passengers-=$customer_booking->num_concessions;
        $trip->booked_passengers-=$customer_booking->num_adults;

        //Save updated trip record
        $trip->save();

        //Remove customer booking record from database
        Customer_Booking::findOrFail($id)->delete();

        //Get all trips for a customer
        $trips = DB::table('trips AS tr')
            ->join('trip_bookings AS tb','tr.trip_id','=','tb.trip_id')
            ->join('customer_bookings AS cb','cb.trip_booking_no', '=','tb.trip_booking_no')
            ->join('customers AS c','c.customer_id','=','cb.customer_id')
            ->where('c.customer_id', '=', $customer_booking->customer_id)
            ->select('tr.*','cb.*')
            ->get();

        $c=Customer::find($customer_booking->customer_id);

        return view('customer.viewCustomerBookings',['trips'=>$trips,'customer'=>$c]);
    }

    //Display all bookings for a customer
    public function displayBookings($id){
        $trips = DB::table('trips AS tr')
            ->join('trip_bookings AS tb','tr.trip_id','=','tb.trip_id')
            ->join('customer_bookings AS cb','cb.trip_booking_no', '=','tb.trip_booking_no')
            ->join('customers AS c','c.customer_id','=','cb.customer_id')
            ->where('c.customer_id', '=', $id)
            ->select('tr.*','cb.*')
            ->get();

        $c=Customer::find($id);

        return view('customer.viewCustomerBookings',['trips'=>$trips,'customer'=>$c]);
    }


}
