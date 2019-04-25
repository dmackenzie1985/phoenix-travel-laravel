<?php

namespace App\Http\Controllers;
use App\Trip;
use App\Tour;
use App\Trip_Booking;
use App\Customer_Booking;
use App\Customer;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control routes for Trip page
 * File: TripController.php
 * Updated By: David Mackenzie
 * Updated: 03/06/2017
 */

class TripController extends Controller
{
    //The constructor has code to restrict access to users that are logged in
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\StaffMiddleware');
    }

    //View all trips
    public function all(){
        $t = Trip::orderBy('tour_no','asc')->get();
        return view('trip.trips',['trips'=>$t]);
    }

    //Add a Trip form
    public function add($id){
        $tour = Tour::find($id);
        $vehicles = Vehicle::orderBy('rego_no','asc')->get();
        return view('trip.displayForm',['tour'=>$tour,'vehicles'=>$vehicles]);
    }

    //Edit a Trip form
    public function displayEditForm(Trip $trip){
        $tours = Tour::orderBy('tour_no','asc')->get();
        $vehicles = Vehicle::orderBy('rego_no','asc')->get();

        return view('trip.displayEditForm',['tours'=>$tours,'trip'=>$trip,'vehicles'=>$vehicles]);
    }

    public function save(Request $request){
        $this->validate($request, [
            'departure_date' => 'required',
            'standard_amount' => 'required',
            'concession_amount' => 'required',
        ], [
            'departure_date.required' => 'The departure date field is required.',
            'max_passengers.required' => 'The max passengers field is required.',
            'standard_amount.required' => 'The standard fee field is required.',
            'concession_amount.required' => 'The concession fee field is required.',
        ]);

        //Find the vehicle used for the Trip to determine capacity
        $v=Vehicle::find($request->rego_no);

        //Create new Trip record
        $t = new Trip();

        $t->tour_no=$request->tour_no;
        $t->rego_no=$request->rego_no;
        $t->departure_date=$request->departure_date;
        $t->max_passengers=$v->capacity;
        $t->booked_passengers=0;
        $t->standard_amount=$request->standard_amount;
        $t->concession_amount=$request->concession_amount;

        //Save Trip Record
        $t->save();

        //Create new Trip Booking record
        $tb = new Trip_Booking();
        $tb->trip_id=$t->trip_id;
        $tb->booking_date=$request->departure_date;
        $tb->deposit_amount=$request->standard_amount+$request->concession_amount;

        //Save Trip record booking
        $tb->save();

        $t = Tour::find($request->tour_no)->trips;
        $tour = Tour::find($request->tour_no);
        return view('trip.trips',['trips'=>$t,'tour'=>$tour]);
    }

    public function update(Request $request){
        $this->validate($request, [
            'departure_date' => 'required',
            'standard_amount' => 'required',
            'concession_amount' => 'required',
        ], [
            'departure_date.required' => 'The departure date field is required.',
            'standard_amount.required' => 'The standard fee field is required.',
            'concession_amount.required' => 'The concession fee field is required.',
        ]);

        //Find the vehicle used for the Trip to determine capacity
        $v=Vehicle::find($request->rego_no);

        $t = Trip::find($request->trip_id);
        $t->trip_id=$request->trip_id;
        $t->tour_no=$request->tour_no;
        $t->rego_no=$request->rego_no;
        $t->departure_date=$request->departure_date;
        $t->max_passengers=$v->capacity;
        $t->standard_amount=$request->standard_amount;
        $t->concession_amount=$request->concession_amount;

        //Save new record
        $t->save();

        $tour = Tour::find($request->tour_no);
        $trips = Tour::find($request->tour_no)->trips;
        return view('trip.trips',['trips'=>$trips,'tour'=>$tour]);
    }

    //Delete itinerary
    public function delete($id){
        $trip = Trip::find($id);
        $tour=  Tour::find($trip->tour_no);
        Trip::findOrFail($id)->delete();
        $trips = Tour::find($trip->tour_no)->trips;
        return view('trip.trips',['trips'=>$trips,'tour'=>$tour]);
    }

    //Get passenger list for a trip
    public function passengerList($id){
        $c = DB::table('customers AS c')
        ->join('customer_bookings AS cb', 'c.customer_id', '=', 'cb.customer_id')
        ->join('trip_bookings AS tb','tb.trip_booking_no', '=','cb.trip_booking_no')
        ->join('trips AS tr','tr.trip_id','=','tb.trip_id')
        ->where('tr.trip_id', '=', $id)
        ->select('c.*','cb.*')
        ->get();

        $trip=Trip::find($id);
        $tour=Trip::find($id)->tour;

        return view('trip.passengerList',['customers'=>$c,'trip'=>$trip,'tour'=>$tour]);
    }

    //Get review for a trip
    public function reviewList($id){
        $reviews = Trip::find($id)->reviews;
        $trip=Trip::find($id);
        $tour=Trip::find($id)->tour;

        return view('trip.tripReview',['reviews'=>$reviews,'trip'=>$trip,'tour'=>$tour]);
    }
}
