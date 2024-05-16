@extends('frontend.layouts.app')

@section('title') Privacy Policy - {{ config('app.name') }} @endsection

@section('content')
<div class="page-header page-header-small clear-filter" filter-color="orange">
    
    {{--<div class="container mt-4">
        <h3 class="title">
            Privacy Policy - {{ config('app.name') }}
        </h3>
    </div> --}}
</div>

<div class="section mt-4" id="privacyDiv" >
    <div class="container text-left">
        <h3 class ="text-center">Privacy Notice</h3>
        @foreach($privacyData as $key=> $item)
            <div class="privacy-content">
                    {!! ($item->field_value) !!}
            </div>
        @endforeach
    </div>
</div>
@endsection
