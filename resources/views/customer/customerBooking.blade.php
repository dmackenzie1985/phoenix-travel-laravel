@extends('app',['title'=>' - Add Customer Booking'])
{{--
* Name: David Mackenzie
* Date: 25/05/2017
* Description: Used to book a trip for a customer
* File: customers.blade.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}

<!-- customerBooking.blade.php -->
@section('content')
    <div class="panel-body">
        <div class="panel">
            <h3 style="text-align: center;">Create booking for customer: {{$customer->first_name}} {{$customer->last_name}}</h3>
            <!-- Form -->
            <form action="{{url('customer/booking')}}" method="POST" class="form-horizontal">
                {!! csrf_field() !!}

                <!-- Hidden primary key to be used for booking -->
                <input type="hidden" name="customer_id" id="customer_id" class="form-control"
                       value="{{$customer->customer_id}}" >

                <!-- Trip_No Drop Down -->
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="trip_id" class="col-sm-6 control-label">Trip Number</label>
                        <select name='trip_id' id='trip_id' class="btn btn-primary dropdown-toggle" >
                            @foreach($trips as $t)
                                <option value="{{ $t->trip_id}}">{{$t->trip_id}} {{ $t->departure_date}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Standard Tickets -->
                <div class="form-group ">
                    <label for="num_adults" class="col-sm-3 control-label">Amount of full fare Tickets:</label>
                    <div class="col-sm-6">
                        <input type="text" name="num_adults" id="num_adults" class="col-sm-3 form-control"
                               value="">
                      </div>
                </div>

                <!-- Concession Tickets -->
                <div class="form-group">
                    <label for="num_concessions" class="col-sm-3 control-label">Amount of concession Tickets:</label>
                    <div class="col-sm-6">
                        <input type="text" name="num_concessions" id="num_concessions" class="col-sm-3 form-control"
                               value="">
                    </div>
                </div>

                <!-- Add Customer booking Button-->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-plus"></i> Add Booking
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection