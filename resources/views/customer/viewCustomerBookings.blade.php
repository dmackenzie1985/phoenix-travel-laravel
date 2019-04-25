@extends('app',['title'=>'- View Customer Bookings'])
{{--
* Name: David Mackenzie
* Date: 13/06/2017
* Description: Used to display all Trip records in a table
* File: trips.blade.php
* Updated By: David Mackenzie
* Updated: 14/06/2017
--}}

<!-- trips.blade.php -->
@section('content')

    <!-- Current Trips -->
    @if (count($trips)>0)
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive table-hover" id="trips-table">
                        <h3 style="text-align: center;">Trip bookings for customer: {{$customer->first_name}} {{$customer->last_name}}</h3>

                        <!-- Table Headings -->
                        <thead>
                        <th>Trip Id</th>
                        <th>Tour Number</th>
                        <th>Rego Number</th>
                        <th>Departure Date</th>
                        <th>Full fares</th>
                        <th>Concession fares</th>
                        <th>Update</th>
                        <th>Delete&nbsp;</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach($trips as $t)
                            <tr>
                                <!-- Trip Id-->
                                <td class="table-text">
                                    <div>{{$t->trip_id}}</div>
                                </td>

                                <!-- Tour Number-->
                                <td class="table-text">
                                    <div>{{$t->tour_no}}</div>
                                </td>

                                <!-- Rego Number-->
                                <td class="table-text">
                                    <div>{{$t->rego_no}}</div>
                                </td>

                                <!-- Departure Date-->
                                <td class="table-text">
                                    <div>{{$t->departure_date}}</div>
                                </td>

                                <!-- Full fares -->
                                <td class="table-text">
                                    <div>{{$t->num_adults}}</div>
                                </td>

                                <!-- Concession fares-->
                                <td class="table-text">
                                    <div>{{$t->num_concessions}}</div>
                                </td>

                                <td>
                                    <!-- Trip Booking Update Button -->
                                    <form action="/customer/booking/update/{{$t->customer_booking_id}}" method="GET">
                                        {{csrf_field()}}
                                        {{method_field('UPDATE')}}
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>

                                <!-- Trip Booking Delete Button -->
                                <td>
                                    <form method="POST" action="/customer/booking/{{$t->customer_booking_id}}" >
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="button" data-toggle="modal"
                                                data-target="#confirmDelete"
                                                data-title="Delete customer"
                                                data-message="Are you sure you want to delete this booking Trip:
                                            {{$t->trip_id}} Departure Date: {{$t->departure_date}}?">
                                            <i class="fa fa-btn fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="panel">
            <h4 style="text-align: center">There are no records to display, press the add button
                below to add a new record.</h4>
        </div>
    @endif

    <!-- Add Customer booking Button -->
    <form action="/customer/booking/{{$customer->customer_id}}" method="GET">
        {{csrf_field()}}

        <button type="submit" class="btn btn-info">
            <i class="fa fa-btn fa-plus"></i> Add Booking
        </button>
    </form>
@endsection