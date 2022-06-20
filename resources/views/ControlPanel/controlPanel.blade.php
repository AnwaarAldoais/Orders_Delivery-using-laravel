<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <title> Food Delivery </title>

    <!-- bootstrap core css -->
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <!-- <link href="css/style.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/') }}">

    <style>
        body {
            margin: 0;
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        li {
            text-decoration: none;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>

</head>

<body>
    <div style="margin-left: 130px;">@extends('layouts.app')
    </div>
    @section('content')
    <div class="sidebar" style="float:left;">



        @if($user->type=='Admin')
        <ul>
            <strong>
                <li><a href="/restaurantStatus">Restaurant Status</a>
                <li>
            </strong>
            <strong>
                <li><a href="/manageDelivers">Manage Deliver</a>
                <li>
            </strong>
            <strong>
                <li><a href="/addDeliver">Add Deliver</a>
                <li>
            </strong>
        </ul>
        @elseif($user->type=='Restaurant')
        <strong>
            <li><a href="/manageCategories">Manage Categories</a>
            <li>
        </strong>
        <strong>
            <li><a href="/addCategory">Add Categories</a>
            <li>
        </strong>
        <!-- <strong> <li><a href="/addOffers">Add Offers</a>
                     <strong> <li><a href="/discountMeal">Discount Meals</a> <li></strong>
                     <li></strong>!-->
        <strong>
            <li><a href="/manageMeals">Manage Meals</a>
            <li>
        </strong>
        <strong>
            <li><a href="/addMeal">Add Meals</a>
            <li>
        </strong>
        <strong>
            <li><a href="/waitingOrdersForRes">Tracking Orders</a>
            <li>
        </strong>

        @elseif($user->type=='Deliver')
        <strong>
            <li><a href="/waitingOrdersForDelivers">Tracking Orders</a>
            <li>
        </strong>
        <strong>
            <li><a href="/deliveringOrders">Delivering Orders</a>
            <li>
        </strong>
        @else
        @endif


        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

        </div>

    </div>


    @endsection






</body>

</html>