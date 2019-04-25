@extends('app',['title'=>'- Itineraries'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Used to display all Itineraries in a table
* File: itineraries.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
<!-- itineraries.blade.php -->
@section('content')

    <!-- Current Itineraries-->
    @if (count($itineraries)>0)
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                <table  class="table table-striped table-responsive table-hover" id="itineraries-table" >
                    <h2 style="text-align: center;">{{$tour->tour_name}} </h2>
                    <!-- Hidden tour number -->
                    <input type="hidden" value="{{$tour->tour_no}}">

                    <!-- Table Headings -->
                    <thead>
                    <th>Tour Id</th>
                    <th>Day Number</th>
                    <th>Hotel Booking Number</th>
                    <th>Activities</th>
                    <th>Meals</th>
                    <th>Update&nbsp;</th>
                    <th>Delete&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($itineraries as $i)
                        <tr>
                            <!--Itinerary Id Primary Key Hidden -->
                            <input type="hidden" value="{{$i->itinerary_id}}">

                            <!-- Tour no-->
                            <td class="table-text">
                                <div>{{$i->tour_no}}</div>
                            </td>

                            <!-- Day Number-->
                            <td class="table-text">
                                <div>{{$i->day_no}}</div>
                            </td>

                            <!-- Hotel Booking Number-->
                            <td class="table-text">
                                <div>{{$i->hotel_booking_no}}</div>
                            </td>

                            <!-- Activities-->
                            <td class="table-text">
                                <div>{{$i->activities}}</div>
                            </td>

                            <!-- Meals -->
                            <td class="table-text">
                                <div>{{$i->meals}}</div>
                            </td>

                            <td>
                                <!-- Itinerary Update Button -->
                                <form action="/itinerary/update/{{$i->itinerary_no}}" method="GET">
                                    {{csrf_field()}}
                                    {{method_field('UPDATE')}}

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>

                            <!-- Itinerary Delete Button -->
                            <td>
                                <form method="POST" action="/itinerary/{{$i->itinerary_no}}" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="button" data-toggle="modal"
                                            data-target="#confirmDelete"
                                            data-title="Delete Itinerary"
                                            data-message="Are you sure you want to delete this Itinerary: {{$i->activities}}?">
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

    <!-- Itinerary Add Button -->
    <form action="/itinerary/add/{{$tour->tour_no}}" method="GET">
        {{csrf_field()}}
        <button type="submit" class="btn btn-info">
            <i class="fa fa-btn fa-plus"></i> Add Itinerary
        </button>
    </form>
@endsection