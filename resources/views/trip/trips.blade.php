@extends('app',['title'=>'- Trips'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Used to display all Trip records in a table
* File: trips.blade.php
* Updated By: David Mackenzie
--}}

<!-- trips.blade.php -->
@section('content')

        <!-- Current Trips -->
        @if (count($trips)>0)
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-responsive table-hover" id="trips-table">
                        <h2 style="text-align: center;">{{$tour->tour_name}} </h2>

                        <!-- Table Headings -->
                        <thead>
                        <th>Trip Id</th>
                        <th>Tour Number</th>
                        <th>Rego Number</th>
                        <th>Departure Date</th>
                        <th>Booked Passengers</th>
                        <th>Max Passengers</th>
                        <th>Standard Amount</th>
                        <th>Concession Amount</th>
                        <th>Reviews</th>
                        <th>Passenger List</th>
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

                                <!-- Booked Passengers-->
                                <td class="table-text">
                                    <div>{{$t->booked_passengers}}</div>
                                </td>

                                <!-- Max Passengers-->
                                <td class="table-text">
                                    <div>{{$t->max_passengers}}</div>
                                </td>

                                <!-- Standard Amount-->
                                <td class="table-text">
                                    <div>${{$t->standard_amount}}</div>
                                </td>

                                <!-- Concession Amount-->
                                <td class="table-text">
                                    <div>${{$t->concession_amount}}</div>
                                </td>

                                <td>
                                    <!-- Review List -->
                                    <form action="/trip/review/{{$t->trip_id}}" method="GET">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-tasks" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <!-- Passenger List -->
                                    <form action="/trip/passengers/{{$t->trip_id}}" method="GET">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-tasks" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <!-- Trip Update Button -->
                                    <form action="/trip/update/{{$t->trip_id}}" method="GET">
                                        {{csrf_field()}}
                                        {{method_field('UPDATE')}}
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>

                                <!-- Trip Delete Button -->
                                <td>
                                    <form method="POST" action="/trip/{{$t->trip_id}}" >
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="button" data-toggle="modal"
                                                data-target="#confirmDelete"
                                                data-title="Delete Trip"
                                                data-message="Are you sure you want to delete this Trip Id: {{$t->trip_id}} Departure Date: {{$t->departure_date}}?">
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

        <!-- Add Trip Button -->
        <form action="/trip/add/{{$tour->tour_no}}" method="GET">
            {{csrf_field()}}

            <button type="submit" class="btn btn-info">
                <i class="fa fa-btn fa-plus"></i> Add Trip
            </button>
        </form>
    @endsection