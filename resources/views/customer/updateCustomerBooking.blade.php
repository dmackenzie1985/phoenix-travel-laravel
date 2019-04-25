@extends('app',['title'=>' - Update Customer Booking'])
{{--
* Name: David Mackenzie
* Date: 14/06/2017
* Description: Used to update a trip booking for a customer
* File: updateCustomerBooking.blade.php
* Updated By: David Mackenzie
* Updated: 14/06/2017
--}}

<!-- updateCustomerBooking.blade.php -->
@section('content')
    <div class="panel-body">
        <div class="panel">
            <h3 style="text-align: center;">Update booking for customer: {{$customer->first_name}} {{$customer->last_name}}</h3>
            <!-- Form -->
            <form action="{{url('customer/booking/update')}}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- Hidden primary key to be used for booking -->
                <input type="hidden" name="customer_booking_id" id="customer_booking_id" class="form-control"
                       value="{{$customer_booking->customer_booking_id}}" >

                <!-- Trip_No Drop Down -->
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="trip_id" class="col-sm-6 control-label">Trip Number</label>
                        <select name='trip_id' id='trip_id' class="btn btn-primary dropdown-toggle" >
                            @foreach($trips as $t)
                                @if($trip_booking->trip_id==$t->trip_id)
                                    <option value="{{ $t->trip_id}}" selected="selected">{{$t->trip_id}} {{ $t->departure_date}}</option>
                                @else
                                    <option value="{{ $t->trip_id}}">{{$t->trip_id}} {{ $t->departure_date}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Standard Tickets -->
                <div class="form-group ">
                    <label for="num_adults" class="col-sm-3 control-label">Amount of full fare Tickets:</label>
                    <div class="col-sm-6">
                        <input type="text" name="num_adults" id="num_adults" class="col-sm-3 form-control"
                               value="{{$customer_booking->num_adults}}">
                    </div>
                </div>

                <!-- Concession Tickets -->
                <div class="form-group">
                    <label for="num_concessions" class="col-sm-3 control-label">Amount of concession Tickets:</label>
                    <div class="col-sm-6">
                        <input type="text" name="num_concessions" id="num_concessions" class="col-sm-3 form-control"
                               value="{{$customer_booking->num_concessions}}">
                    </div>
                </div>

                <!-- Add Customer booking Button-->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-plus"></i> Update Booking
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection