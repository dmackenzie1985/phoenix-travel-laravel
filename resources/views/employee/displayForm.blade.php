@extends('app',['title'=>'- Add Staff'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Form used to add a staff member
* File: displayForm.blade.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
<!-- employee.displayForm.blade.php-->
@section('content')
    <div class="panel-body">
        <!-- Form -->
        <form action="#" method="POST" class="form-horizontal">
        {!! csrf_field() !!}

        <!-- Staff Id-->
            <div class="form-group">

                <label for="staff_id" class="col-sm-3 control-label">Staff Id</label>
                <div class="col-sm-6">

                    <input type="text" name="staff_id" id="staff_id" class="form-control">
                </div>
            </div>

            <!-- First Name-->
            <div class="form-group">

                <label for="first" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-6">

                    <input type="text" name="first" id="first" class="form-control">
                </div>
            </div>

            <!-- Initial-->
            <div class="form-group">

                <label for="hotel_book_no" class="col-sm-3 control-label">Initial</label>
                <div class="col-sm-6">

                    <input type="text" name="initial" id="initial" class="form-control">
                </div>
            </div>

            <!-- Last Name -->
            <div class="form-group">

                <label for="last" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-6">

                    <input type="text" name="last" id="last" class="form-control">
                </div>
            </div>

            <!-- Street Number -->
            <div class="form-group">

                <label for="street_no" class="col-sm-3 control-label">Street Number</label>
                <div class="col-sm-6">

                    <input type="text" name="street_no" id="street_no" class="form-control">
                </div>
            </div>

            <!-- Street Name -->
            <div class="form-group">

                <label for="street_name" class="col-sm-3 control-label">Street Name</label>
                <div class="col-sm-6">

                    <input type="text" name="street_name" id="street_name" class="form-control">
                </div>
            </div>

            <!-- Suburb -->
            <div class="form-group">

                <label for="suburb" class="col-sm-3 control-label">Suburb</label>
                <div class="col-sm-6">

                    <input type="text" name="suburb" id="suburb" class="form-control">
                </div>
            </div>

            <!-- Postcode -->
            <div class="form-group">

                <label for="postcode" class="col-sm-3 control-label">Postcode</label>
                <div class="col-sm-6">

                    <input type="text" name="postcode" id="postcode" class="form-control">
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">

                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-6">

                    <input type="text" name="email" id="email" class="form-control">
                </div>
            </div>

            <!-- Phone Number -->
            <div class="form-group">

                <label for="phone" class="col-sm-3 control-label">Phone Number</label>
                <div class="col-sm-6">

                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
            </div>




            <!-- Add Itinerary Button-->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Staff
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection