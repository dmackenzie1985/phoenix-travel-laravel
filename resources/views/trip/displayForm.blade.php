@extends('app',['title'=>' - Add Trip'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Used to add a new Trip record
* File: displayForm.php
* Updated By: David Mackenzie
* Updated: 21/05/2017
--}}
<!-- trip.displayForm.blade.php-->
@section('content')
    <div class="panel">
        <div class="panel-body">
            <!-- Form -->
            <form action="/trip/add" method="POST" class="form-horizontal">
            {!! csrf_field() !!}

                <!-- Tour Number-->
                <div class="form-group ">
                    <label for="tour_no" class="col-sm-3 control-label">Tour Number</label>
                    <div class="col-sm-6">
                        <input type="text" name="tour_no" id="tour_no" class="form-control"
                               value="{{ $tour->tour_no }}" readonly="true">
                    </div>
                </div>

                <!-- Rego Number -->
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="rego_no" class="col-sm-6 control-label">Vehicle Rego</label>
                        <select name='rego_no' id='rego_no' class="btn btn-primary dropdown-toggle" >
                            @foreach($vehicles as $v)
                                <option value="{{ $v->rego_no}}">{{$v->rego_no}} {{$v->make}} {{$v->model}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Departure date -->
                <div class="form-group {{$errors->has('departure_date')?'has-error':''}}">
                    <label for="departure_date" class="col-sm-3 control-label">Departure Date</label>
                    <div class="col-sm-6">
                        <input type="date" name="departure_date" id="departure_date" class="form-control"
                               value="{{ old('departure_date') }}">
                        <span class="text-danger">{{$errors->first('departure_date')}}</span>
                    </div>
                </div>

                <!-- Concession Amount-->
                <div class="form-group {{$errors->has('concession_amount')?'has-error':''}}">
                    <label for="concession_amount" class="col-sm-3 control-label">Concession Amount</label>
                    <div class="col-sm-6">
                        <input type="text" name="concession_amount" id="concession_amount" class="form-control"
                               value="{{ old('concession_amount') }}">
                        <span class="text-danger">{{$errors->first('concession_amount')}}</span>
                    </div>
                </div>

                <!-- Standard Amount-->
                <div class="form-group {{$errors->has('standard_amount')?'has-error':''}}">
                    <label for="standard_amount" class="col-sm-3 control-label">Standard Amount</label>
                    <div class="col-sm-6">
                        <input type="text" name="standard_amount" id="standard_amount" class="form-control"
                               value="{{ old('standard_amount') }}">
                        <span class="text-danger">{{$errors->first('standard_amount')}}</span>
                    </div>
                </div>

                <!-- Add Trip Button-->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-plus"></i> Add Trip
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection