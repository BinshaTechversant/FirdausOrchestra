@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
    <div class="container p-4">
            <h3>{{$fields->name}}</h3>
            <p>
                {{$fields->testimonial_date}}
            </p>
            <p>
                {{strip_tags($fields->description)}}
            </p>
            <img src="{{$fields->featured_image}}">
    </div>
@endsection
