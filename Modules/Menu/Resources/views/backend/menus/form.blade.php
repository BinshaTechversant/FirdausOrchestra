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
            {{ html()->text($field_name)->id('menu_name')->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
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
            {{ html()->text($field_name)->id('menu_slug')->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php   
            $field_name = 'group_name';
            $field_lable = 'Menu Position';
            $field_placeholder = "-- Select an option --";  
            $select_options = [];
            $menus = DB::table('menu_group')->get();         
            foreach ($menus as $menu) {
                $select_options[$menu->name] = $menu->name;
            }    
        ?>
        {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
        {{ html()->select($field_name, $select_options)->id('menu_group')->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>            
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
                $field_name = 'url_type';
                $field_lable = label_case($field_name);
                $field_placeholder = "-- Select an option --";           
                $select_options = [
                    'custom'=>'Custom',
                    'pages'=>'Pages'                    
                ];       
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->id('menu_url_type')->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div> 
    <div class="col-12 col-sm-4 mb-3" id="menu_url_text" >
        <div class="form-group">
            <?php
            $field_name = 'url';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{-- html()->text('url')->id('menu_url')->name('url')->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) --}}
            {{ html()->text('url')->id('menu_url')->name('url')->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}

        </div>
    </div>
    
    <div class="col-12 col-sm-4 mb-3" id="menu_url_select" >
        <div class="form-group">
            <?php
            $field_name = 'url';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            $select_options = [];
            $pages = DB::table('pages')->get();
            foreach ($pages as $page) {
                $select_options[$page->url] = $page->url;
            }
            
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select('url', $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div> 
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'parent_menu';
            $field_lable = label_case($field_name);
            $field_placeholder = "-- Select an option --";
           
            $parent_options = [];
            $menus = DB::table('menus')->get();
            foreach ($menus as $menu) {
                $parent_options[$menu->id] = $menu->name;
            }
            
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $parent_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>  
     
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
                <?php
                $field_name = 'menu_order';
                $field_lable = label_case($field_name);
                $field_placeholder = "-- Select an option --";  
                
                /*                
                $menu_order_values = range(1, 10);
                $select_options = array_combine($menu_order_values, $menu_order_values);*/
                $required = "";
                ?>
                {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
                {{ html()->select($field_name)->id('menu_order')->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
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

<div class="row">
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'bottom_string';
            $field_lable = label_case($field_name);
            $field_placeholder = $field_lable;
            $required = "";
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'is_featured';
            $field_lable = label_case($field_name);
            $field_placeholder = "-- Select an option --";
            $required = "required";
            $select_options = [
                '1'=>'Yes',
                '0'=>'No'
            ];
            ?>
            {{ html()->label($field_lable, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'featured_image';
            $field_lable ='Upload File';
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

        
    });
</script>
<script>
    $(document).ready(function() { 

        var groupName = $("#menu_group").val();
        
        var menuName = $("#menu_name").val(); 
        $("#url").removeAttr("name");
        $('#menu_group').on('change', function () {      
            var groupName = $("#menu_group").val();
            $.ajax({
                url: '{{ route("backend.menus.menuCount") }}',
                method: 'POST',
                data: { groupName: groupName, _token: '{{ csrf_token() }}' },
                success: function(response) {   
                    console.log(response);
                            
                    updateMenuOrderValues(response);
                },
                error: function(error) {
                    console.error('Error fetching menu order:', error);
                    if (error.responseText) {
                        console.log('Response text:', error.responseText);
                    }
                }
            });

            function updateMenuOrderValues(menuOrder) {
                var $menuDropdown = $('#menu_order');
                
                $menuDropdown.empty();
                $menuDropdown.append('<option value="">' + '{{ __("Select an option") }}' + '</option>');

                // Append options ranging from 1 to menuOrder + 1
                for (var i = 1; i <= menuOrder + 1; i++) {
                    $menuDropdown.append('<option value="' + i + '">' + i + '</option>');
                }
            }
        });


        $.ajax({
            url: '{{ route("backend.menus.menuSelect") }}',
            method: 'POST',
            data: { 
                groupName: groupName, 
                _token: '{{ csrf_token() }}',
                menuName: menuName  // Added a comma here
            },
            success: function(response) {   
                console.log(response);      
                    
                
                menuCount(groupName, function (maxCount) {
                    selectMenuOrderValues(response,maxCount); 
                // Now you can use maxCount in your code
            });
            },
            error: function(error) {
                console.error('Error fetching menu order:', error);
                if (error.responseText) {
                    console.log('Response text:', error.responseText);
                }
            }
        });

        function selectMenuOrderValues(menuOrders,maxMenuOrder) {
            var $menuDropdown = $('#menu_order');
            
            $menuDropdown.empty();
            $menuDropdown.append('<option value="">' + '{{ __("Select an option") }}' + '</option>');
            
            if (menuOrders.length > 0) {       

                for (var i = 1; i <= maxMenuOrder; i++) {
                    $menuDropdown.append('<option value="' + i + '">' + i + '</option>');
                }

                // Set the selected value
                $menuDropdown.val(menuOrders[0].menu_order);
            }
        }


        function menuCount(groupName, callback) {
            $.ajax({
                url: '{{ route("backend.menus.menuCount") }}',
                method: 'POST',
                data: { groupName: groupName, _token: '{{ csrf_token() }}' },
                success: function (response) {
                    console.log(response);
                    if (callback && typeof callback === 'function') {
                        callback(response); // Execute the callback with the response value
                    }
                },
                error: function (error) {
                    console.error('Error fetching menu order:', error);
                    if (error.responseText) {
                        console.log('Response text:', error.responseText);
                    }
                }
            });
        }
        $("#menu_name").on('change', function () {        
            var menuName = $("#menu_name").val();     
            var convertedString = menuName.replace(/\s+/g, '-').toLowerCase();
            $('#menu_slug').val(convertedString);
        });
    
        $("#menu_url_type").on('change', function () {    
            var menuName = $("#menu_name").val(); 
            var menuUrlType = $("#menu_url_type").val();
            if(menuUrlType == "custom")
            {
                var convertedString = '/'+ menuName.replace(/\s+/g, '-').toLowerCase();
              //  $('#menu_url').val(convertedString);
              $('#menu_url_text input').val(convertedString);
              $("#url").removeAttr("name");

                $("#menu_url_select").css("display","none");
                $("#menu_url_text").css("display","block");
            }
            else{
                $("#menu_url_text").css("display","none");
                $("#menu_url_select").css("display","block");
                $("#url").attr("name", "url");
            }
            
        });
});

</script>