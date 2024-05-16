@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item type="active" icon='{{ $module_icon }}'>{{ __($module_title) }}</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection
@props(["data"=>"", "module_name", "module_path", "module_title"=>"", "module_icon"=>"", "module_action"=>""])
@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ __($module_title) }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
            </x-slot>
            <x-slot name="toolbar">
                <x-backend.buttons.return-back />
            </x-slot>
        </x-backend.section-header>

        <hr>
        <div class="row mt-4">
            <div class="col">
        @if($captchaCount==0)
        <form method="post" action="{{ route('backend.captcha.store') }}" class="form-horizontal" role="form">
       
            {!! csrf_field() !!}

            <div class="col-12 col-sm-4 mb-3">
                <div class="form-group">
                    <?php
                    $field_name = 'captcha_toggle';
                    $field_label = label_case($field_name);
                    $field_placeholder = "-- Select an option --";
                    $required = "required";
                    $select_options = [
                        '1' => 'Enable',
                        '0' => 'Disable'                
                    ];
                    if($captchaCount!=0){
                        $selected_value = old($field_name, $captchaStatus); // Use old() to get the previously submitted value or default to '0'
                    }
                    ?>
                    {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                    @if($captchaCount!=0)
                    {{ html()->select($field_name, $select_options,$selected_value)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
                    @else
                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
                    @endif
                </div>
            </div>
            <div class="row m-b-md">
                <div class="col-md-12">
                    <button class="btn-primary btn">
                        <i class='fas fa-save'></i> @lang('Save')
                    </button>
                </div>
            </div>
        </form>
        @else
        @props(["data"=>"", "module_name", "module_path", "module_title"=>"", "module_icon"=>"", "module_action"=>""])

    <div class="card-body">
    <form method="patch" action="/admin/captcha/1" class="form-horizontal" role="form">
       
        

        <div class="row mt-4">
            <div class="col">
                
                <div class="col-12 col-sm-4 mb-3">
                <div class="form-group">
                    <?php
                    $field_name = 'captcha_toggle';
                    $field_label = label_case($field_name);
                    $field_placeholder = "-- Select an option --";
                    $required = "required";
                    $select_options = [
                        '1' => 'Enable',
                        '0' => 'Disable'                
                    ];
                    if($captchaCount!=0){
                        $selected_value = old($field_name, $captchaStatus); // Use old() to get the previously submitted value or default to '0'
                    }
                    ?>
                    {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                    @if($captchaCount!=0)
                    {{ html()->select($field_name, $select_options,$selected_value)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
                    @else
                        {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
                    @endif
                </div>
            </div>
                

                <div class="row">
                    <div class="col-4 mt-4">
                        <x-backend.buttons.save />
                    </div>

                    <div class="col-8 mt-4">
                        <div class="float-end">
                            @can('delete_'.$module_name)
                            <a href='{{route("backend.$module_name.destroy", $data)}}' class="btn btn-danger" data-method="DELETE" data-token="{{csrf_token()}}" data-toggle="tooltip" title="{{__('Delete')}}"><i class="fas fa-trash-alt"></i></a>
                            @endcan
                            <x-backend.buttons.cancel />
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    
        @endif
            
        

               
            </div>
        </div>
        


                  
        
    </div>
    <div class="card-footer">
        <div class="row">

        </div>
    </div>
</div>
<x-library.select2 />
@endsection