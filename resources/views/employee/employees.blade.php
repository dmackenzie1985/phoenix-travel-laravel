@extends('app',['title'=>' - Users'])
{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Used to display all staff members in a table
* File: employees.blade.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
<!-- employees.blade.php -->
@section('content')
    <!-- Current Employees -->
    @if (count($employees)>0)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-responsive table-hover" id="users-table"  >

                    <!-- Table Headings -->
                    <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Access</th>
                    <th>Update</th>
                    <th>Delete</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                    @foreach($employees as $e)
                        <tr>
                            <!-- User Id-->
                            <td class="table-text">
                                <div>{{$e->id}}</div>
                            </td>

                            <!-- Name-->
                            <td class="table-text">
                                <div>{{$e->name}}</div>
                            </td>

                            <!-- Email-->
                            <td class="table-text">
                                <div>{{$e->email}}</div>
                            </td>

                            <!-- Role-->
                            <td class="table-text">
                                <div>{{$e->role}}</div>
                            </td>

                            <!-- User Update Button -->
                            <td>
                                <form action="/employee/update/{{$e->id}}" method="GET">
                                    {{csrf_field()}}
                                    {{method_field('UPDATE')}}

                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>

                            <!-- User Delete Button -->
                            <td>
                                <form method="POST" action="/employee/{{$e->id}}" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="button" data-toggle="modal"
                                            data-target="#confirmDelete"
                                            data-title="Delete Employee"
                                            data-message="Are you sure you want to delete this Employee: {{$e->name}}?">
                                        <i class="fa fa-btn fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                <!-- Employee Add Button -->
                <form action="{{route('register')}}" method="GET">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add User
                    </button>
                </form>
            </div>
        </div>
    @endif
@endsection

