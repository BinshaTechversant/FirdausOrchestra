@extends('frontend.layouts.app')

@section('title') FAQ - {{ config('app.name') }} @endsection

@section('content')
<div class="page-header page-header-small clear-filter" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image:url('{{asset('img/cover-01.jpg')}}');">
    </div>
    <div class="container mt-4">
        <h3 class="title">
            FAQs - {{ config('app.name') }}
        </h3>
    </div>
</div>
{{--<div class="section">
    <div class="container text-left py-4">       
        @foreach($faqData as $key=> $item)
            {!! ($item->field_value) !!}
        @endforeach        
    </div>
</div>--}}
@php
    $heading = [];
    $content = [];
    foreach ($faqData as $data) {
        $fieldName = $data->field_name;
        $fieldValue = $data->field_value;
        if (preg_match('/Heading(\d+)/i', $fieldName, $matches)) {
            $heading[$matches[1]] = $fieldValue;
        } elseif (preg_match('/Content(\d+)/i', $fieldName, $matches)) {
            $content[$matches[1]] = $fieldValue;
        }
    }
@endphp
<section class="faq-section mt-4">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion accordion-flush" id="faqlist1">
                @foreach($heading as $index => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-{{ $loop->index + 1 }}">
                                    {{ $heading[$index] }}
                                </button>
                            </h2>
                            <div id="faq-content-{{ $loop->index + 1 }}" class="accordion-collapse collapse"
                                 data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    {{ $content[$index] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
