@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
    <div class="container p-4">
        @foreach($newsData as $news)
            <h3>{{$news->name}}</h3>
            <p>
                {{strip_tags($news->description)}}
            </p>
            <img src="{{$news->featured_image}}" class="img-fluid w-100 h-80 testi-img">
        @endforeach
    </div>
@endsection
