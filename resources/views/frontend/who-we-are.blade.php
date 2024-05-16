@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
    <div class="container p-4">
            <h3>{{$itemData->name}}</h3>
            <img src="{{$itemData->featured_image}}">
    </div>
@endsection
