<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CustomerCare</title>
    {{-- CSS ---------------------------------------------- --}}
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('asset/al/dist/sweetalert.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/css/blog-home.css') }}" rel="stylesheet">
    {{-- font ---------------------------------------------- --}}
    <link href="{{ asset('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('http://fonts.googleapis.com/css?family=Crimson+Text') }}" rel='stylesheet' type='text/css'>
    {{-- Alert ---------------------------------------------- --}}
    <script src="{{asset('asset/al/dist/sweetalert.min.js')}}"></script>
    <link href="{{ asset('asset/al/dist/sweetalert.css') }}" rel="stylesheet">
    {{--Date Picker ---------------------------------------------- --}}
    <link href="{{asset('asset/date/bootstrap-datepicker.css')}}" rel="stylesheet">
    <script src="{{asset('asset/date/jquery.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/date/bootstrap-datepicker.js')}}"></script>
    {{-- ---------------------------------------------- --}}

</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container" >
        <div class="navbar-header" >
            <a class="navbar-brand fn" href="{{ url('/') }}"><span class="glyphicon glyphicon-list-alt"></span> CustomerCare </a>
        </div>
        <div class="navbar-collapse collapse">
            {{-- url--}}
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/') }}"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="{{ url('search') }}"> <span class="glyphicon glyphicon-erase"></span> Device Status</a></li>
                    <li><a href="{{ url('login') }}">Log-in</a></li>
                    <li><a href="{{ url('registration') }}">Registration</a></li>
                @else

                    <li><a href="{{ url('/') }}"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="{{ url('search') }}"> <span class="glyphicon glyphicon-erase"></span> Device Status</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             {{ Auth::user()->fname }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            {{----}}
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
<br>
<div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
    <div class="container">
        <div class="navbar-text pull-left">
            <p> <span class="glyphicon glyphicon-globe"></span> 2016 Sudip Sarker </p>
        </div>
        <div class="navbar-text pull-right">
            <a href="https://www.facebook.com/groups/cppsdiu/"><i class="fa fa-facebook-square fa-2x icon-padding"></i></a>
            <a href="#"><i class="fa fa-twitter fa-2x icon-padding"></i></a>
            <a href="#"><i class="fa fa-google-plus fa-2x icon-padding"></i></a>
        </div>
    </div>
</div>
<script src="{{asset('asset/js/jquery.js')}}"></script>