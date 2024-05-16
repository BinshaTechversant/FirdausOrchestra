@extends('frontend.layouts.app')

@section('title') Terms &amp; Conditions - {{ config('app.name') }} @endsection

@section('content')
<div class="page-header page-header-small clear-filter" filter-color="orange">    
    {{--<div class="container">
        <h3 class="title">
            Terms &amp; Conditions - {{ config('app.name') }}
        </h3>
    </div>--}}
</div>

<div class="section mt-4">
    <h3 class ="text-center">Terms of Use Agreement</h3>
    <div class="container text-left">
        @foreach($termsData as $key=> $item)
            <div class="terms-content">
                {!! ($item->field_value) !!}
            </div>
        @endforeach
    </div>
</div>
@endsection
