@extends('frontend.layouts.app')

@section('title') {{app_name()}} @endsection

@section('content')
    <!---<div class="container">
        <div class="alert alert-orchestra alert-dismissible mt-4">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            Emergency text / Notification / Alert space
        </div>
    </div> --->
    <div id="content-div">
        <section class="about-breadcrumb">
            <div class="container">
                <div class="row">
                    <ul class="breadcrumb">
                        <li><a href="/">Home</a>/</li>
                        <li><a href="/about-us" class="active"><strong>About Us</strong></a></li>
                    </ul>
                </div>
            </div>
        </section>
       
        <section class="get-to-know">
            <div class="container">
                <div class="row">
                @foreach($aboutTemplate as $item)
                    <div class="col-md-8 col-sm-12">
                    @if ($item->field_name === 'Heading')
                        @php
                        $parts = explode(' ', $item->field_value);
                            echo '<h1 class="about-tp-hd-2 drop-in">' . $parts[0] . '</h1>';
                            echo '<h1 class="about-tp-hd drop-in">' . implode(' ', array_slice($parts, 1)) . '</h1>';
                        @endphp
                    @endif
                    </div>
                    <div class="container">
                        <div class="d-flex justify-content-center">
                        @if ($item->field_name === 'Featured Image')
                           <img src="{{ $item->field_value }}" class="img-shadow about-get-to-know-img"> 
                        @endif
                        </div>
                    </div>
                    @endforeach  
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
            
                   @foreach($aboutTemplate as $item)
                        @if ($item->field_name === 'Post Image Heading')
                            <h1 class="type-writing-hd">{{ strip_tags($item->field_value) }}</h1>
                        @elseif ($item->field_name === 'Description')
                        <div class="css-typing" data-text="{{ strip_tags($item->field_value) }}"></div>                        
                        

                        @elseif ($item->field_name === 'Section 2 Heading')
                        <h3 class="type-writing-hd" id="journeySection">{{ $item->field_value }}</h3>
                        @endif
                    @endforeach 
                     
                    <div class="timeline">
                        @foreach($aboutJourney->sortBy(function ($item) {
                            // Extract the year from field_value
                            preg_match('/(\d{4})/', $item->field_value, $matches);
                            return $matches[0] ?? 0;
                           }) as $index => $item)
                        <div class="time-container {{ $index % 2 == 0 ? 'left-tim' : 'right-tim' }}">
                            <div class="content">
                                @php
                                    // Extract the year and event from field_value
                                    preg_match('/(\d{4}) : (.+)/', $item->field_value, $matches);
                                    $year = $matches[1] ?? '';
                                    $event = $matches[2] ?? '';
                                    
                                @endphp
                                <h4 class="timeline-yr text-center">{{ $year }}</h4>
                                <h6 class="time-yr-sub text-center">{{ $event }}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </div>
        
        <section class="orchestra">
            <div class="container">
                @foreach($aboutTemplate as $item)
                    @if ($item->field_name === 'Section 3 Heading')
                        <h1 class="orchestra-hd">{{ $item->field_value }}</h1>
                    @endif
                @endforeach
                <div class="row">
                        @php
                            $titles = [];
                            $subtitles = [];
                            $images = [];
                            $urls = [];

                        foreach ($section3Data as $data) {
                            $fieldName = $data->field_name;
                            $fieldValue = $data->field_value;

                            if (preg_match('/Section 3 Title (\d+)/i', $fieldName, $matches)) {
                                $titles[$matches[1]] = $fieldValue;
                            } elseif (preg_match('/Section 3 Subtitle (\d+)/i', $fieldName, $matches)) {
                                $subtitles[$matches[1]] = $fieldValue;
                            } elseif (preg_match('/Section 3 Image (\d+)/i', $fieldName, $matches)) {
                                $images[$matches[1]] = $fieldValue;
                            }
                            elseif (preg_match('/Section 3 Url (\d+)/i', $fieldName, $matches)) {
                                $urls[$matches[1]] = $fieldValue;
                            }
                        }
                    @endphp

                    @foreach($titles as $index => $title)
                        <div class="col-md-4 col-sm-6 pos-rel mt-3">
                            <img src="{{ asset($images[$index]) }}" class="orchestra-img">
                            <div class="orches-overlay">                               
                            <a href="{{$urls[$index]}}" class="text-decoration-none text-white"><h3 class="orches-img-hd">{{ $title }}</h3></a>
                                <a href="{{$urls[$index]}}"><div class="orches-img-sub-hd">{{ $subtitles[$index] }}<img src="{{ asset('img/orches-rgt-arw.png') }}" class="ms-2 img-fluid"></div></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

                        {{--
        <section class="find-out">
            <div class="container">
                @foreach($aboutTemplate as $item)
                    @if ($item->field_name === 'Section 4 Heading')
                        <h1 class="find-out-hd">{{ $item->field_value }}</h1>
                    @endif
                @endforeach
                <div class="row">
                    @php
                        $titles = [];
                        $subtitles = [];
                        $urls = [];

                        foreach ($section4Data as $data) {
                            $fieldName = $data->field_name;
                            $fieldValue = $data->field_value;

                            if (preg_match('/Section 4 Title (\d+)/i', $fieldName, $matches)) {
                                $titles[$matches[1]] = $fieldValue;
                            } elseif (preg_match('/Section 4 Subtitle (\d+)/i', $fieldName, $matches)) {
                                $subtitles[$matches[1]] = $fieldValue;
                            } elseif (preg_match('/Section 4 Url (\d+)/i', $fieldName, $matches)) {
                                $urls[$matches[1]] = $fieldValue;
                            }
                        }
                    @endphp

                    @foreach($titles as $index => $title)
                            <div class="col-md-4 col-sm-6 @if($index == 1)offset-md-2 @endif">
                                <div class="find-out-sub-h">{{ $title }}</div>
                                @if(isset($subtitles[$index]))
                                    <div class="find-out-sub-p">{{ $subtitles[$index] }}</div>
                                @endif
                                <a href="{{ $urls[$index] }}"><button class="btn accr-bdy-btn"><span class="poppins-bold">READ</span> MORE</button></a>
                            </div>
                    @endforeach
                </div>
            </div>
        </section>
        --}}
        <section class="stay-informed">
    <div class="container">    
        <h1 class="fir-sub-hd">STAY IN TOUCH</h1>    
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert" >
            <strong>Success!</strong> Subscription successful.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>        
        
        <div class="row">
            <div class="input-container-stay">
                
                <input type="email" id="sub-email" class="input-field form-control sub-placeholder" name="email" placeholder="Type your email" />
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
    var str = $(".css-typing").text();
     // This will alert the content of the div
    var spans = '<span>' + str.split('').join('</span><span>') + '</span>';
    $(spans).hide().appendTo('.css-typing').each(function (i) {
        $(this).delay(20 * i).css({
            display: 'inline',
            opacity: 0.5
        }).animate({
            opacity: 1
        }, 100);
    });

    </script>