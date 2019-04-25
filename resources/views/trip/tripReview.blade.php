@extends('app',['title'=>' - Reviews for a Trip'])
{{--
* Name: David Mackenzie
* Date: 01/06/2017
* Description: Used to display all reviews for a Trip
* File: tripReview.blade.php
* Updated By: David Mackenzie
* Updated: 01/06/2017
--}}

<!-- tripReview.blade.php -->
@section('content')

    <!-- Current Customers Booked on a trip-->
    @if (count($reviews)>0)
        <div class="panel">
            <div class="panel-body">
                <h2 style="text-align: center;">{{$tour->tour_name}}</h2>
                <h3 style="text-align: center;">Trip Number: {{$trip->trip_id}} Departure Date: {{$trip->departure_date}}</h3>
                <div class="table-responsive">
                <table class="table table-striped task-table" id="customer-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Rating</th>
                    <th>General Comments</th>
                    <th>Likes</th>
                    <th>Dislikes</th>
                     </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($reviews as $r)
                        <tr>
                            <!-- Rating-->
                            <td class="table-text">
                                @if($r->rating==5)
                                <div id="stars-existing" class="star" data-rating="4">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i></div>
                                @endif
                                @if($r->rating==4)
                                    <div id="stars-existing" class="star" data-rating="4">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i></div>
                                @endif
                                @if($r->rating==3)
                                    <div id="stars-existing" class="star" data-rating="4">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i></div>
                                @endif
                                @if($r->rating==2)
                                    <div id="stars-existing" class="star" data-rating="4">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i></div>
                                @endif
                                @if($r->rating==1)
                                    <div id="stars-existing" class="star" data-rating="4">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i></div>
                                @endif
                                @if($r->rating==0)
                                    <div id="stars-existing" class="star" data-rating="4">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i></div>
                                @endif
                            </td>

                            <!-- General Comments-->
                            <td class="table-text">
                                <div>{{$r->general_feedback}}</div>
                            </td>

                            <!-- Likes-->
                            <td class="table-text">
                                <div>{{$r->likes}}</div>
                            </td>

                            <!-- Dislikes-->
                            <td class="table-text">
                                <div>{{$r->dislikes}}</div>
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
            <h4 style="text-align: center">There are no reviews for this trip.</h4>
        </div>
    @endif

@endsection