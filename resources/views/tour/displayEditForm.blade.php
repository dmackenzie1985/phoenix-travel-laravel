@extends('app',['title'=>' - Update Tour'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Form used to update a tour record
* File: displayEditForm.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
<!-- tour.displayEditForm.blade.php-->
@section('content')
    <div class="panel-body">
        <div class="panel">
            <!-- Edit Tour Form-->
            <form action="{{url('tour/update/')}}" method="POST" class="form-horizontal">
            {!! csrf_field() !!}


                <!-- Tour name -->
                <div class="form-group {{$errors->has('tour_name')?'has-error':''}}">
                    <label for="Tour_Name" class="col-sm-3">Tour Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="tour_name" id="tour_name" class="form-control" value="{{$tour->tour_name}}">
                        <span class="text-danger">{{$errors->first('tour_name')}}</span>
                    </div>
                    <input type="hidden" name="tour_no" id="tour_no" class="form-control" value="{{$tour->tour_no}}" >
                </div>

                <!-- Description -->
                <div class="form-group {{$errors->has('description')?'has-error':''}}">
                    <label for="Description" class="col-sm-3">Description</label>

                    <div class="col-sm-6">
                        <input type="text" name="description" id="description" class="form-control" value="{{$tour->description}}">
                        <span class="text-danger">{{$errors->first('description')}}</span>
                    </div>
                 </div>

                <!-- Duration -->
                <div class="form-group {{$errors->has('duration')?'has-error':''}}">
                    <label for="duration" class="col-sm-3">Duration</label>

                    <div class="col-sm-6">
                        <input type="text" name="duration" id="duration" class="form-control"
                               value="{{$tour->duration}}">
                        <span class="text-danger">{{$errors->first('duration')}}</span>

                    </div>
                </div>

                <!-- Route Map -->
                <div class="form-group">
                    <label for="route_map" class="col-sm-3">Route Map</label>

                    <div class="col-sm-6">
                        <input type="text" name="route_map" id="route_map" class="form-control" value="{{$tour->route_map}}">
                    </div>
                </div>

                <!-- UPDATE Task Button-->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-plus"></i> Update Tour
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection