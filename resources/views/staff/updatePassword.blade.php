@extends('app',['title'=>'- Update My Account'])
{{--
* Name: David Mackenzie
* Date: 09/06/2017
* Description: Web page used to manage user account details
* File: updateUser.blade.php
* Updated By: David Mackenzie
* Updated: 09/06/2017
--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Password</div>
                    <div class="panel-body">

                        <!-- Edit User Form-->
                        <form action="{{url('staff/update/password/')}}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}

                        <!-- Hidden employee id to be used for update-->
                            <input type="hidden" name="id" id="id" class="form-control" value="{{$employee->id}}" >

                            <!-- Password -->
                            <div class="form-group {{$errors->has('password')?'has-error':''}}">
                                <label for="duration" class="col-sm-3">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" id="password" class="form-control"
                                           value="">
                                    <span class="text-danger">{{$errors->first('password')}}</span>

                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group {{$errors->has('password-confirm')?'has-error':''}}">
                                <label for="duration" class="col-sm-3">Confirm Password</label>
                                <div class="col-sm-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                    <span class="text-danger">{{$errors->first('password-confirm')}}</span>
                                </div>
                            </div>

                            <!-- UPDATE User Button-->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-info">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
