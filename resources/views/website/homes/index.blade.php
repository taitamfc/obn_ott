@extends('website.layouts.master')
@section('title')
{{ __('home.title') }}
@endsection
@section('content')

@include('website.includes.header.banner')
@include('website.homes.includes.grades')
    @foreach( $grades as $grade )
        @include('website.homes.includes.grade')
    @endforeach

@endsection