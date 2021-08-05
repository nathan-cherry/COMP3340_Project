<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
{{--    Meta tags --}}
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="COMP3340, Project, eCommerce">
    <meta name="author" content="Nathan Cherry">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
{{-- Nav bar--}}
<div class="flex-center position-ref full-height">
    <div class="top-right links">
        <a href="{{ url('/mission') }}">Mission</a>
        <a href="{{ url('/history') }}">History</a>
        <button class="dropdown-toggle btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Team
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ url('/nathan') }}">Nathan Cherry</a>
            <a class="dropdown-item" href="{{ url('/ian') }}">Ian Straatman</a>
            <a class="dropdown-item" href="{{ url('/marko') }}">Marko Milovic</a>
            <a class="dropdown-item" href="{{ url('/sehaj') }}">Sehaj Khaira</a>
            <a class="dropdown-item" href="{{ url('/ehu') }}">Ehabuddin Mohammed</a>
            <a class="btn btn-success ml-4 mr-4" style="width: 209px;" href="{{ url('/join') }}">Apply Now!</a>
        </div>
        <a href="{{ url('/legal') }}">Legal</a>
        <a href="{{ url('/contact') }}">Contact</a>
    </div>

{{--    Title and product sections --}}
    <div class="content">
        <div class="title m-b-md">
            NIMSE
        </div>

        <div class="links">
            <a href="{{url('/products/')}}">All</a>
            <a href="{{url('/products/men')}}">Men</a>
            <a href="{{url('/products/women')}}">Women</a>
            <a href="{{url('/products/kids')}}">Kids</a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
