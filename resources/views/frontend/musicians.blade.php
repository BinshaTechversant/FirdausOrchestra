@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
<div id="content-div">
  <section class="top-breadcrumb">
    <div class="container">
      <div class="row">
        <ul class="breadcrumb">
          <li><a href="/">Home</a>/</li>
          <li><a href="/about-us">About Us</a>/</li>
          <li><a href="/firdaus-orchestra-musicians" class="active">Musicians</a></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="musicians-top">
    <div class="container">
      <div class="row">
          @if(!empty($topContent))
            <div class="col-md-8">
              <h1 class="musicians-tp-hd drop-in">{{ $topContent['Heading1'] }}</h1>
              <h1 class="musicians-tp-hd-2 drop-in">{{ $topContent['Heading2'] }}</h1>
              <div class="musicians-tp-p drop-in-2">
              {{ $topContent['Content'] }}
              </div>
            </div>
            <div class="col-md-4">
             <img src="{{ $topContent['Image1'] }}" class="img-fluid musi-max-h-img img-shadow"> 
            </div>
          @endif
      </div>
    </div>
  </section>

  <section class="meet-musicians">
    <div class="container">
        <div class="row">
                <h1 class="meet-musicians-hd">Our Musicians</h1>
                
                    <div class="row">
                        @foreach($topMusicians as $index => $item)
                        <div class="col-sm-4 artist-item  openModalButton @if($index == 1) sec-artist @elseif($index == 2) third-artist @endif" data-index="{{ $index }}" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                            <div class="artist-img hovertop column"> 
                                <figure><img src="{{$item->file}}" width="100%"></figure>
                            </div>
                            <div class="artist-details">
                                <h4 @if($loop->iteration !=1) class="artist-heading" @endif >{{$item->name}}</h4>
                                <h5 @if($loop->iteration !=1) class="artist-content" @endif>{{$item->designation}}</h5>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                
            </div>
        
            <h5 class="meet-musicians-filtr">Filter By</h5>
            <!-- Nav pills -->
            <ul class="nav nav-pills d-flex justify-content-around" role="tablist">
                @foreach($category as $key => $catItem)
                    <li class="nav-item">
                        <a class="nav-link @if($key == 0) active @endif mm-filter-btn" data-bs-toggle="pill"
                            href="#{{ strtolower(str_replace(' ', '', $catItem->name)) }}">{{$catItem->name}}</a>
                    </li>
                @endforeach
            </ul>
            <!-- Tab panes -->
            <div class="tab-content meetmusicians1">
                @foreach($category as $cat)
                    <div id="{{ strtolower(str_replace(' ', '', $cat->name)) }}"
                        class="container tab-pane @if($loop->first) active @else fade @endif">
                        <br>
                        @if($loop->first)
                            <ul class="nav nav-pills d-flex justify-content-center mt-4" role="tablist">
                                @foreach($subcategory1 as $st)
                                    <li class="nav-item">
                                        <a class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill"
                                            href="#{{strtolower(str_replace(' ', '_', $st->name))}}">{{$st->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <hr class="vio-hr">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                @foreach($subcategory1 as $st)
                                    <div id="{{ strtolower(str_replace(' ', '_', $st->name)) }}"
                                        class="container tab-pane @if($loop->first) active @else fade @endif mb-4"><br>
                                        @if($loop->first)                                            
                                            <div class="row musician-scroll">
                                                @foreach($musicians[$st->name]->where('designation_category', 'First Violin') as $item)
                                                    
                                                        
                                                            <div class="col-md-3 col-sm-6 mt-4 openModalButton" id="openModalButton" data-id = "{{$item->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                                                <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                                   <figure> <img src="{{ $item->file }}" class="img-fluid"></figure>
                                                                </div>
                                                                <div class="musi-name">{{ $item->name }}</div>
                                                                <div class="musi-name2">{{ $item->designation }}</div>
                                                                <div class="musi-name3">{{ $item->designation_category }}</div>
                                                            </div>
                                                       
                                                    
                                                    
                                                @endforeach
                                                <hr class="vio-hr-1">
                                                @foreach($musicians[$st->name]->where('designation_category', 'Second Violin') as $item)                                               
                                                    
                                                        <div class="col-md-3 col-sm-6 mt-4 openModalButton" id="openModalButton" data-id="{{$item->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
                                                            <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                                <figure> <img src="{{ $item->file }}" class="img-fluid"></figure>
                                                            </div>
                                                            <div class="musi-name">{{ $item->name }}</div>
                                                            <div class="musi-name2">{{ $item->designation }}</div>
                                                            <div class="musi-name3">{{ $item->designation_category }}</div>
                                                        </div>
                                                   
                                               
                                                
                                            @endforeach
                                            <hr class="vio-hr-1">
                                            </div>
                                        @else  
                                        
                                            <div class="row @if(count($musicians[$st->name])>4) musician-scroll @endif" >                                        
                                                @foreach($musicians[$st->name] as $item)
                                                                                                    
                                                    
                                                    <div class="col-md-3 col-sm-6 mt-4 openModalButton" data-id = "{{$item->id}}">
                                                        <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                            <figure> <img src="{{ $item->file }}" class="img-fluid"></figure>
                                                        </div>
                                                        <div class="musi-name">{{ $item->name }}</div>
                                                        <div class="musi-name2">{{ $item->designation }}</div>
                                                        <div class="musi-name3">{{ $item->designation_category }}</div>
                                                    </div>
                                                    
                                            
                                                
                                                @endforeach
                                            
                                            <hr class="vio-hr-1">
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                          
                           @elseif($loop->iteration == 2)
                          <ul class="nav nav-pills d-flex justify-content-center mt-4" role="tablist">
                                @foreach($subcategory2 as $st)
                                    <li class="nav-item">
                                        <a class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill"
                                            href="#{{strtolower(str_replace(' ', '_', $st->name))}}">{{$st->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <hr class="vio-hr">
                            <div class="tab-content ">
                                @foreach($subcategory2 as $st)
                                    <div id="{{ strtolower(str_replace(' ', '_', $st->name)) }}"
                                        class="container tab-pane @if($loop->first) active @else fade @endif mb-4"><br>
                                        @if($loop->first)                                            
                                            <div class="row @if(count($musicians2[$st->name])>4) musician-scroll @endif">
                                                @foreach($musicians2[$st->name]->chunk(6) as $chunk)
                                                    <div class="row">
                                                        @foreach($chunk as $item)
                                                            <div class="col-md-3 col-sm-6 mt-4 openModalButton" data-id = "{{$item->id}}">
                                                                <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                                  <figure> <img src="{{ $item->file }}" class="img-fluid"> </figure>
                                                                </div>
                                                                <div class="musi-name">{{ $item->name }}</div>
                                                                <div class="musi-name2">{{ $item->designation }}</div>
                                                                <div class="musi-name3">{{ $item->designation_category }}</div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <hr class="vio-hr-1">
                                                @endforeach
                                            </div>
                                        @else                                         
                                            @foreach($musicians2[$st->name] ->chunk(6) as $chunk)
                                              <div class="row @if(count($musicians2[$st->name])>4) musician-scroll @endif">                                                        
                                                @foreach($chunk as $item)
                                                  <div class="col-md-3 col-sm-6 mt-4 openModalButton" data-id = "{{$item->id}}">
                                                      <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                         <figure> <img src="{{ $item->file }}" class="img-fluid"></figure>
                                                      </div>
                                                      <div class="musi-name">{{ $item->name }}</div>
                                                      <div class="musi-name2">{{ $item->designation }}</div>
                                                      <div class="musi-name3">{{ $item->designation_category }}</div>
                                                  </div>
                                                @endforeach
                                              </div>
                                              <hr class="vio-hr-1">
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </div> 
                            @elseif($loop->iteration == 3)
                          <ul class="nav nav-pills d-flex justify-content-center mt-4" role="tablist">
                                @foreach($subcategory3 as $st)
                                    <li class="nav-item">
                                        <a class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill"
                                            href="#{{strtolower(str_replace(' ', '_', $st->name))}}">{{$st->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <hr class="vio-hr">
                            <div class="tab-content">
                                @foreach($subcategory3 as $st)
                                    <div id="{{ strtolower(str_replace(' ', '_', $st->name)) }}"
                                        class="container tab-pane @if($loop->first) active @else fade @endif mb-4"><br>
                                        @if($loop->first)                                            
                                            <div class="row @if(count($musicians3[$st->name])>4) musician-scroll @endif">
                                                @foreach($musicians3[$st->name]->chunk(6) as $chunk)
                                                    <div class="row">
                                                        @foreach($chunk as $item)
                                                            <div class="col-md-3 col-sm-6 mt-4 openModalButton" data-id = "{{$item->id}}">
                                                                <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                                   <figure> <img src="{{ $item->file }}" class="img-fluid"></figure>
                                                                </div>
                                                                <div class="musi-name">{{ $item->name }}</div>
                                                                <div class="musi-name2">{{ $item->designation }}</div>
                                                                <div class="musi-name3">{{ $item->designation_category }}</div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <hr class="vio-hr-1">
                                                @endforeach
                                            </div>
                                        @else
                                            
                                            @foreach($musicians3[$st->name] ->chunk(6) as $chunk)
                                              <div class="row @if(count($musicians3[$st->name])>4) musician-scroll @endif">                                                        
                                                @foreach($chunk as $item)
                                                  <div class="col-md-3 col-sm-6 mt-4 openModalButton" data-id = "{{$item->id}}">
                                                      <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                         <figure> <img src="{{ $item->file }}" class="img-fluid"></figure>
                                                      </div>
                                                      <div class="musi-name">{{ $item->name }}</div>
                                                      <div class="musi-name2">{{ $item->designation }}</div>
                                                      <div class="musi-name3">{{ $item->designation_category }}</div>
                                                  </div>
                                                @endforeach
                                              </div>
                                              <hr class="vio-hr-1">
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            @elseif($loop->iteration == 4)
                          <ul class="nav nav-pills d-flex justify-content-center mt-4" role="tablist">
                                @foreach($subcategory4 as $st)
                                    <li class="nav-item">
                                        <a class="nav-link @if($loop->first) active @endif" data-bs-toggle="pill"
                                            href="#{{strtolower(str_replace(' ', '_', $st->name))}}">{{$st->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <hr class="vio-hr">
                            <div class="tab-content  ">
                                @foreach($subcategory4 as $st)
                                    <div id="{{ strtolower(str_replace(' ', '_', $st->name)) }}"
                                        class="container tab-pane @if($loop->first) active @else fade @endif mb-4"><br>
                                        @if($loop->first)
                                            
                                            <div class="row @if(count($musicians4[$st->name])>4) musician-scroll @endif">
                                                @foreach($musicians4[$st->name]->chunk(6) as $chunk)
                                                    <div class="row">
                                                        @foreach($chunk as $item)
                                                            <div class="col-md-3 col-sm-6 mt-4 openModalButton" data-id = "{{$item->id}}">
                                                                <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                                   <figure> <img src="{{ $item->file }}" class="img-fluid"></figure>
                                                                </div>
                                                                <div class="musi-name">{{ $item->name }}</div>
                                                                <div class="musi-name2">{{ $item->designation }}</div>
                                                                <div class="musi-name3">{{ $item->designation_category }}</div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <hr class="vio-hr-1">
                                                @endforeach
                                            </div>
                                        @else 
                                            
                                            @foreach($musicians4[$st->name] ->chunk(6) as $chunk)
                                              <div class="row @if(count($musicians4[$st->name])>4) musician-scroll @endif"">                                                        
                                                @foreach($chunk as $item)
                                                  <div class="col-md-3 col-sm-6 mt-4 openModalButton" data-id = "{{$item->id}}">
                                                      <div class="vio-musi-img mx-auto d-block hoverflash column">
                                                          <figure><img src="{{ $item->file }}" class="img-fluid"></figure>
                                                      </div>
                                                      <div class="musi-name">{{ $item->name }}</div>
                                                      <div class="musi-name2">{{ $item->designation }}</div>
                                                      <div class="musi-name3">{{ $item->designation_category }}</div>
                                                  </div>
                                                @endforeach
                                              </div>
                                              <hr class="vio-hr-1">
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            
    </div>
</section>

  <section class="mm-upcoming-performance">
    <div class="container-fluid">
      <div class="row mm-up-per-div">
      @if(!empty($topContent))
        <img src="{{ $topContent['Image2'] }}" class="img-fluid p-0">
        
        <div class="mm-centered">
          <h1 class="mm-up-per-content">{{ strtoupper($topContent['EventName']) }}</h1>
          <a href="/events"><button class="btn mm-cal-btn">View Calender</button></a>
        </div>
      @endif
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered musicModal">
    <div class="modal-content">    
      <div class="modal-body">      
        <div class="artist-modal">
          <button type="button" class="btn-close modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="row">
            <div class="col-md-6 text-center">
              <img src="img/artist-1.png" id ="imgText" class="img-fluid"/>
            </div>
            <div class="col-md-6">
              <div class="artist-details">
                <h4 class="text-left" id="titleText"></h4>
                <h5 class="text-left mt-2" id="roleText"></h5>
              </div>
              <p id ="quoteText" class="mt-3"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection