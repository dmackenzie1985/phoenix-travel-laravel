@extends('app',['title'=>' - Reports'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Reports web page
* File: reports.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
<!-- reports.blade.php -->
@section('content')
    <div class="panel-body">
        <div class="panel" >
            <ul class="container" style="text-align:center;list-style-type:none;">
               <li> <input type="button" name="selectTours" id="selectTours" value="List all Tours and Trips"/></li>
                <li>&nbsp;</li>
                <li> <input type="button" name="selectTour" id="selectTour" value="Details of a Trip and the Tour associated"/></li>
                <li>&nbsp;</li>
                <li> <input type="button" name="selectTour" id="selectTour" value="Details of a specific Tour and Itinerary"/></li>
                <li>&nbsp;</li>
                <li> <input type="button" name="selectPassengers" id="selectPasengers" value="Passenger list for a trip"/></li>
                <li>&nbsp;</li>
                <li> <input type="button" name="selectReview" id="selectReview" value="Review statistics for a Trip"/></li>
            </ul>
        </div>
    </div>
@endsection