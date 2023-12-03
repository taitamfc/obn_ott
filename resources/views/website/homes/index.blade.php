@extends('website.layouts.master')
@section('content')

@include('website.includes.header.banner')
@include('website.homes.includes.grades')
    @foreach( $grades as $grade )
        @include('website.homes.includes.grade')
    @endforeach

@endsection