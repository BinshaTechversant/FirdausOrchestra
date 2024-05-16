@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="content-div">
<!-- Carousel -->

<div id="demo" class="fir-carousel carousel slide" data-bs-ride="carousel">

    <!---
    <div class="carousel-inner">        
        @foreach($carousels as $index => $item)
            <div class="carousel-item @if($index == 0) active @endif">
                <img src="{{ $item->field_value}}" class="d-block" style="width:100%">
            </div>            
        @endforeach        
    </div>
   
    <button class="carousel-control-prev " type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div> --->
    <div class="owl-carousel">
        @foreach($carousels as $index => $item)
            <div class="item"> 
                <div class="slider-image" style="background: url('{{ $item->field_value }}'); "></div>
            </div>
        @endforeach
    </div>
</div>


<!--- Upcoming Performances --->
@php   
    $eventCount = 1;
@endphp
<section class="upcoming-performances">
    <div class="container">
        <h1 class="fir-sub-hd">COMING UP</h1>
        <div class="row">
            @foreach($events as $item)
                <div class="col-lg-4 col-md-4 col-sm-12 d-flex per-col{{$eventCount}}">
                    <div class="per-img-sec">
                        <a href="{{$item->url}}"><img src="{{$item->image}}" class="per-img"></a>
                        <div class="overlay"><a href="{{$item->url}}" class="text-decoration-none text-white"><span class="overlay-hd">{{$item->name}}</span></a>
                            <h6 class="d-flex justify-content-end overlay-sub">{{$item->slug}}</h6>
                        </div>
                    <div class="img-dwn1 mt-3">{{$item->venue}}</div>
                        <a href="{{$item->url}}" class="no-style-link"><h5 class="img-dwn2">{{$item->subtitle}}</h5> </a>
                        @php
                            $dateTime = new DateTime($item->event_date);
                            $formattedDate = $dateTime->format("M d");
                        @endphp                       
                        <p class="img-dwn-date">{{ $formattedDate }}</p>
                    </div>
                </div>
                @php   
                    $eventCount++;
                @endphp
            @endforeach 
        </div>
    </div>
    <div class="text-center per-col4">
        <a href="/events"><button class="btn performance-btn">View Calendar</button></a>
    </div>    
</section>

<!--- Upcoming Performances --->

<!--- About Us ---->
@php
   $aboutCount = 1;
    $heading = [];
    $content = [];
    $urls = [];
    $image = [];

    foreach ($aboutSection as $data) {
        $fieldName = $data->field_name;
        $fieldValue = $data->field_value;

        if (preg_match('/About Heading(\d+)/i', $fieldName, $matches)) {
            $heading[$matches[1]] = $fieldValue;
        } elseif (preg_match('/About Content(\d+)/i', $fieldName, $matches)) {
            $content[$matches[1]] = $fieldValue;
        } elseif (preg_match('/About Url(\d+)/i', $fieldName, $matches)) {
            $urls[$matches[1]] = $fieldValue;
        } elseif (preg_match('/About Image(\d+)/i', $fieldName, $matches)) {
                $image[$matches[1]] = $fieldValue;
            }
    }
                    
@endphp
<section class="about-us">    
    <div class="container">
        <h1 class="fir-sub-hd">ABOUT US</h1>
        <div class="row mt-4">
            <div class="col-md-7 col-sm-6">
                <div class="accordion" id="">
                    @foreach($heading as $index => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{$aboutCount}}">
                                <button id="changeBtn" class="accordion-button abt-accordion accr-btn @if($aboutCount==1)shadow-none  @else collapsed @endif" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{$aboutCount}}" aria-expanded="true" aria-controls="collapse{{$aboutCount}}" data-image="{{$image[$index]}}" >
                                <h3 class="mb-0">@php
                                                    $uppercaseName = strtoupper( $item );
                                                @endphp
                                {{ $uppercaseName }}</h3>
                                </button>
                            </h2>
                            <div id="collapse{{$aboutCount}}" class="accordion-collapse collapse @if($aboutCount==1) show @endif" aria-labelledby="heading{{$aboutCount}}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">  
                                    @php
                                    $sentences = preg_split('/(?<=[.?!])\s+(?=[A-Z]|(?:[A-Z]\.[A-Z]\.))/', $content[$index], -1, PREG_SPLIT_NO_EMPTY);
                                    $limitedContent = implode(' ', array_slice($sentences, 0, 3));                                   
                                    @endphp                              
                                {{$limitedContent}}
                                    <br><a href ="{{ $urls[$index] }}"><button class="btn accr-bdy-btn"><span class="poppins-bold">READ</span> MORE</button></a>
                                </div>
                            </div>                            
                        </div>                       
                        @php
                            $aboutCount++;
                        @endphp                                                      
                    @endforeach      
                </div>
            </div>            
            <div class="col-md-5 col-sm-6 d-flex justify-content-end">
                <div class="abt-img-width">
                    <div class="about-rgt-img img-shadow" id="abtImage" style="background-image: url('{{ $image[1] }}'); ">
                        {{--<img id="abtImage" src="{{$image[1]}}" class="h-100 img-fluid img-shadow">--}}                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!--- About Us ---->

<!--- News ---->
<section class="news">
    <div class="container">
        <h1 class="fir-sub-hd mb-3">NEWS<span class="float-end more-news">MORE NEWS <img src="img/newsarrow.png"></span></h1>   
        <div class="row">            
            @foreach ($news as $key => $item)              
                
                    <div class="@if($key==0)col-md-8 @elseif($key==1)col-md-4 @elseif($key==2) col-md-5 @elseif($key==3) col-md-4 @elseif($key==4)col-md-3 @endif mt-2 pos-rel pe-0 news-h">
                       <a href="{{$item->url}}"> <img src="{{$item->featured_image}}" class="w-100 h-100 news-img img-fluid @if($key==0)radius-tp-lft 
                        @elseif($key==1)radius-tp-rgt @elseif($key==2) radius-btm-lft @elseif($key==4) radius-btm-rgt @endif"></a>
                        <div class="pos-ab @if($key==2) radius-btm-lft @elseif($key==4) radius-btm-rgt @endif">
                            <div class="news-bx-sec">{{ $item->category_name}}</div>
                            <a href="{{$item->url}}" class="text-decoration-none text-white"><h3 class="news-bx-hd">{{ $item->name }}</h3></a>
                            @php
                                $dateTime = new DateTime($item->date_published);
                                $formattedDate = $dateTime->format("d M Y ");
                            @endphp  
                            <div class="news-bx-date">{{ $formattedDate }}</div>
                        </div>
                    </div>                
            @endforeach
        </div>
    </div>   
</section>
<!--- News ---->  
<!--- Testimonial ---->
<section class="testimonial">
    <div class="container">
        <h1 class="fir-sub-hd testi-mb">TESTIMONIALS</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <!-- Carousel -->
                <div id="demo1" class="carousel slide" data-bs-ride="carousel">            
                    <!-- Indicators/dots -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo1" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo1" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo1" data-bs-slide-to="2"></button>
                    </div>
                    <!-- The slideshow/carousel -->
                    <div class="carousel-inner">
                        @foreach($testimonials as $key=> $item)
                        <div class="carousel-item @if($key == 0) active @endif">
                            <div class="row testimonial_bx">
                                <div class="col-md-8 col-sm-12">
                                    <div class="testi-content">
                                        @php
                                            $description = strip_tags($item->description);
                                        @endphp
                                        {{ $description }}
                                        <div class="testi-icon">
                                            <img src="/img/testi-icon.png" class="img-fluid testi-img">
                                        </div>
                                        <div class="">
                                            <a style="text-decoration: none; color: #212529;" href="{{$item->url}}" >
                                                <h2 class="testi-nam">{{$item->name}}</h2>
                                            </a>                                          
                                            @php
                                                $dateTime = new DateTime($item->testimonial_date);
                                                $formattedDate = $dateTime->format("d M Y ");
                                            @endphp  
                                            <h6 class="float-start test-date">{{$formattedDate}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 p-0">
                                    <img src="{{$item->featured_image}}" class="img-fluid w-100 h-80 testi-img">
                                </div>
                            </div>
                        </div>     
                        @endforeach                
                    </div>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo1" data-bs-slide="next">
                        <span class="">Next <i class="fa fa-angle-right ms-3"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- Testimonial ---->
<section class="stay-informed">
    <div class="container">    
        <h1 class="fir-sub-hd">STAY INFORMED</h1>    
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" >
            <strong>Success!</strong> Subscription successful.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>        
        
        <div class="row">
            <div class="input-container-stay">
                
                <input type="email" id="sub-email" class="input-field form-control sub-placeholder" name="email" placeholder="Type your email"  style="width:70%;"/>
                <!---<button class="btn sub-btn" onclick="subscribe()">Subscribe</button> --->
                <span class="invalidEmailAlert"></span>
                <button type="button"  class="btn btn-primary sub-btn" onclick="openMailModal()">Subscribe</button>
                
            </div>
            
        </div>
    </div>
</section>
<div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subscribe via Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" name = "recipient-name" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-email" class="col-form-label">Email:</label>
                        <input type="email" name ="recipient-email" class="form-control" id="recipient-email" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="subscribe()">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection



<script>
/*

 var owl = $('.owl-carousel');
    owl.owlCarousel({
    center: true,
    autoplay:true,
    items:1,
    loop:true,
    margin:20,
    nav:  false,
    navigation: true,
    responsive:{
        600:{
            items:1
        }
    }
});*/

    
</script>