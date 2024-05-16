<div class="row">    
        <div class="col-12 col-sm-4 mb-3">
            <div class="form-group">
                <div class="form-check form-switch">
                    <?php
                    $field_name = 'genre_filter';
                    $field_lable = label_case($field_name);
                    $field_placeholder = $field_lable;
                    ?>
                    {{ html()->label($field_lable, $field_name)->class('form-check-label') }} 
                    @if(isset($data->genre_filter))
                        {{ html()->checkbox($field_name)->class('form-check-input')->value($data->genre_filter) }} 
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
                    $field_name = 'season_filter';
                    $field_lable = label_case($field_name);
                    $field_placeholder = $field_lable; 
                    ?>
                    {{ html()->label($field_lable, $field_name)->class('form-check-label') }} 
                    @if(isset($data->season_filter))
                        {{ html()->checkbox($field_name)->class('form-check-input')->value($data->season_filter) }} 
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
                    $field_name = 'type_filter';
                    $field_lable = label_case($field_name);
                    $field_placeholder = $field_lable;   
                    ?>
                    {{ html()->label($field_lable, $field_name)->class('form-check-label') }}                      
                    @if(isset($data->type_filter))
                        {{ html()->checkbox($field_name)->class('form-check-input')->value($data->type_filter) }} 
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
<script>
    $(document).ready(function () {
        
        $('input[name="genre_filter"]').click(function () {
            
            $(this).val($(this).val() == '1' ? '0' : '1');
        });
        $('input[name="season_filter"]').click(function () {
            
            $(this).val($(this).val() == '1' ? '0' : '1');
        });
        $('input[name="type_filter"]').click(function () {
            
            $(this).val($(this).val() == '1' ? '0' : '1');
        });
    });
</script>