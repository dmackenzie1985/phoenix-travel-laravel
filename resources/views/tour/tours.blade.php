@extends('app',['title'=>' - Tours'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Used to display all Tour records in a table
* File: tours.blade.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}

<!-- tours.blade.php -->
@section('content')

    <!-- Current Tours -->
    @if (count($tours)>0)
        <div class="panel panel-primary">
            <div class="table-responsive">
            <div class="panel-body">
                <table class="table table-striped table-responsive table-hover" id="tours-table" >

                    <!-- Table Headings -->
                    <thead>
                    <th>Tour No</th>
                    <th>Tour Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Route Map</th>
                    <th>Itinerary</th>
                    <th>Reviews</th>
                    <th>Trips</th>
                    <th>Update&nbsp;</th>
                    <th>Delete </th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($tours as $t)
                        <tr>
                            <!-- Tour Number-->
                            <td class="table-text">
                                <div>{{$t->tour_no}}</div>
                            </td>

                            <!-- Tour Name-->
                            <td class="table-text">
                                <div>{{$t->tour_name}}</div>
                            </td>

                            <!-- Description-->
                            <td class="table-text">
                                <div>{{$t->description}}</div>
                            </td>

                            <!-- Duration-->
                            <td class="table-text">
                                <div>{{$t->duration}}</div>
                            </td>

                            <!-- Route Map-->
                            <td class="table-text">
                                <div>{{$t->route_map}}</div>
                            </td>

                            <td>
                                <!-- Itinerary Button -->
                                <form action="/tour/itinerary/{{$t->tour_no}}" method="GET">
                                    {{csrf_field()}}

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>

                            <td>
                                <!-- Review Button -->
                                <form action="/tour/review/{{$t->tour_no}}" method="GET">
                                    {{csrf_field()}}

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>

                            <td>
                                <!-- Trip Button -->
                                <form action="/tour/trip/{{$t->tour_no}}" method="GET">
                                    {{csrf_field()}}
 
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>

                            <td>
                                <!-- Tour Update Button -->
                                <form action="/tour/update/{{$t->tour_no}}" method="GET">
                                    {{csrf_field()}}
                                    {{method_field('UPDATE')}}

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>

                            <!-- Tour Delete Button -->
                            <td>
                                <form method="POST" action="/tour/{{$t->tour_no}}" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="button" data-toggle="modal"
                                            data-target="#confirmDelete"
                                            data-title="Delete Tour"
                                            data-message="Are you sure you want to delete this Tour: {{$t->tour_name}}?">
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
    <!-- Tour Add Button -->
    <form action="/tour/add" method="GET">
        {{csrf_field()}}
        <button type="submit" class="btn btn-info">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Tour
        </button>
    </form>

@endsection