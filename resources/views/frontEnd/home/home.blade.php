@extends('frontEnd.master')

@section('title')
    Home
@endsection

@section('content')



    <!-- slider section -->
    @include('frontEnd.include.slider')
    <!-- end slider section -->
    </div>

    <!-- why section -->
    @include('frontEnd.include.why')
    <!-- end why section -->

    <!-- arrival section -->
    @include('frontEnd.include.arrival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('frontEnd.include.product')
    <!-- end product section -->

    <!-- subscribe section -->
    @include('frontEnd.include.subscribe')
    <!-- end subscribe section -->

    <!-- client section -->
    @include('frontEnd.include.client')
    <!-- end client section -->

@endsection
