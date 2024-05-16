<div class="row">    
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'header_logo';
            $field_lable =label_case($field_name);
            $required = "";
            $field_placeholder = $field_lable;            
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            <div class="input-group mb-3">
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", 'aria-label'=>'Image', 'aria-describedby'=>'button-image']) }}
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="button-image" data-input="{{$field_name}}"><i class="fas fa-folder-open"></i> @lang('Browse')</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'footer_logo';
            $field_lable =label_case($field_name);
            $required = "";
            $field_placeholder = $field_lable;            
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            <div class="input-group mb-3">
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", 'aria-label'=>'Image', 'aria-describedby'=>'button-image']) }}
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="button-image1" data-input="{{$field_name}}"><i class="fas fa-folder-open"></i> @lang('Browse')</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-3">
            <div class="form-group">
                <?php
                $field_name = 'footer_content';
                $field_lable = label_case($field_name);
                $field_placeholder = $field_lable;
                $required = "required";
                ?>
                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-8 mb-3">
            <div class="form-group">
                <?php
                $field_name = 'copyright';
                $field_lable = label_case($field_name);
                $field_placeholder = $field_lable;
                $required = "required";
                ?>
                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 mb-3">
            <div class="form-group">
                <div class="form-check form-switch">
                    <?php
                    $field_name = 'buy_tickets';
                    $field_lable = label_case($field_name);
                    $field_placeholder = $field_lable;
                    ?>
                    {{ html()->label($field_lable, $field_name)->class('form-check-label') }} 
                    @if(isset($data->buy_tickets))
                        {{ html()->checkbox($field_name)->class('form-check-input')->value($data->buy_tickets) }} 
                    @else
                    {{ html()->checkbox($field_name)->class('form-check-input')->value(0)}}
                    @endif                         
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 mb-3">
            <div class="form-group">
                <div class="form-check form-switch">
                    <?php
                    $field_name = 'sign_in';
                    $field_lable = label_case($field_name);
                    $field_placeholder = $field_lable; 
                    ?>
                    {{ html()->label($field_lable, $field_name)->class('form-check-label') }} 
                    @if(isset($data->sign_in))
                        {{ html()->checkbox($field_name)->class('form-check-input')->value($data->sign_in) }} 
                    @else
                    {{ html()->checkbox($field_name)->class('form-check-input')->value(0)}}      
                    @endif        
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 mb-3">
            <div class="form-group">
                <div class="form-check form-switch">
                    <?php
                    $field_name = 'search';
                    $field_lable = label_case($field_name);
                    $field_placeholder = $field_lable;   
                    ?>
                    {{ html()->label($field_lable, $field_name)->class('form-check-label') }}                      
                    @if(isset($data->search))
                        {{ html()->checkbox($field_name)->class('form-check-input')->value($data->search) }} 
                    @else  
                        {{ html()->checkbox($field_name)->class('form-check-input')->value(0) }} 
                    @endif        
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-12 col-sm-4 mb-3">    
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_lable = label_case($field_name);
            $field_placeholder = "-- Select an option --";
            $required = "required";
            if(Auth::check()){
                foreach(Auth::user()->roles as $role){
                    if($role->name === 'super admin' || $role->name === 'administrator'){
                        $select_options = [
                            '1'=>'Published',
                            '0'=>'Unpublished',
                            '2'=>'Draft'
                        ];
                    }else{
                        $select_options = [
                            '0'=>'Unpublished',
                            '2'=>'Draft'
                        ];
                    }
                }
            }          
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
</div>



<x-library.select2 />
<!-- File Manager -->
@push('after-styles')
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
<style>
    .note-editor.note-frame :after {
        display: none;
    }

    .note-editor .note-toolbar .note-dropdown-menu,
    .note-popover .popover-content .note-dropdown-menu {
        min-width: 180px;
    }
</style>
@endpush

@push ('after-scripts')
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script type="module">
    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {

                lfm({
                    type: 'image',
                    prefix: '/laravel-filemanager'
                }, function(lfmItems, path) {
                    lfmItems.forEach(function(lfmItem) {
                        context.invoke('insertImage', lfmItem.url);
                    });
                });

            }
        });
        return button.render();
    };

    $('#footer_content').summernote({
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['fontname', 'fontsize', 'bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'lfm', 'video']],
            ['view', ['codeview', 'undo', 'redo', 'help']],
        ],
        buttons: {
            lfm: LFMButton
        }
    });
</script>

<script type="module" src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script type="module">
    $('#button-image').filemanager('image');
    $('#button-image1').filemanager('image');
</script>

<script type="module">
    $(document).ready(function() {
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
            document.querySelector('.select2-container--open .select2-search__field').focus();
        });      

        
    });
</script>
<script>
    $(document).ready(function () {
        
        $('input[name="buy_tickets"]').click(function () {
            
            $(this).val($(this).val() == '1' ? '0' : '1');
        });
        $('input[name="sign_in"]').click(function () {
            
            $(this).val($(this).val() == '1' ? '0' : '1');
        });
        $('input[name="search"]').click(function () {
            
            $(this).val($(this).val() == '1' ? '0' : '1');
        });
    });
</script>