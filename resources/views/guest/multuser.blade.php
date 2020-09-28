<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="col-md-12 col-12">
    <div class="card border-left-success shadow py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div id="close_window"></div>
                <h1 class="h4 text-gray-900 mb-4">@lang('words.take_user')</h1>
                <form disabled method="POST" action="{{ route('multiuser_post') }}">
                    <fieldset {{ $disabled ?? ''}} >
                        @csrf
                        @foreach($relations as $relation)
                            <h1 class="h5 text-gray-900 mb-4">{{ $relation->name }}</h1>
                            <div id="{{ $relation->form_name }}_header"></div>
                            <div id="{{ $relation->form_name }}"></div>
                            <br />
                        @endforeach
                        <br>
                        @if(($disabled ?? '') != 'disabled')
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary btn-icon-split pull-right">
                                    <span class="icon text-white-50">
                                    <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text">@lang('words.btn_submit')</span>
                                </button>
                            </div>
                        @endif
                    </fieldset>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php
      function create_header($fields = []){
          $data = "<div class='row' style='margin-top:8px'>";
          foreach($fields as $field){
              $col_md = $field['col_md']??'col-md-1';
              $title = $field['title']??'Title';
              $data .= "<div class='$col_md'>";
                  $data .= $title;
              $data .= "</div>";
          }
          return $data;
      }

      $array_data_inputs = [
        ['col_md' => 'col-md-5', 'title' => 'Fullname', 'id' => 'fullname','placeholder' => 'Enter full name','field_name' => 'fullname','barcode_scaned' => false,'onchange' => false, 'input_type' => 'input'],
        ['col_md' => 'col-md-3', 'title' => 'Email', 'id' => '','placeholder' => 'Enter Email','field_name' => 'email','barcode_scaned' => false,'onchange' => true, 'input_type' => 'input'],
        ['col_md' => 'col-md-3', 'title' => 'phone', 'id' => 'phone','placeholder' => 'Enter Phone','field_name' => 'phone','barcode_scaned' => false,'onchange' => false, 'input_type' => 'input'],
        ['col_md' => 'col-md-1 col-1', 'title' => 'Close', 'id' => 'full_div_', 'input_type' => 'close'],
    ];

    function create_field($id,$items,$idDiv,$fields = [],$straight = ''){
        $data = "<div class='row' id='$straight"."full_div_$id' style='margin-top:8px'>";
            foreach($fields as $field){
              $col_md = $field['col_md']??'col-md-1';
              $input_id = $field['id']??'id';
              $cls_total_in_field = $input_id === 'num_total_item' ? 'total_price_action' : "";
              $cls_total_quantity_in_field = $input_id === 'num_item' ? 'total_quantity_action' : "";
              $placeholder = $field['placeholder']??'placeholder';
              $field_name = $field['field_name']??'field_name';
              $default = $field['default']??'';
              $default = $default != '' ? "value='$default'" : '';
              $field_name = $field_name != 'field_name' ? "name=$straight$field_name"."[]" : '';
              $selecting_sms = $field['selecting_sms']??'';
              $id2 = $straight.$input_id.$id; 
              $oninpit_barcoder = $field['barcode_scaned']??false ? "oninput=on_barcode_scanned('$id','$idDiv','$id2')" : "";
              $oninpit_change = $field['onchange']??false ? "onchange=add_row('$straight$id','$idDiv','no','no','$straight')" : "";
              $on_input_quantity_price = $field['quantity_price']??false ? "onchange=on_change_quantity('$id')" : "";
              $hidden_field_val = $field['hidden_field_val']??'greater';
              $on_input_difference_money = $field['hidden_field']??false ? "onkeyup=difference_money('$id2','$straight','$hidden_field_val')" : "";
              $hidden_field = $field['hidden_field']??false ? "<input type='hidden' id='hidden_$id2'>" : "";

              $input_type =  $field['input_type']??'input';
              if($input_type == 'select'){
                $items = $field['items']??[];
                $take_id = $field['take_id']??'id';
                $take_name = $field['take_name']??'name';
                $data .= "<div class='$col_md'>";
                    $data .= "<select id='$id2' $field_name class='col-md-12 form-control js-example-basic-single' $oninpit_barcoder $oninpit_change >";
                        $data .= "<option value=''>$selecting_sms</option>";
                        foreach($items as $item){
                            $data .= "<option value='".$item->$take_id."'>".$item->$take_name."</option>";
                        }
                    $data .= "</select>";
                $data .= "</div>";
              }elseif($input_type == 'close'){
                $data .= "<div class='$col_md'>";
                  $data .= "<span class='btn btn-sm btn-danger' onclick=close_this('$id2','$straight$id')>X</span>";
                $data .= "</div>";
              }else{
                $data .= "<div class='$col_md'>";
                  $data .= "<input id='$id2'  type='text' $on_input_quantity_price $field_name $default class='form-control $cls_total_in_field $cls_total_quantity_in_field' placeholder='$placeholder' $oninpit_barcoder $oninpit_change $on_input_difference_money> $hidden_field";
                $data .= "</div>";
              }
            }
        $data .= "</div>";
        return $data;
    }

?>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        @foreach($relations as $relation)
            ready_selling_field("{{ $relation->form_name }}","close_window","stock");
        @endforeach
    });
    var i = 0;
    var selects = {};
    var main_straight  = true;
    var main_straight_main = "";
    var main_hide = [];
    function ready_selling_field(placed_id,window_v = 'open_window',straight=''){
        main_straight = placed_id;
        main_straight_main = main_straight + "email";
        $("#"+placed_id+"_header").append("{!! create_header($array_data_inputs??[]) !!}");
        $("#"+placed_id).append("{!!create_field('email',$shop_products??[],'"+placed_id+"',$array_data_inputs??[],'"+placed_id+"')!!}");
    }

    function add_row(id,divId,isSet = 'no',onceAdd = 'no',straight){
        //$("#"+id).removeAttr('onchange');
        var ending = false;
        Object.keys(selects).map(function(key,index){
            if(selects[key] == $("#"+id).val()){
                $("#"+key).focus();
                //onceAdd = 'yes';
                ending = true;
            }

            console.log(selects[key] + " === " + $("#"+id).val());
        });
        if(ending){
            return null;
        }
        if(selects[id] === undefined && $("#"+id).val() !== ''){
            i++;  
            $("#"+divId).append("{!!create_field('email"+i+"',$shop_products??[],'"+divId+"',$array_data_inputs??[],'"+straight+"')!!}");
        }
        console.log(id);
        selects[id] = $("#"+id).val();
        if(isSet === 'no'){
            //on_barcode_scanned(id,divId,id);
        }
    }

    function close_this(id,idf){
        delete selects[idf];
        $("#"+id).remove();
        console.log(id);
    }
</script>