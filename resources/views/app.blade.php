{{--
* Name: David Mackenzie
* Date: 11/05/2017
* Description: Default layout for all views except login page
* File: app.blade.php
* Updated By: David Mackenzie
* Updated: 11/05/2017
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix Travel</title>

    <!-- Datatable style sheet-->
    <link rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <!-- Material Kit Bootstrap Theme CSS -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/material-kit.css')}}" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>

    <!-- jquery script and datatables -->
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
    </script>

    <script type="text/javascript">
        $(document).ready(function()
        {
            $('#users-table').DataTable();

            $('#customer-table').DataTable();

            $('#itineraries-table').DataTable();

            $('#tours-table').DataTable();

            $('#trips-table').DataTable();
        });
    </script>

    @include('modal.modal_confirm');

</head>
<body>
    <header class="container-fluid">
        <h1 style="text-align:center">Phoenix Travel {{$title}}</h1>
    </header>

            <div id="app">
                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <!-- Collapsed Hamburger -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('home')}}" style="...">Home</a></li>
                                @if(Auth::user()->role == 'admin')
                                    <li ><a href="{{url('employees')}}" style="...">Users</a></li>
                                @else
                                    <li ><a href="{{url('tours')}}" style="...">Tours</a></li>
                                    <li ><a href="{{url('customers')}}" style="...">Customers</a></li>
                                @endif
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                <!-- Authentication Links -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        @if(Auth::user()->role == 'staff')
                                            <li>
                                                <a href="#"
                                                   onclick="event.preventDefault();
                                                 document.getElementById('update-employee').submit();">
                                                    My Account
                                                </a>
                                                <form id="update-employee" action="/staff/update/{{Auth::user()->id}}" method="GET">
                                                    {{csrf_field()}}
                                                    {{method_field('UPDATE')}}
                                                </form>
                                            </li>
                                            <li>
                                                <a href="#"
                                                   onclick="event.preventDefault();
                                                 document.getElementById('update-password-employee').submit();">
                                                    Change password
                                                </a>
                                                <form id="update-password-employee" action="/staff/update/password/{{Auth::user()->id}}" method="GET">
                                                    {{csrf_field()}}
                                                    {{method_field('UPDATE')}}
                                                </form>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                           </ul>
                        </div>
                    </div>
                </nav>
            </div>

    @yield('content')

<div class="panel-footer">
    <p class="copyright">&copy; 2017 - Phoenix Travel</p>
</div>

</body>
</html>