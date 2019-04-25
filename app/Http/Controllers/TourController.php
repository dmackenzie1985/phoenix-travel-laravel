<?php

namespace App\Http\Controllers;

use App\Tour;
use App\Itinerary;
use App\Trip;
use App\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Functions for Tour Page
 * File: TourController.php
 * Updated By: David Mackenzie
 * Updated: 10/06/2017
 */

class TourController extends Controller
{
    //The constructor has code to restrict access to users that are logged in
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\StaffMiddleware');
    }

    //View all tours
    public function all(){
        $t = Tour::orderBy('tour_no','asc')->get();
        return view('tour.tours',['tours'=>$t]);
    }

    //Add a tour form
    public function add(){
        return view('tour.displayForm');
    }

    //Edit a tour form
    public function displayEditForm(Tour $tour){
        $tours = Tour::all();
        return view('tour.displayEditForm',['tours'=>$tours,'tour'=>$tour]);
    }

    //Save tour function
    public function save(Request $request){
        $t = new Tour;

        $this->validate($request,[
            'tour_name' => 'required|min:5|max:70',
            'description' => 'required|min:3|max:100',
            'duration' => 'required|numeric|min:1|max:20'
        ],[
            'tour_name.required' => ' The Tour Name field is required.',
            'description.required' => ' The description field is required.',
            'duration.required' => ' The duration field is required.'
        ]);

        $t->tour_no = $request->tour_no;
        $t->tour_name=$request->tour_name;
        $t->description=$request->description;
        $t->duration=$request->duration;
        $t->route_map=$request->route_map;

        //Save new record
        $t->save();

        return redirect('/tours');
    }

    // The FORM calls the Route to edit the Tour
    public function update(Request $request){

        $this->validate($request,[
            'tour_name' => 'required|min:5|max:70',
            'description' => 'required|min:3|max:100',
            'duration' => 'required|numeric|min:1'
        ],[
            'tour_name.required' => ' The Tour Name field is required.',
            'description.required' => ' The description field is required.',
            'duration.required' => ' The duration field is required.'
        ]);

        $t = Tour::find($request->tour_no);
        $t->tour_no = $request->tour_no;
        $t->tour_name=$request->tour_name;
        $t->duration=$request->duration;
        $t->description=$request->description;
        $t->route_map=$request->route_map;

        //Update Record
        $t->save();

        return redirect('/tours');
    }

    //Delete tour
    public function delete($id){
        Tour::findOrFail($id)->delete();

        return redirect('/tours');
    }

    //View Itinerary for a Tour
    public function viewItinerary($id){
        $itineraries = Tour::find($id)->itineraries;
        $tour = Tour::find($id);
        //dd(count($itineraries));
        return view('itinerary.itineraries',['itineraries'=>$itineraries,'tour'=>$tour]);
    }

    //View Trips for a Tour No
    public function viewTrip($id){
        $trips = Tour::find($id)->trips;
        $tour = Tour::find($id);
        //dd(count($trips));
        return view('trip.trips',['trips'=>$trips,'tour'=>$tour]);
    }

    //View reviews for a Tour
    public function reviewList($id){
        $reviews = DB::table('customer_reviews AS cr')
            ->join('tours AS tr', 'tr.tour_no', '=', 'cr.tour_no')
            ->where('cr.tour_no', '=', $id)
            ->select('cr.*')
            ->get();

             $tour=Tour::find($id);

        return view('tour.tourReview',['reviews'=>$reviews,'tour'=>$tour]);
    }
}
