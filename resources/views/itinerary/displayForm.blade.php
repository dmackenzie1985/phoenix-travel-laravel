@extends('app',['title'=>' - Add Itinerary'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Used to add an Itinerary record
* File: displayForm.php
* Updated By: David Mackenzie
* Updated: 19/05/2017
--}}
<!-- itineraries.displayForm.blade.php-->
@section('content')
    <div class="panel-body">
        <div class="panel">
        <!-- Form -->
        <form action="{{url('itinerary/add')}}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

            <!-- Tour_No Read only value -->
            <div class="form-group">
                <label for="tour_no" class="col-sm-3 control-label">Tour Number</label>
                <div class="col-sm-6">
                    <input type="text" name="tour_no" id="tour_no" class="form-control"
                           value="{{$tour->tour_no}}" readonly >
                </div>
            </div>

            <!-- Day Number-->
            <div class="form-group">
                <label for="day_no" class="col-sm-3 control-label">Day Number</label>
                <select name='day_no' id='day_no' class="btn btn-primary dropdown-toggle">
                    @foreach($days as $d)
                        @if(isset($itineraries{$d}))
                            <option value="{{$d+1}}" disabled >Day {{$d+1}}</option>
                        @else
                            <option value="{{$d+1}}">Day {{$d+1}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <!-- Hotel Booking Number-->
            <div class="form-group {{$errors->has('hotel_booking_no')?'has-error':''}}">
                <label for="hotel_booking_no" class="col-sm-3 control-label">Hotel Booking Number</label>
                <div class="col-sm-6">
                    <input type="text" name="hotel_booking_no" id="hotel_booking_no" class="form-control"
                           value="{{ old('hotel_booking_no') }}">
                    <span class="text-danger">{{$errors->first('hotel_booking_no')}}</span>
                </div>
            </div>

            <!-- Activites -->
            <div class="form-group {{$errors->has('activities')?'has-error':''}}">
                <label for="activities" class="col-sm-3 control-label">Activities</label>
                <div class="col-sm-6">
                    <input type="text" name="activities" id="activities" class="form-control"
                           value="{{ old('activities') }}">
                    <span class="text-danger">{{$errors->first('activities')}}</span>
                </div>
            </div>

            <!-- Meals -->
            <div class="form-group {{$errors->has('meals')?'has-error':''}}">
                <label for="meals" class="col-sm-3 control-label">Meals</label>
                <div class="col-sm-6">
                    <input type="text" name="meals" id="meals" class="form-control"
                           value="{{ old('meals') }}">
                    <span class="text-danger">{{$errors->first('meals')}}</span>
                </div>
            </div>

            <!-- Add Itinerary Button-->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-plus"></i> Add Itinerary
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection