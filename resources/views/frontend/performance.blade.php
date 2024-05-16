@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')

    <div class="container p-4">

            <h3>{{$fields->name}}</h3>
            @php
            
                $dateTime = new DateTime($fields->event_date);
                $formattedDate = $dateTime->format("M d");
            @endphp                       
            <p>{{ $formattedDate }}</p>
            <p>
                {{$fields->location}}
            </p>
            <p>
                {{strip_tags($fields->description)}}
            </p>
            <img src="{{$fields->image}}">
    </div>
@endsection
