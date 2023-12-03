@extends('website.layouts.master')
@section('content')
@include('website.includes.header.breadcrumb',[
'page_title' => $item->name
])


@endsection