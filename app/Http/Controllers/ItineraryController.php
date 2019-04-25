<?php

namespace App\Http\Controllers;

use App\Itinerary;
use App\Tour;
use Illuminate\Http\Request;
use App\Http\Requests;

/*
 * Name: David Mackenzie
 * Date: 11/05/2017
 * Description: Used to control routes for Itineraries
 * File: ItineraryController.php
 * Updated By: David Mackenzie
 * Updated: 19/05/2017
 */

class ItineraryController extends Controller
{
    //The constructor has code to restrict access to users that are logged in
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\StaffMiddleware');
    }

    //Validate Itinerary Form
    public function store(Request $request){
        $this->validate();
    }

    //View all Itineraries
    public function all(){
        $itineraries = Itinerary::orderBy('tour_no','asc')->get();
        return view('itinerary.itineraries',['itineraries'=>$itineraries]);
    }

    //Display form for add Itinerary
    public function add($id){
        $tour = Tour::find($id);
        $itineraries = Tour::find($id)->itineraries;
        $days=array();
        for($i=0;$i<$tour->duration;$i++){
            $days[$i]=$i;
        }
        //dd($itineraries{3}['day_no']);
        return view('itinerary.displayForm',['tour'=>$tour,'itineraries'=>$itineraries,'days'=>$days]);
    }

    //Edit a Itinerary form
    public function displayEditForm(Itinerary $itinerary){
        return view('itinerary.displayEditForm',['itinerary'=>$itinerary]);
    }

    public function save(Request $request){
        $this->validate($request, [
            'hotel_booking_no' => 'required|min:1|max:6',
            'activities' => 'required|min:2|max:150',
            'meals' => 'required|min:3|max:150',
        ], [
            'hotel_booking_no.required' => 'The Hotel Booking number field is required.',
            'hotel_booking_no.min' => 'The hotel booking field must be at least 1 character.',
            'hotel_booking_no.max' => 'The hotel booking field cannot be more than 6 characters long.',
            'activities.required' => 'The Activity field is required.',
            'activities.min' => 'The activities must be at least 2 letters in length.',
            'activities.max' => 'The activities field cannot be more than 150 characters.',
            'meals.required' => 'The Meals field is required.',
            'meals.min' => 'The meals field must be at least 3 characters.',
            'meals.max' => 'The meals field cannot be more than 150 characters.',

        ]);

        $i = new Itinerary();

        $i->tour_no=$request->tour_no;
        $i->day_no=$request->day_no;
        $i->hotel_booking_no=$request->hotel_booking_no;
        $i->activities=$request->activities;
        $i->meals=$request->meals;

        //Save new record
        $i->save();

        $itineraries = Tour::find($request->tour_no)->itineraries;
        $tour = Tour::find($request->tour_no);

        return view('itinerary.itineraries',['itineraries'=>$itineraries,'tour'=>$tour]);

    }

    public function update(Request $request){

        $this->validate($request, [
            'hotel_booking_no' => 'required|min:1|max:6',
            'activities' => 'required|min:2|max:150',
            'meals' => 'required|min:3|max:150',
        ], [
            'hotel_booking_no.required' => 'The Hotel Booking number field is required.',
            'hotel_booking_no.min' => 'The hotel booking field must be at least 1 character.',
            'hotel_booking_no.max' => 'The hotel booking field cannot be more than 6 characters long.',
            'activities.required' => 'The Activity field is required.',
            'activities.min' => 'The activities must be at least 2 letters in length.',
            'activities.max' => 'The activities field cannot be more than 150 characters.',
            'meals.required' => 'The Meals field is required.',
            'meals.min' => 'The meals field must be at least 3 characters.',
            'meals.max' => 'The meals field cannot be more than 150 characters.',

        ]);

        $i = Itinerary::find($request->itinerary_no);
        $i->itinerary_no=$request->itinerary_no;
        $i->tour_no=$request->tour_no;
        $i->day_no=$request->day_no;
        $i->hotel_booking_no=$request->hotel_booking_no;
        $i->activities=$request->activities;
        $i->meals=$request->meals;

        //Update Record
        $i->save();

        $itineraries = Tour::find($request->tour_no)->itineraries;
        $tour = Tour::find($request->tour_no);

        return view('itinerary.itineraries',['itineraries'=>$itineraries,'tour'=>$tour]);
    }

    //Delete itinerary
    public function delete($id){

        $i = Itinerary::find($id);
        Itinerary::findOrFail($id)->delete();

        $itineraries = Tour::find($i->tour_no)->itineraries;
        $tour = Tour::find($i->tour_no);

        return view('itinerary.itineraries',['itineraries'=>$itineraries,'tour'=>$tour]);
    }
}
