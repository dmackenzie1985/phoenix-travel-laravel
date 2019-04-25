@extends('app',['title'=>' - Customers'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Used to display all customers in a table
* File: customers.blade.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}

<!-- customers.blade.php -->
@section('content')

    <!-- Current Customers-->
    @if (count($customers)>0)
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-responsive table-hover " id="customer-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>First</th>
                    <th>Initial</th>
                    <th>Last</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Bookings </th>
                    <th>Enable/Disable </th>
                    <th>Update</th>
                    <th>Delete</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($customers as $c)
                        <tr>
                            <!-- Hidden customer id -->
                            <input type="hidden" id="customer_id" name="customer_id" value="{{$c->customer_id}}">

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

                            <td>
                                <!-- Customer Booking Button -->
                                <form action="/customer/trips/{{$c->customer_id}}" method="GET">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>

                            <!-- Enabled-->
                            <td class="table-text">
                                @if($c->enabled==0)
                                    <!-- Customer Enable Button -->
                                    <form action="/customer/enable/{{$c->customer_id}}" method="POST">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-info"> Enable
                                            <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @else
                                    <!-- Customer Disable Button -->
                                    <form action="/customer/disable/{{$c->customer_id}}" method="POST">
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-danger"> Disable
                                            <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>

                            <td>
                                <!-- Customer Update Button -->
                                <form action="/customer/update/{{$c->customer_id}}" method="GET">
                                    {{csrf_field()}}
                                    {{method_field('UPDATE')}}
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>

                            <!-- Customer Delete Button -->
                            <td>
                                <form method="POST" action="/customer/{{$c->customer_id}}" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="button" data-toggle="modal"
                                            data-target="#confirmDelete"
                                            data-title="Delete customer"
                                            data-message="Are you sure you want to delete this Customer: {{$c->first_name}} {{$c->last_name}}?">
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

    <!-- Add Customer Button -->
    <form action="/customer/add" method="GET">
            {{csrf_field()}}
            <button type="submit" class="btn btn-info">
                <i class="fa fa-btn fa-plus"></i> Add Customer
            </button>
    </form>

@endsection