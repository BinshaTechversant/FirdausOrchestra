@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')

<section class="event-top-breadcrumb">
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="/">Home</a>/</li>
                <li><a href="#">Academy</a>/</li>
                <li><a href="/events" class="active"><strong>Events</strong></a></li>
            </ul>
        </div>
    </div>
</section>
<section class="event">
    @if(($genreFilter == 1) or ($seasonFilter == 1) or ($typeFilter == 1))
    <div class="event-filter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center"><span class="ps-13">Filter By</span></div>
                <div class="col-md-4">
                    <div class="row">
                        @if($genreFilter == 1)
                        <div class="col filter-left-bar">
                            <a class="nav-link dropdown-toggle pe-4" href="#" role="button"
                                data-bs-toggle="dropdown">Genre <i
                                    class="fa fa-sort-down menu-icon float-end"></i></a>
                            <ul class="dropdown-menu event-dropdownmenu">
                                @foreach($genres as $genre)
                                    <li><a class="dropdown-item genre_menu" data-genre-type="{{$genre->id}}" href="#">{{$genre->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if($seasonFilter == 1)
                        <div class="col filter-left-bar">
                            <a class="nav-link dropdown-toggle pe-4" href="#" role="button"
                                data-bs-toggle="dropdown">Season <i
                                    class="fa fa-sort-down menu-icon float-end"></i></a>
                            <ul class="dropdown-menu event-dropdownmenu">
                                @foreach($seasons as $season)
                                    <li><a class="dropdown-item season_menu" data-season-type="{{$season->id}}" href="#">{{$season->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if($typeFilter == 1)
                            <div class="col filter-left-bar">
                                <a class="nav-link dropdown-toggle pe-4" href="#" role="button"
                                    data-bs-toggle="dropdown">Type <i
                                        class="fa fa-sort-down menu-icon float-end"></i></a>
                                <ul class="dropdown-menu event-dropdownmenu ">
                                    <li><a class="dropdown-item type_menu" data-event-type="live" href="#">Live</a></li>
                                    <li><a class="dropdown-item type_menu" data-event-type="digital" href="#">Digital</a></li>                               
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="accordion acc-calendar" id="accordionExmple">
        <div class="accordion-item">
            <h2 class="accordion-header" id="monthwise">
                <button class="accordion-button collapsed d-flex justify-content-center accordioncalendar"
                    type="button" data-bs-toggle="collapse" data-bs-target="#calendarmnth" aria-expanded="true"
                    aria-controls="calendarmnth" id="toggleMonth">                    
                </button>
            </h2>
            <div id="calendarmnth" class="accordion-collapse collapse" aria-labelledby="monthwise"
                data-bs-parent="#accordionExmple">
                <div class="accordion-body calen-accr-bdy">
                    <div class="container">
                        <div class="row" id="monthButtonsContainer">
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn btn-border-4" data-month="1">January</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="2">February</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="3">March</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="4">April</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="5">May</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="6">June</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="7">July</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="8">August</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="9">September</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="10">October</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="11">November</button>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                                <button class="btn calendar-mnth-btn" data-month="12">December</button>
                            </div>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="eventBlurDiv" class="container calender-detail-view @if(count($events)>3) event-scroll @endif mb-4 " >
        <div class="row" id="eventsContainer"> 
            @if(count($events)>0)          
                @foreach($events as $index=>$item)
                <div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center">                    
                        <div class="card calen-card">
                            <div class="card-body p-0">
                                <a href="/events/{{$item->slug}}" class="stretched-link"></a>
                                <h4 class="card-title calen-event-title">{{ \Carbon\Carbon::parse($item->event_date)->format('d') }}</h4>
                                <div class="calen-card-text">
                                    <p class="calen-card-text-p">{{$item->name}}</p>
                                    <div class="calen-card-dwn-text">
                                        <div class="float-start" id="event_venue">{{$item->venue}}</div>
                                        <div class="float-end"><i class="fa fa-clock-o me-1"></i>{{ \Carbon\Carbon::parse($item->event_date)->timezone('UTC')->setTimezone('Asia/Dubai')->format('H:i') }} GST</div>
                                    </div>
                                </div>
                                <hr class="calen-card-dwn-line">
                                <div class="calendr-foot-img">
                                    <img class="card-img-bottom w-100 h-100" src="{{$item->image}}" alt="Card image">
                                </div>
                            </div>
                        </div>
                 
                </div>   
                @endforeach 
            @else
                <div class="col-12 text-center">
                    <p>No events for this month.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection