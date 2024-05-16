@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
<section class="event-detailed">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-0">
                    <div class="event-detailed-left">
                        <a href="/events" class="calen-top-txt no-style-link">
                            <div class="icon-circle d-inline-block"><img src="{{ asset('img/left-arrow1.png') }} " class="circle-arrow">
                            </div>
                            <span class="calendar-b-t ms-2"> Back to calendar</span>
                        </a>
                        <h1 class="calen-h1 mt-4">{{ \Carbon\Carbon::parse($fields->event_date)->format('d')}}</h1>
                        <h1 class="calen-h1">{{ \Carbon\Carbon::parse($fields->event_date)->format('M')}}</h1>
                        <div class="calen-t-top">
                            <div class="float-start"><i class="fa fa-map-marker calen-icon" aria-hidden="true"></i>
                                <span class="calen-icon-t ms-2">{{$fields->venue}}</span>
                            </div>
                            <div class="float-end"><i class="fa fa-clock-o calen-icon" aria-hidden="true"></i>
                                <span class="calen-icon-t ms-2">{{ \Carbon\Carbon::parse($fields->event_date)->timezone('UTC')->setTimezone('Asia/Dubai')->format('H:i') }} GST</span>
                            </div>
                        </div>

                        <div class="d-inline-block mt-3 w-100">
                            <hr class="calen-hr">
                            <h5 class="calen-social-icon-hd pt-3">Share this Event</h5>
                            <?php $currentURL  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                            ?>
                            <ul class="list-inline d-flex justify-content-center align-items-center justify-content-evenly calen-social-list">
                                @foreach($connect_menus as $menu)
                                    <li class="list-inline-item ">
                                        @if($menu->slug == "facebook")
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($currentURL) }}" target="_blank">                                        
                                        @elseif($menu->slug == "twitter")
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode($currentURL) }}&text=Check%20out%20this%20awesome%20content">  
                                        @else
                                        <a href="{{$menu->url}}" class="no-style-link">
                                        @endif                                       
                                        <img src="{{$menu->featured_image}}" class="calen-social"></a>
                                    </li>
                                @endforeach                              
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-md-8 p-0 calen-right-div">
                    <div class="event-calen-scroll">
                        <h5 class="d-flex justify-content-center calen-right-date">{{ \Carbon\Carbon::parse($fields->event_date)->format('jS F, Y')}}</h5>
                        <h2 class="d-flex justify-content-center calen-right-date-des">{{ $fields->name}}</h2>
                        <div class="calen-detail-img d-flex justify-content-center calen-img-width">
                            <img src="{{$fields->image}}" class="img-fluid calen-d-img w-100">
                        </div>
                        <p class="d-flex  calen-right-img-des">{{$fields->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection