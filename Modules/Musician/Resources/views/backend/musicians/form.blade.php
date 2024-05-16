<div class="row">
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "required";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->hidden('id')->id('musician_id') }}
            {{ html()->text($field_name)->id('musician_name')->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->id('musician_slug')->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'url';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;            
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->id('musician_url')->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'file';
            $field_lable ='Upload File';
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
    <div class="col-12 col-sm-4 mb-3">
   
        <div class="form-group">
            <?php
            $field_name = 'category_id';
            $field_lable = 'Instrument Category';
            $field_relation = "category";
            $field_placeholder = __("Select an option");
            $instruments = DB::table('categories')->where('group_name','Musician-Instruments')->get();
            $select_options = [];
            $required = "required";
            foreach ($instruments as $i) {
                $select_options[$i->id] = $i->name;
            }
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->id('instrument_category')->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    
    </div>
    <div class="col-12 col-sm-4 mb-3">
   
        <div class="form-group">
            <?php
            $field_name = 'sub_category';
            $field_lable = 'Sub Category';
            $field_relation = "category";
            $field_placeholder = __("Select an option");
            $subs = ['Select option'];
            /*$select_options = [];
            $required = "required";
            foreach ($subs as $i) {
                $select_options[$i->id] = $i->name;
            }*/
            ?>
            {{ html()->label($field_lable, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->id('sub_category')->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
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
    <div class="col-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'designation';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'designation_category';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<!-- Select2 Library -->
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
<script>
    $(document).ready(function() {        
       // var initialSubCategories = {!! json_encode($subs) !!};
        
        var musicianValue = $('#musician_name').val();
        var musicianId= $('#musician_id').val();
        var categoryId= $('#instrument_category').val();       
        if(musicianValue !=""){
            getSubCategories(categoryId,null);
        }
        updateSubCategories([]);
        var existingBaseUrl = "/";
        $('#instrument_category').change(function() {
            var selectedCategoryId = $(this).val(); 
            var selectedOption = $(this).find('option:selected');
            var selectedText = selectedOption.text();
            getSubCategories(selectedCategoryId, selectedText);
            
        });

        function getSubCategories(categoryId,selectedText){
            
            $.ajax({
                url:'{{route("backend.musicians.sub_category")}}' , 
                method: 'POST',
                data: { category_id: categoryId,_token: '{{ csrf_token() }}'},
                success: function(response) {
                            
                    updateSubCategories(response);
                    if(selectedText!=null){
                        updateUrl(selectedText, '');
                    }
                },
                error: function(error) {
                    console.error('Error fetching sub-categories:', error);              
                }
            });
        }
       
        // Function to update sub-category dropdown options
        function updateSubCategories(subCategories) {
            var $subCategoryDropdown = $('#sub_category');            
            $subCategoryDropdown.empty();            
            $subCategoryDropdown.append('<option value="">' + '{{ __("Select an option") }}' + '</option>');           
                    
                if(musicianValue !=""){
                    $.ajax({
                        url:'{{route("backend.musicians.selected_sub_category")}}' , 
                        method: 'POST',
                        data: { musician_id: musicianId, _token: '{{ csrf_token() }}'},
                        success: function(response) {   
                            console.log(response[0].sub_category);   
                            var selectedSubCategory = response[0].sub_category;
                            $.each(subCategories, function(index, subCategory) {
                                $subCategoryDropdown.append('<option value="' + subCategory.id + '">' + subCategory.name + '</option>');                
                                if (subCategory.id == selectedSubCategory) {
                                    $subCategoryDropdown.find('option[value="' + subCategory.id + '"]').prop('selected', true);
                                }
                            });    
                        },
                        error: function(error) {
                            console.error('Error fetching sub-categories:', error);               
                        }
                    });
                } else {        
                    $.each(subCategories, function(index, subCategory) {
                        $subCategoryDropdown.append('<option value="' + subCategory.id + '">' + subCategory.name + '</option>');
                    });
            
                }
            }

        $('#sub_category').change(function() {
            var subOption = $(this).find('option:selected');
            var subText = subOption.text();
            //appendSubcategory(subText);
            updateUrl($('#instrument_category option:selected').text(), subText)
        });

        $("#musician_name").on('change', function () {        
            var menuName = $("#musician_name").val();     
            var convertedString = menuName.replace(/\s+/g, '-').toLowerCase();
            $('#musician_slug').val(convertedString);
            updateUrl('', '');
           // $('#musician_url').val("/"+convertedString);
        });
        function updateUrl(categoryText, subCategoryText) {
            var baseUrl = existingBaseUrl; // Your base URL, change as needed
            var musicianName = $('#musician_name').val();

            if (musicianName) {
                var convertedString = musicianName.replace(/\s+/g, '-').toLowerCase();
                baseUrl += convertedString;
            }

            if (categoryText) {
                var categorySlug = categoryText.replace(/\s+/g, '-').toLowerCase();
                baseUrl += '/' + encodeURIComponent(categorySlug);
            }

            if (subCategoryText) {                
                var subCategorySlug = subCategoryText.replace(/\s+/g, '-').toLowerCase();
                baseUrl += '/' + encodeURIComponent(subCategorySlug);
            }

            $('#musician_url').val(baseUrl);
        }
        function appendSubcategory(subCategoryText) {
            var currentUrl = $('#musician_url').val();
            var subCategorySlug = subCategoryText.replace(/\s+/g, '-').toLowerCase();
            var newUrl = currentUrl + '/' + encodeURIComponent(subCategorySlug);
            $('#musician_url').val(newUrl);
        }

        
    });
</script>

@endpush    