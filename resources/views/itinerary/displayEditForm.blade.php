@extends('app',['title'=>'- Update Itinerary'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Used to update an Itinerary record
* File: displayEditForm.php
* Updated By: David Mackenzie
* Updated: 19/05/2017
--}}

<!-- itineraries.displayEditForm.blade.php-->
@section('content')
    <div class="panel-body">
        <div class="panel">
            <!-- Form -->
            <form action="{{url('itinerary/update')}}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

                <!-- Hidden primary key to be used for update -->
                <input type="hidden" name="itinerary_no" id="itinerary_no" class="form-control"
                               value="{{$itinerary->itinerary_no}}" >

                <!-- Tour_No -->
                <div class="form-group">
                    <label for="day" class="col-sm-3 control-label">Tour Number</label>
                    <div class="col-sm-6">
                        <input type="text" name="tour_no" id="tour_no" class="form-control"
                               value="{{$itinerary->tour_no}}" readonly="true">
                    </div>
                </div>

                <!-- Day Number-->
                <div class="form-group">
                    <label for="day" class="col-sm-3 control-label">Day Number</label>
                    <div class="col-sm-6">
                        <input type="text" name="day_no" id="day_no" class="form-control"
                               value="{{$itinerary->day_no}}" readonly="true">
                    </div>
                </div>

                <!-- Hotel Booking Number-->
                <div class="form-group {{$errors->has('hotel_booking_no')?'has-error':''}}">
                    <label for="hotel_book_no" class="col-sm-3 control-label">Hotel Booking Number</label>
                    <div class="col-sm-6">
                        <input type="text" name="hotel_booking_no" id="hotel_booking_no" class="form-control"
                        value="{{$itinerary->hotel_booking_no}}">
                        <span class="text-danger">{{$errors->first('hotel_booking_no')}}</span>
                    </div>
                </div>

                <!-- Activites -->
                <div class="form-group {{$errors->has('activities')?'has-error':''}}">
                    <label for="activities" class="col-sm-3 control-label">Activities</label>
                    <div class="col-sm-6">
                        <input type="text" name="activities" id="activities" class="form-control"
                        value="{{$itinerary->activities}}">
                        <span class="text-danger">{{$errors->first('activities')}}</span>
                    </div>
                </div>

                <!-- Meals -->
                <div class="form-group {{$errors->has('meals')?'has-error':''}}">
                    <label for="meals" class="col-sm-3 control-label">Meals</label>
                    <div class="col-sm-6">
                        <input type="text" name="meals" id="meals" class="form-control" value="{{$itinerary->meals}}">
                        <span class="text-danger">{{$errors->first('meals')}}</span>
                    </div>
                </div>

                <!-- Add Itinerary Button-->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-plus"></i> Update Itinerary
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection