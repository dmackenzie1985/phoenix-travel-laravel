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
                    <div class="panel-heading">Update My Details</div>
                    <div class="panel-body">

                        <!-- Edit User Form-->
                        <form action="{{url('staff/update/')}}" method="POST" class="form-horizontal">
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

                            <!-- UPDATE User Button-->
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-info">
                                        Update My Details
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
