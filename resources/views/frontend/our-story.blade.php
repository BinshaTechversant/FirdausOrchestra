@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
    <section class="about-detailed">
        <div class="container p-4">
            <div class="row about-diection">
                <div class="col-md-8 col-xs-12 about-cont-cntr">
                    <h3 class="bio-detailed-h w-100"> {{$heading}}</h3>
                    <p class="bio-detailed-c w-100">
                        {{$content}}
                    </p>
                </div>
                <div class="col-md-4 col-xs-12 d-flex align-items-center justify-content-end">
                    <img src="{{$image}}" class="img-fluid bio-detailed-img">
                </div>
            </div>

        </div>
    </section>    
@endsection

