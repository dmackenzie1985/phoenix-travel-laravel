@extends('app',['title'=>'- Update Staff'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Web page used to add users to the system
* File: register.blade.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update User</div>
                    <div class="panel-body">

                        <!-- Edit User Form-->
                        <form action="{{url('employee/update/')}}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}

                        <!-- Hidden employee id to be used for update-->
                        <input type="hidden" name="id" id="id" class="form-control" value="{{$employee->id}}" >

                        <!-- Name -->
                            <div class="form-group {{$errors->has('name')?'has-error':''}}">
                                <label for="name" class="col-sm-3">Name</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="name" class="form-control" value="{{$employee->name}}">
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group {{$errors->has('email')?'has-error':''}}">
                                <label for="Description" class="col-sm-3">Email</label>
                                <div class="col-sm-6">
                                    <input type="text" name="email" id="email" class="form-control" value="{{$employee->email}}">
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>
                            </div>

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

                            <!-- user roles: Admin or Staff -->
                            <div class="form-group">
                                <label for="role" class="col-md-4 control-label">Role</label>
                                <div class="col-md-6">
                                    <input type="radio" name="role" value="staff" id="roleStaff"
                                           class="preserveWhiteSpace"
                                        @if($employee->role=="staff")
                                            checked
                                        @endif
                                        > Staff<br>
                                    <input type="radio" name="role" value="admin" id="roleAdmin"
                                           class="preserveWhiteSpace"
                                           @if($employee->role=="admin")
                                                checked
                                            @endif> Admin<br>
                                </div>
                            </div>

                            <!-- UPDATE User Button-->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-info">
                                        Update User
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
