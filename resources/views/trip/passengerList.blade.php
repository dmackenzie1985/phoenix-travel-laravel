@extends('app',['title'=>' - Passenger List'])
{{--
* Name: David Mackenzie
* Date: 01/06/2017
* Description: Used to display all customers for a Trip
* File: passengerList.blade.php
* Updated By: David Mackenzie
* Updated: 01/06/2017
--}}

<!-- passengerList.blade.php -->
@section('content')

    <!-- Current Customers Booked on a trip-->
    @if (count($customers)>0)
        <div class="panel">
            <div class="panel-body">
                <h2 style="text-align: center">{{$tour->tour_name}}</h2>
                <h3 style="text-align: center;">Trip Number: {{$trip->trip_id}} Departure Date: {{$trip->departure_date}}</h3>
                <div class="table-responsive">
                <table class="table table-striped task-table" id="customer-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>First</th>
                    <th>Initial</th>
                    <th>Last</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Full fares</th>
                    <th>Concession fares</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($customers as $c)
                        <tr>
                            <!-- First Name-->
                            <td class="table-text">
                                <div>{{$c->first_name}}</div>
                            </td>

                            <!-- Middle Initial-->
                            <td class="table-text">
                                <div>{{$c->middle_initial}}</div>
                            </td>

                            <!-- Last Name-->
                            <td class="table-text">
                                <div>{{$c->last_name}}</div>
                            </td>

                            <!-- Address-->
                            <td class="table-text">
                                <div>{{$c->street_no}} {{$c->street_name}} {{$c->suburb}}, {{$c->postcode}}</div>
                            </td>

                            <!-- Email-->
                            <td class="table-text">
                                <div>{{$c->email}}</div>
                            </td>

                            <!-- Phone-->
                            <td class="table-text">
                                <div>{{$c->phone}}</div>
                            </td>

                            <!-- Full fares-->
                            <td class="table-text">
                                <div>{{$c->num_adults}}</div>
                            </td>

                            <!-- Concession fares-->
                            <td class="table-text">
                                <div>{{$c->num_concessions}}</div>
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
            <h4 style="text-align: center">There are no records to display, please add a customer booking from the customer table</h4>
        </div>
    @endif

@endsection