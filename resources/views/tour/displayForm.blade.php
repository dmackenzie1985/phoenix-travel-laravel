@extends('app',['title'=>' - Add Tour'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Form used to add a Tour record
* File: displayForm.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
<!-- tour.displayForm.blade.php-->
@section('content')
    <div class="panel-body">
        <div class="panel">
        <!-- Form -->
        <form action="{{url('tour/add')}}" method="POST" class="form-horizontal" autocomplete="off">
        {!! csrf_field() !!}
            <!-- Tour Name-->
            <div class="form-group {{$errors->has('tour_name')?'has-error':''}}">
                <label for="tour_name" class="col-sm-3 control-label">Tour Name</label>
                <div class="col-sm-6">
                    <input type="text" name="tour_name" id="tour_name" class="form-control"
                           value="{{old('tour_name')}}">
                    <span class="text-danger">{{$errors->first('tour_name')}}</span>
                </div>
            </div>

            <!-- Description -->
            <div class="form-group {{$errors->has('description')?'has-error':''}}">
                <label for="description" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="description" class="form-control"
                           value="{{old('description')}}">
                    <span class="text-danger">{{$errors->first('description')}}</span>
                </div>
            </div>

            <!-- Duration -->
            <div class="form-group {{$errors->has('duration')?'has-error':''}}">
                <label for="duration" class="col-sm-3 control-label">Duration</label>
                <div class="col-sm-6">
                    <input type="text" name="duration" id="duration" class="form-control"
                           value="{{old('duration')}}">
                    <span class="text-danger">{{$errors->first('duration')}}</span>
                </div>
            </div>

            <!-- Route Map-->
            <div class="form-group {{$errors->has('route_map')?'has-error':''}}">
                <label for="map" class="col-sm-3 control-label">Route Map</label>
                <div class="col-sm-6">
                    <input type="text" name="route_map" id="route_map" class="form-control"
                           value="{{old('route_map')}}">
                    <span class="text-danger">{{$errors->first('route_map')}}</span>
                </div>
            </div>

            <!-- Add Tour Button-->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-plus"></i> Add Tour
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection