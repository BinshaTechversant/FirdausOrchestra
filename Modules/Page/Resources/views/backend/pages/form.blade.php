
<div class="row">
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_label = 'Page Name';
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
        <?php
            $field_name = 'template_id';
            $field_label = 'Template Name';
            $field_placeholder = "-- Select an option --";
            $required = "required";
           
            $select_options = [];
            $templates = DB::table('templates')->get();
            foreach ($templates as $template) {
                $select_options[$template->id] = $template->name;
            }
            
            ?>
             {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
             {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->id('templateSelect') }}
        </div>
    </div>
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

<div class="row">
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'url';
            $field_lable = 'Page Url';
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row" id="dynamicFieldsContainer">
    <!-- Dynamic content will be inserted here -->
</div>
{{--
<div class="row" >
    <div class="col-12 col-sm-12 mb-3">
        <div class="form-group" id="richText">
            <?php
            
            $field_name = 'content';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div> --}}

<div id="templateDetails">

    <!-- details based on the selected template will be displayed -->
    @if (isset($pageFields))
   
        @foreach($pageFields as $field)
       
            <div class="{{ $field->field_type === 'textarea' ? 'col-12' : ($field->field_type === 'input' ? 'col-8' : 'col-12 col-sm-4') }} mb-3">
                <div class="form-group">
                    <label for="{{ $field->name }}">{{ $field->name }}:</label>

                    @if ($field->field_type === 'text')
                        <input type="text" name="fields[{{ $field->field_id }}][value]" id="{{ $field->name }}" class="form-control" required value="">
                    @elseif ($field->field_type === 'textarea')
                        <textarea name="fields[{{ $field->field_id }}][value]" id="{{ $field->name }}" class="form-control" required></textarea>
                    @elseif ($field->field_type === 'rich_text')
                        <textarea name="fields[{{ $field->field_id }}][value]" id="content" class="form-control rich_text" required></textarea>
                        @elseif ($field->field_type === 'input')
                        <div class="input-group mb-3">
                            <input type="text" name="fields[{{ $field->field_id }}][value]" id="{{ $field->name }}" class="form-control" required placeholder="{{ $field->name }}" aria-label="Image" aria-describedby="button-image" value="">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="button" id="button-image" data-input="{{ $field->name }}"><i class="fas fa-folder-open"></i> Browse</button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <?php
                    $field_name = 'content';
                    $field_lable = "Content1";
                    $field_placeholder = $field_lable;
                    $required = "required";
                    ?>
                    {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
                    {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
                </div>
            </div>
        @endforeach
    @endif
</div>

<div class="row mb-3">
    <div class="col-5">
        <div class="form-group">
            <?php
            $field_name = 'meta_title';
            $field_lable = 'Meta Title';
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-5">
        <div class="form-group">
            <?php
            $field_name = 'meta_keywords';
            $field_lable = 'Meta Keywords';
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <?php
            $field_name = 'order';
            $field_lable = 'Order';
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_description';
            $field_lable = 'Meta Description';
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_og_image';
            $field_lable = 'Meta Open Graph Image';
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'meta_og_url';
            $field_lable = 'Meta Open Graph URL';
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script type="module">
    $(document).ready(function() {        
      
        var templateSelectValue = $('#templateSelect').val();


        var edit = 1;
        if (templateSelectValue) {
            var currentUrl = window.location.href;        
            var urlParts = currentUrl.split('/');
            var pageIndex = urlParts.indexOf('pages');
            // Extract the pageId
            if (pageIndex !== -1 && pageIndex < urlParts.length - 1) {
                var pageId = urlParts[pageIndex + 1];                
            }
            
            $.ajax({
                url: '{{ route("backend.pages.pageData") }}',
                type: 'POST',
                data: { template_id: templateSelectValue, 
                     page_id: pageId,
                    _token: '{{ csrf_token() }}' },
                success: function(response) {
                    console.log(response); 

                    displayFields(response,edit);
                },
                error: function(error) {
                    console.log(error);
                    if (error.responseText) {
                        console.log('Response text:', error.responseText);
                    }
                }
            });
           
        } 
        $('#templateSelect').change(function() {
            var templateId = $(this).val();            
            var edit = 0;
            $.ajax({
                url: '{{ route("backend.pages.template") }}',
                type: 'POST',
                data: { template_id: templateId, _token: '{{ csrf_token() }}' },
                success: function(response) {
                    console.log(response);  
                    displayFields(response,edit);
                },
                error: function(error) {
                    console.log(error);
                    if (error.responseText) {
                        console.log('Response text:', error.responseText);
                    }
                }
            });
        });
        function setSummerNoteValue(fieldId, fieldValue){
    
            $("#"+fieldId).summernote('code',fieldValue);
        }
        function displayFields(fields,status) {
            
            var fieldsHtml = '';
            
              
            // Loop through the fields and generate HTML based on field type
            fields.forEach(function(field, index) {
                // Start a new row container for every three fields
                if (index % 3 === 0) {
                    fieldsHtml += '<div class="row">';
                }
                
                fieldsHtml += '<div class="' + (field.field_type === 'textarea' ? 'col-12' : 'col-12 col-sm-4') + ' mb-3">';
                fieldsHtml += '<div class="form-group">';
                if (field.field_type === 'text' || field.field_type === 'textarea' || field.field_type === 'input') {
                fieldsHtml += '<label for="' + field.name + '">' + field.name + ': </label>';
                }

                if (field.field_type === 'text') {
                    
                if (field.name === 'Journey') {
                    fieldsHtml += '<div class="input-group mb-3">';
                    fieldsHtml += '<input type="text" name="fields[' + field.id + '][value][]" class="form-control journey-input"';
                    if (status == 1) {
                        fieldsHtml += ' value="' + (field.field_value !== null ? field.field_value : "") + '"'; 
                    }
                    fieldsHtml += ' required>';
                    fieldsHtml += '<input type="text" hidden name="journey" value="'+ field.id +'">';
                    fieldsHtml += '<div class="input-group-append">';
                    fieldsHtml += '<button class="btn btn-success add-journey" type="button"><i class="fas fa-plus"></i> Add</button>';
                    fieldsHtml += '</div>';
                    fieldsHtml += '</div>';
                } else {
                    fieldsHtml += '<input type="text" name="fields[' + field.id + '][value]" id="' + field.name.replace(/\s/g, '_') +'" class="form-control"';
                    if (status == 1) {
                        fieldsHtml += ' value="' + (field.field_value !== null ? field.field_value : "") + '"';                 }                    
                    fieldsHtml += ' required>';
                }
            } 
               /* else if (field.field_type === 'text') {
                    fieldsHtml += '<input type="text" name="fields[' + field.id + '][value]" id="' + field.name.replace(/\s/g, '_') + '" class="form-control" ';
                    if (status == 1) {
                        fieldsHtml += ' value="' + field.field_value + '"';                    }                    
                    fieldsHtml += ' required>';
                }*/ else if (field.field_type === 'textarea') {
                    fieldsHtml += '<textarea name="fields[' + field.id + '][value]" id="' + field.name.replace(/\s/g, '_') + '" class="form-control" required>'
                    if (status == 1) {
                        //fieldsHtml += field.field_value;
                        fieldsHtml += (field.field_value !== null ? field.field_value : "");
                    }
                    fieldsHtml += '</textarea>';
                    

                } 
                else if (field.field_type === 'rich_text') { 
                    var dynamicFieldsContainer = $('#dynamicFieldsContainer');                   
                    dynamicFieldsContainer.empty();                   
                    var summernoteInstances = [];

                    for (var i = 0; i < fields.length; i++) {
                        var currentField = fields[i];
                        if (currentField.field_type === 'rich_text') {
                        var fieldName = `fields[${currentField.id}][value]`;
                        var fieldId = currentField.name.replace(/\s/g, '_');
                        var fieldLabel = currentField.name;
                        var fieldPlaceholder = fieldLabel;
                        var required = 'required';

                        var dynamicFieldHtml = `
                            <div class="col-12 col-sm-12 mb-3">
                                <div class="form-group" id="richText_${i}">
                                    ${htmlLabel(fieldLabel, fieldName, fieldId)} 
                                    ${htmlTextarea(fieldName, fieldPlaceholder, fieldId, required)}
                                </div>
                            </div>
                        `;

                        dynamicFieldsContainer.append(dynamicFieldHtml);

                        // Use closure to capture the current values correctly
                        (function (id, field, fieldValue) {
                            $(`#${id}`).summernote({
                                callbacks: {
                                    onInit: function () {
                                        if (status == 1 && field.id == field.id) {
                                            setSummerNoteValue(id, fieldValue !== null ? fieldValue : "");
                                        }
                                    }
                                }
                            });
                        })(fieldId, currentField, currentField.field_value);

                        summernoteInstances.push("#" + fieldId);
                    }}

                    // Initialize Summernote for all instances
                    $(summernoteInstances.join(', ')).summernote();
                }

                // $("div#richText").css("display","block");
                   // $("#content").attr("id",field.name.replace(/\s/g, '_'));
                   /* $("#content").attr("name", 'fields[' + field.id + '][value]');
                    $('#content').summernote({ 
                                        
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
                    if(status == 1){                        
                        $('#'+field.name.replace(/\s/g, '_')).summernote('code', field.field_value);
                    }   */         
                else if (field.field_type === 'input') {
                    fieldsHtml += '<div class="input-group mb-3">';
                    fieldsHtml += '<input type="text" name="fields[' + field.id + '][value]" id="input_' + field.id + '" class="form-control"';
                    if (status == 1) {
                       // fieldsHtml += ' value="' + field.field_value + '"';
                       fieldsHtml += ' value="' + (field.field_value !== null ? field.field_value : "") + '"';  
                    }
                    fieldsHtml += ' required placeholder="' + field.name + '" aria-label="Image" aria-describedby="button-image_' + field.id + '">';
                    fieldsHtml += '<div class="input-group-append">';
                    fieldsHtml += '<button class="btn btn-info" type="button" id="button-image_' + field.id + '" data-input="input_' + field.id + '"><i class="fas fa-folder-open"></i> @lang('Browse')</button>';
                    fieldsHtml += '</div>';
                    fieldsHtml += '</div>';
                } 

                fieldsHtml += '</div>';
                fieldsHtml += '</div>';

                // Close the row container for every three fields
                if ((index + 1) % 3 === 0 || (index + 1) === fields.length) {
                    fieldsHtml += '</div>';
                }
            });

            // Update the details container with the generated fields HTML
            document.getElementById('templateDetails').innerHTML = fieldsHtml;

            // Initialize file manager for each button
            fields.forEach(function(field) {
                if (field.name === 'Journey') {
            // Handle click event for dynamically generated "Add" buttons for "journey" field
            $(document).on('click', '.add-journey', function () {
                var journeyInput = '<div class="input-group mb-3">';
                journeyInput += '<input type="text" name="fields[' + field.id + '][value][]" class="form-control journey-input" required>';
                journeyInput += '<div class="input-group-append">';
                journeyInput += '<button class="btn btn-danger remove-journey" type="button"><i class="fas fa-minus"></i> Remove</button>';
                journeyInput += '</div>';
                journeyInput += '</div>';

                $(this).closest('.input-group').after(journeyInput);
                
            });

            // Handle click event for dynamically generated "Remove" buttons for "journey" field
            $(document).on('click', '.remove-journey', function () {
                $(this).closest('.input-group').remove();
            });
        }


                $('#button-image_' + field.id).filemanager('image');

                // Handle click event for dynamically generated buttons
                $(document).on('click', '#button-image_' + field.id, function() {
                    var inputId = $(this).data('input');
                    lfm({
                        type: 'image',
                        prefix: '/laravel-filemanager',
                    }, function(lfmItems, path) {
                        lfmItems.forEach(function(lfmItem) {
                            $('#' + inputId).val(lfmItem.url);
                        });
                    });
                });
            });
        }

        function htmlLabel(label, name ,id) {
            
    return `<label class="form-label" for="${id}">${label}</label>`;
}

function htmlTextarea(name, placeholder,id, required) {
   
    return `<textarea id="${id}" name="${name}" class="form-control" placeholder="${placeholder}" ${required}></textarea>`;
}


    });


</script>
<x-library.select2 />

@push('after-styles')
<!-- File Manager -->
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

    $('#content').summernote({
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
</script>

<script type="module">
    $(document).ready(function() {
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
            document.querySelector('.select2-container--open .select2-search__field').focus();
        });

        $('.select2-category').select2({
            theme: "bootstrap4",
            placeholder: '@lang("Select an option")',
            minimumInputLength: 2,
            allowClear: true,
            ajax: {
                url: '{{route("backend.categories.index_list")}}',
                dataType: 'json',
                data: function(params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $('.select2-tags').select2({
            // theme: "bootstrap4",
            placeholder: '@lang("Select an option")',
            minimumInputLength: 2,
            allowClear: true,
            ajax: {
                url: '{{route("backend.tags.index_list")}}',
                dataType: 'json',
                data: function(params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    });
</script>
@endpush