<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
|
| Name: David Mackenzie
| Date: 11/05/2017
| Description: Used to control all routes for the website
| File: web.php
| Updated By: David Mackenzie
| Updated: 14/06/2017

*/

//define Auth::routes - for all Authorization routes - MUST be before Group Admin
Auth::routes();
Route::get('/','RolesController@index');
Route::get('/home','RolesController@index');

//ADMIN ACCESS
Route::group(['middleware'=>'auth','middleware'=>'App\Http\Middleware\AdminMiddleware'],
    function(){
        //Can only access the below if user is Admin(NOT Staff)
        Route::get('/AdminHP','AdminController@adminHomePage');
    });

//STAFF ACCESS
Route::group(['middleware'=>'auth','middleware'=>'App\Http\Middleware\StaffMiddleware'],
    function(){
        //Can only access the below if user is Staff(NOT Admin)
        Route::get('/StaffHP','StaffController@staffHomePage');
    });
//----------------------------------------------------------------------------------------------------------------------
//Routes for Trip

//Select all trips
Route::get('/trips','TripController@all');

//DisplayForm for add Trip
Route::get('/trip/add/{tour}','TripController@add');

//Save the Trip
Route::post('/trip/add','TripController@save');

//Delete the Trip
Route::delete('/trip/{trip}','TripController@delete');

//Update Trip form
Route::get('/trip/update/{trip}','TripController@displayEditForm');

//Update Itinerary function
Route::post('/trip/update/','TripController@update');

//Passenger List for a trip
Route::get('/trip/passengers/{trip}','TripController@passengerList');

//Review List for a trip
Route::get('/trip/review/{trip}','TripController@reviewList');
//----------------------------------------------------------------------------------------------------------------------
//Routes for Tour

//Select All Tours
Route::get('/tours','TourController@all');

//DisplayForm for add Tour
Route::get('/tour/add','TourController@add');

//Save the tour
Route::post('/tour/add','TourController@save');

//Delete the tour
Route::delete('/tour/{tour}','TourController@delete');

//Update Tour form
Route::get('/tour/update/{tour}','TourController@displayEditForm');

//Update Tour function
Route::post('/tour/update/','TourController@update');

//Get Itineraries for a Tour
Route::get('/tour/itinerary/{tour}','TourController@viewItinerary');

//Get Trips for a Tour
Route::get('/tour/trip/{tour}','TourController@viewTrip');

//Get reviews for a Tour
Route::get('/tour/review/{tour}','TourController@reviewList');


//----------------------------------------------------------------------------------------------------------------------

//Routes for Itinerary

//Select all itinerary
Route::get('/itineraries/','ItineraryController@all');

//DisplayForm for add itinerary
Route::get('/itinerary/add/{tour}','ItineraryController@add');

//Save the itinerary
Route::post('/itinerary/add','ItineraryController@save');

//Validation
//Route::post('/itinerary/add','ItineraryController@store');

//Delete the itinerary
Route::delete('/itinerary/{itinerary}','ItineraryController@delete');

//Update Itinerary form
Route::get('/itinerary/update/{itinerary}','ItineraryController@displayEditForm');

//Update Itinerary function
Route::post('/itinerary/update/','ItineraryController@update');

//----------------------------------------------------------------------------------------------------------------------

//Routes for Customer

//Select all customers
Route::get('/customers','CustomerController@all');

//Add a customer
Route::get('/customer/add','CustomerController@add');

//Update Customer form
Route::get('/customer/update/{customer}','CustomerController@displayEditForm');

//Add Customer Validation
Route::post('/customer/store','CustomerController@store');

//Update Customer Validation
Route::post('/customer/updateStore','CustomerController@updateStore');

//Update Customer function
Route::post('/customer/update','CustomerController@update');

//Delete the customer
Route::delete('/customer/{customer}','CustomerController@delete');

//Enable the customer
Route::post('/customer/enable/{customer}','CustomerController@enable');

//Disable the customer
Route::post('/customer/disable/{customer}','CustomerController@disable');

//Book a trip for a customer form
Route::get('/customer/booking/{customer}','CustomerController@bookTrip');

//Update booking for a customer form
Route::get('/customer/booking/update/{customer_booking}','CustomerController@updateBookTrip');

//Add customer booking record
Route::post('/customer/booking','CustomerController@addBooking');

//Update customer booking record
Route::post('/customer/booking/update','CustomerController@updateBooking');

//View trips for a customer
Route::get('/customer/trips/{customer}','CustomerController@displayBookings');

//Delete booking for a customer
Route::delete('/customer/booking/{customer_booking}','CustomerController@deleteBooking');


//----------------------------------------------------------------------------------------------------------------------

//Routes for Employee

//Select all employees
Route::get('/employees','EmployeeController@all');

//Add an employee
Route::get('/employee/add','EmployeeController@add');

//Update Employee function
Route::post('/employee/update','EmployeeController@update');

//Update employee form
Route::get('/employee/update/{employee}','EmployeeController@displayEditForm');

//Delete the Employee
Route::delete('/employee/{user}','EmployeeController@delete');

//----------------------------------------------------------------------------------------------------------------------

//Routes for Staff

//Update staff form
Route::get('/staff/update/{employee}','StaffController@displayEditForm');

//Update Staff member
Route::post('/staff/update','StaffController@update');

//Update Staff member password form
Route::get('/staff/update/password/{employee}','StaffController@displayPasswordUpdate');

//Update Staff member password
Route::post('/staff/update/password','StaffController@updatePassword');