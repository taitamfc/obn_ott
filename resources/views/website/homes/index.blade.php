@extends('website.layouts.master')
@section('title')
{{ __('home.title') }}
@endsection
@section('content')

@include('website.includes.header.banner')
@include('website.homes.includes.new_lessons')
@include('website.homes.includes.incomplete_lessons')

@include('website.homes.includes.grades')
    @foreach( $grades as $grade )
        @include('website.homes.includes.grade')
    @endforeach

@endsection