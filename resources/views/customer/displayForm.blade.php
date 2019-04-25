@extends('app',['title'=>'- Add Customer'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Form used to add a customer record
* File: displayForm.blade.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
<!-- customer.displayForm.blade.php-->
@section('content')
    <div class="panel-body">
        <div class="panel">
        <!-- Form -->
        <form action="{{url('customer/store')}}" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

            <table class="table">
                <tr>
                    <td>
                        <!-- First Name-->
                        <div class="form-group {{$errors->has('first')?'has-error':''}}">
                            <label for="first" class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="first" id="first" class="form-control"
                                       value="{{ old('first') }}">
                                <span class="text-danger">{{$errors->first('first')}}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Street Number -->
                        <div class="form-group {{$errors->has('street_no')?'has-error':''}}" >
                            <label for="street_no" class="col-sm-3 control-label">Street Number</label>
                            <div class="col-sm-6">
                                <input type="text" name="street_no" id="street_no" class="form-control"
                                       value="{{ old('street_no') }}">
                                <span class="text-danger">{{$errors->first('street_no')}}</span>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <!-- Initial-->
                        <div class="form-group" >
                            <label for="initial" class="col-sm-3 control-label">Initial</label>
                            <div class="col-sm-6">
                                <input type="text" name="initial" id="initial" class="form-control"
                                       value="{{ old('initial') }}">
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Street Name -->
                        <div class="form-group {{$errors->has('street_name')?'has-error':''}}">
                            <label for="street_name" class="col-sm-3 control-label">Street Name</label>
                            <div class="col-sm-6">
                               <input type="text" name="street_name" id="street_name" class="form-control"
                                       value="{{ old('street_name') }}">
                                <span class="text-danger">{{$errors->first('street_name')}}</span>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <!-- Last Name -->
                        <div class="form-group {{$errors->has('last')?'has-error':''}}" >
                            <label for="last" class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="last" id="last" class="form-control"
                                       value="{{ old('last') }}">
                                <span class="text-danger">{{$errors->first('last')}}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Suburb -->
                        <div class="form-group {{$errors->has('suburb')?'has-error':''}}">
                            <label for="suburb" class="col-sm-3 control-label">Suburb</label>
                            <div class="col-sm-6">
                                <input type="text" name="suburb" id="suburb" class="form-control"
                                       value="{{ old('suburb') }}">
                                <span class="text-danger">{{$errors->first('suburb')}}</span>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <!-- Email -->
                        <div class="form-group {{$errors->has('email')?'has-error':''}}">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="email" class="form-control"
                                       value="{{ old('email') }}">
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Postcode -->
                        <div class="form-group {{$errors->has('postcode')?'has-error':''}}" >
                            <label for="postcode" class="col-sm-3 control-label">Postcode</label>
                            <div class="col-sm-6">
                                <input type="text" name="postcode" id="postcode" class="form-control"
                                       value="{{ old('postcode') }}">
                                <span class="text-danger">{{$errors->first('postcode')}}</span>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <!-- Phone Number -->
                        <div class="form-group">
                            <label for="phone" class="col-sm-3 control-label">Phone Number</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" id="phone" class="form-control"
                                       value="{{ old('phone') }}">
                            </div>
                        </div>
                    </td>
                    <td>
                        <!-- Password -->
                        <div class="form-group {{$errors->has('password')?'has-error':''}}">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="password" id="password" class="form-control"
                                       value="{{ old('password') }}">
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- Add Customer Button-->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-plus"></i> Add Customer
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection