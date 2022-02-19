<style>
.select2-container .select2-selection--single {
    height:30px;
    font-size:12px;
}
.select2-container .select2-selection--single .select2-selection__rendered{
    margin-top:-6px;
}
</style>
<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
   
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>New Food
            <small>Page for registering foods in the system</small>
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
       <!--  <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Success alert preview. This alert is dismissable.
        </div> -->
        <div class="box"> <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Food Information</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" id="frm_food_details">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="sel_category" name="sel_category">
                                <?php 
                                    foreach($food_categories as $category){    
                                ?>
                                        <option value="<?php echo $category->id;?>"><?php echo $category->category;?></option>
                                <?php
                                    }
                                ?>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Description</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_food_name" name="txt_food_name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Food Type</label>
                                <div class="col-md-9">
                                      <select class="form-control" id="sel_food_type" name="sel_food_type">
                                <?php 
                                    foreach($list_of_food_types as $type){    
                                ?>
                                        <option value="<?php echo $type->id;?>"><?php echo $type->food_type_name;?></option>
                                <?php
                                    }
                                ?>
                                    </select>

                                    
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-6">
                               <div class="form-group">
                                <label class="control-label col-md-3">Barcode</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_barcode" name="txt_barcode"/>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file" class="hidden" id="txt_food_image" name="txt_food_image" onchange="PreviewImage('txt_food_image','food_pic')"/>
                                    <div class="food-image-new">
                                        <img src="<?php echo base_url();?>assets/images/foods/default_food_image.png" id="food_pic" width="150" height="150" class="img-rounded"/>
                                        <button class="btn btn-default btn-primary" type="button" id="btn_upload_food_photo">Change Photo</button>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- /.box-body -->
          <!--   <div class="box-footer">
            Footer
            </div> -->
        </div><!-- /.box -->


        <div class="box"> <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Food Item Cost</h3>
                <button type="button" class="btn btn-default pull-right" id="btn_add_item">Add item</button>    
            </div>
            <div class="box-body">
                <select id="sel_base_item_options" class="hidden"><?php echo $food_items_options;?></select>
                <table class="table table-bordered" id="tbl_food_ingredients">
                    <thead>
                        <tr>
                            <th style="width:10%;">Item No</th>
                            <th style="width:20%;">Food Item</th>
                            <th style="width:15%;">Quantity</th>
                            <th style="width:15%;">Remaining Quantity</th>
                            <th style="width:10%;"><abbr title="Unit of Measure">UOM</abbr></th>
                            <th style="width:15%;">Unit Cost</th>
                            <th style="width:15%;">Total</th>
                            <th style="width:5%;"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" align="right" class='text-bold'>Total Cost</td>
                            <td class='text-bold text-danger' id="txt_total_cost">0.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right" class='text-bold'>Mark-Up Percentage</td>
                            <td>
                                <div class="input-group">
                                    <input type="text" value="0" class="form-control" id="txt_mark_up_percentage" />
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                </div>
                            </td>
                            <td align="right" class='text-bold'>Mark-Up Value</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_mark_up_value" value="0"/></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right" class='text-bold'>Quantity</td>
                            <td><input type="text" class="form-control" id="txt_no_of_serving" value="0"/></td>
                            <td align="right" class='text-bold'>Cost Per Serving</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_cost_of_serving" value="0"/></td>
                        </tr>
                   
                        <tr>
                            <td  colspan="2" align="right" class='text-bold'>SRP</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_srp" value="0" /></td>

                            <td  align="right" class='text-bold'>Selling Price</td>
                            <td><input type="text" class="form-control" id="txt_dine_in_price" value="0" /></td>
                            <td align="right" class='text-bold'>Total Selling Price</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_total_dine_in_price" value="0"/></td>
                        </tr>

                        <tr>
                           
                            <td align="right" colspan="6" class='text-bold'>Expected Revenue</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_expected_revenue" value="0"/></td>
                        </tr>
                      
                    </tfoot>
                </table>
              
            </div> <!-- /.box-body -->
            <div class="box-footer">    
                <button type="button" class="btn btn-primary" id="btn_save_food">Save</button>
            </div> <!-- /.box-footer-->
        </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal fade" id="food_info_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Food Creation</h4>
      </div>
      <div class="modal-body" id="food_info_body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
var is_reload = false;
/*var data = [
    { id: '', text: 'Select food item'},
    { id: 0, text: 'enhancement' }, 
    { id: 1, text: 'bug' }, 
    { id: 2, text: 'duplicate' }, 
    { id: 3, text: 'invalid' }, 
    { id: 4, text: 'wontfix' }
];*/
var food_item_index = 0;


function add_ingredient_row(){
    var new_row = "";
    new_row += "<tr>";
    new_row += '<td><input type="text" class="form-control input-sm" readonly="readonly"/></td>';
    new_row += '<td><select class="form-control sel_food_item" id="sel_food_item_'+food_item_index+'"></select></td>';
    new_row += "<td><input type='text' class='form-control txt_amount input-sm ' /></td>";
    new_row += "<td><input type='text' class='form-control txt_remaining_amount input-sm' readonly='readonly' data-orig_amount=''/></td>";
    new_row += "<td><input type='text' class='form-control txt_unit_of_measure input-sm' readonly='readonly'/></td>";
    new_row += "<td><input type='text' class='form-control txt_unit_cost input-sm' readonly='readonly' /></td>";
    new_row += "<td><input type='text' readonly='readonly' class='form-control txt_total_item_cost input-sm' /></td>";
    new_row += "<td><a href='#' class='btn_remove_item'><i class='fa fa-remove fa-1x'></i></a></td>";
    new_row += "</tr>";
    $("#tbl_food_ingredients tbody").append(new_row);
 
    var food_sel_elem = $("#sel_food_item_" + food_item_index);
   
    key_numeric('.txt_amount');
    $("#sel_base_item_options option").each(function(){
        var opt_elem = $(this).clone();
        food_sel_elem.append(opt_elem);
    });

    food_sel_elem.val("");

    $("#sel_food_item_" + food_item_index).select2({
        placeholder: "Select food item",
        allowClear: true
    });

    $("#sel_food_item_" + food_item_index).on('change',function(){
        $(this).attr('disabled','disabled');
    });
    food_item_index++;
}
function computeTotal(){
    var total = 0;
    $("#tbl_food_ingredients tbody tr").each(function(ev){
        var total_item_cost_element = $(this).find('td:nth-child(7)').find('input').val();
        total += parseFloat(total_item_cost_element);
    });
  
    $("#txt_total_cost").text(total.toFixed(2));
}
function computeMarkup(){
    total_cost = $("#txt_total_cost").text();
    mark_up_percentage = $("#txt_mark_up_percentage").val();
    if(mark_up_percentage != ""){
        total = parseFloat(total_cost) * (parseFloat(mark_up_percentage)/100);
        $("#txt_mark_up_value").val(total.toFixed(2));
    }
}
function computeCostPerServing(){
    total_cost = parseFloat($("#txt_total_cost").text()) + parseFloat($("#txt_mark_up_value").val());
    total = parseFloat(total_cost) / parseFloat($("#txt_no_of_serving").val());
    $("#txt_cost_of_serving").val(total.toFixed(2));
}
var options_size = $('#sel_base_item_options option[value!=""]').size();
$(document).ready(function(){

    $("#btn_add_item").click(function(){
        
        var items_size = $("#tbl_food_ingredients tbody tr").size();
        if(items_size != options_size){
            var error_ctr = 0;
            
            $("#tbl_food_ingredients tbody tr").each(function(){
                error_ctr += validateSelect2($(this).find("td:nth-child(2)").find('select'),'Kindly specify food item.');
                error_ctr += validateTextBox($(this).find("td:nth-child(3)").find('input'),'Kindly specify food amount.');
            });

            if(error_ctr == 0){
                add_ingredient_row();
            }
        }
        else {
            $("#food_info_body").html('You have no more items to add.');
            $("#food_info_modal").modal('show');
        }
    });    


    $("body").on("click",".btn_remove_item",function(ev){
        var parent_tr = $(this).parent().parent();
        var select_element = parent_tr.find('td:nth-child(2)').find('select option:selected');
        $("#sel_base_item_options option:selected").append(select_element);
        parent_tr.remove();
        computeTotal();
    });

    $("#txt_mark_up_percentage").on("blur",function(){
        computeMarkup();
    });

    $("#txt_qty").on("blur",function(){
        $("#txt_no_of_serving").val($(this).val());
        total_cost = $("#txt_total_cost").text();
        if($this.val() != 0){
            total = parseFloat(total_cost) / parseFloat($(this).val());
            $("#txt_cost_of_serving").val(total.toFixed(2));
        }
    });

    $("#txt_no_of_serving").on("blur",function(){
        $("#txt_qty").val($(this).val());
        total_cost = parseFloat($("#txt_total_cost").text());// + parseFloat($("#txt_mark_up_value").val());
        total = parseFloat(total_cost) / parseFloat($(this).val());
        $("#txt_cost_of_serving").val(total.toFixed(2));
        // total cost
        total_cost_mark_up = parseFloat($("#txt_total_cost").text()) *  (parseFloat($("#txt_mark_up_percentage").val())/100);
        mark_up_value_per_item = parseFloat(total_cost_mark_up)/parseFloat($("#txt_no_of_serving").val());
        srp = parseFloat(mark_up_value_per_item) + parseFloat(total);
        $("#txt_srp").val(srp);
    });

    $("#txt_selling_price").on("blur",function(){
        $("#txt_dine_in_price").val($(this).val());
        var dine_in_price = $(this);
        var total_dine_in_price_elem = $("#txt_total_dine_in_price");
        var no_of_serving = $("#txt_no_of_serving");
        total_dine_in_price = parseFloat(no_of_serving.val()) * parseFloat(dine_in_price.val());
        total_dine_in_price_elem.val(total_dine_in_price);
    });

    $("#txt_dine_in_price").on("blur",function(){
        $("#txt_selling_price").val($(this).val());
        var dine_in_price = $(this);
        var total_dine_in_price_elem = $("#txt_total_dine_in_price");
        var no_of_serving = $("#txt_no_of_serving");
        var expected_revenue = $("#txt_expected_revenue");
        total_dine_in_price = parseFloat(no_of_serving.val()) * parseFloat(dine_in_price.val());
        total_dine_in_price_elem.val(total_dine_in_price);
        expected_revenue.val(parseFloat(total_dine_in_price) - parseFloat($("#txt_total_cost").text()));
    });

    $("#btn_upload_food_photo").click(function(){
        $("#txt_food_image").click();
    });

    $("#btn_save_food").click(function(){
        var formData = new FormData($("#frm_food_details")[0]);
        var list_of_ingredients = [];
        var index = 0;
        var food_name = $("#txt_food_name");
        var qty = $("#txt_qty");
        var selling_price = $("#txt_selling_price");
        var error_ctr = 0;

        error_ctr += validateTextBox(food_name,'Kindly specify the food name.');
        error_ctr += validateTextBox(qty,'Kindly specify the food quantity.');
        error_ctr += validateTextBox(selling_price,'Kindly specify the food selling price.');

        if(error_ctr == 0){
            // getting all the ingredients if there are any
            $("#tbl_food_ingredients tbody tr").each(function(){
                food_item = $(this).find("td:nth-child(2)").find('select option:selected');
               // food_item_name = $(this).find("td:nth-child(2)").find('select ');
                amount = $(this).find("td:nth-child(3)").find('input').val();
                unit_of_measure = $(this).find("td:nth-child(5)").find('input').val();
                unit_cost = $(this).find("td:nth-child(6)").find('input').val();
                list_of_ingredients[index] = {
                    "inventory_item_id"       : food_item.val(),
                    "inventory_item_name"     : food_item.text(),
                    "inventory_item_stock_id" : food_item.data('inventory_item_stock_id'),
                    "unit_of_measure_id"      : food_item.data('unit_of_measure_id'),
                    "quantity"                : amount,
                    "unit_of_measure"         : unit_of_measure,
                    "unit_cost"               : unit_cost
                };

                index++;
            });

  
            if(index > 0){
                
                $("#tbl_food_ingredients tbody tr").each(function(){
                    error_ctr += validateTextBox($(this).find("td:nth-child(1)").find('input'),'Kindly specify food item name.');
                    error_ctr += validateTextBox($(this).find("td:nth-child(2)").find('input'),'Kindly specify food amount.');
                    error_ctr += validateTextBox($(this).find("td:nth-child(3)").find('input'),'Kindly specify unit of measure');
                    error_ctr += validateTextBox($(this).find("td:nth-child(4)").find('input'),'Kindly specify unit cost');
                });

                error_ctr += validateTextBox($("#txt_mark_up_percentage"),'Kindly specify mark_up percentage.');
                error_ctr += validateTextBox($("#txt_no_of_serving"),'Kindly specify no of serving.');
                error_ctr += validateTextBox($("#txt_dine_in_price"),'Kindly specify dine in price.');

                if(error_ctr == 0){
                    // preparing data to be passed to ajax
                    list_of_ingredients = JSON.stringify(list_of_ingredients);
                    formData.append('items',list_of_ingredients);
                    formData.append('mark_up_percentage',$("#txt_mark_up_percentage").val());
                    formData.append('mark_up_value',$("#txt_mark_up_value").val());
                    formData.append('unit_cost',$("#txt_cost_of_serving").val());
                    formData.append('total_cost',$("#txt_total_cost").text());
                    formData.append('total_price',$("#txt_total_dine_in_price").val());
                    formData.append('quantity',$("#txt_no_of_serving").val());
                    formData.append('unit_price',$("#txt_dine_in_price").val());
         
                    $("#food_info_body").html("Please wait...");
                    $("#food_info_modal").modal("show");
                    // start of ajax method for passing data
                    $.ajax({
                        url: "<?php echo base_url();?>food_inventory/add_food",
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $("#food_info_body").html(response);
                            is_reload = true;
                        }
                    });
                }
            }
            else {
                $("#food_info_body").html("Kindly specify food items used for costing.");
                $("#food_info_modal").modal("show");
                is_reload = false;
            }
        }
    });

    $("#food_info_modal").on("hidden.bs.modal",function(){
        if(is_reload){
            location.reload();
        }
    });

    $("body").on("blur",".txt_amount",function(){
        var element = $(this);
        var parent_tr_element = element.parent().parent();
        var amount = $(this);
        var unit_cost = parent_tr_element.find('td:nth-child(6)').find('input');
        var total_item_cost_element = parent_tr_element.find('td:nth-child(7)').find('input');
        var total_item_cost = parseFloat(amount.val()) * parseFloat(unit_cost.val());
        var remaining_amount_element = parent_tr_element.find('td:nth-child(4)').find('input');
        
        var rem_amt = parseFloat(remaining_amount_element.data('orig_amount')) - parseFloat(amount.val());
        
        if(amount.val() != ""){
            if(parseFloat(amount.val()) > parseFloat(remaining_amount_element.data('orig_amount'))){
                $("#food_info_body").html('Insufficient amount entered : <strong>' + amount.val() + "</strong>, Remaining amount is <strong>" + remaining_amount_element.data('orig_amount') + "</strong>");
                $("#food_info_modal").modal('show');
                amount.val("");
                remaining_amount_element.val(remaining_amount_element.data('orig_amount'));
            }
            else {
                remaining_amount_element.val(rem_amt);
                total_item_cost_element.val(total_item_cost.toFixed(2));
                computeTotal();
            }
        }
        
        
    });

    $("body").on("change",".sel_food_item",function(){
        // ITEM DATA
        var inventory_item_id = $(this).val();
        var inventory_item_stock_id = $(this).find(":selected").data("inventory_item_stock_id");
        var inventory_item_stock_id = $(this).find(":selected").data("inventory_item_stock_id");
        var inventory_item_no = $(this).find(":selected").data("inventory_item_no");
        var remaining_quantity = $(this).find(":selected").data("remaining_quantity");
        var unit_of_measure = $(this).find(":selected").data("unit_of_measure");
        var unit_cost = $(this).find(":selected").data("unit_cost");
        
        // ELEMENT DATA
        var parent_tr_element = $(this).parent().parent();
        var item_no_element = parent_tr_element.find('td:nth-child(1)').find('input');
        var unit_of_measure_element = parent_tr_element.find('td:nth-child(5)').find('input');
        var unit_cost_element = parent_tr_element.find('td:nth-child(6)').find('input');
        var unit_cost_element = parent_tr_element.find('td:nth-child(6)').find('input');
        var remaining_amount_element = parent_tr_element.find('td:nth-child(4)').find('input');
        
        // SETTING VALUES OF ELEMENTS
        unit_of_measure_element.val(unit_of_measure);
        unit_cost_element.val(unit_cost);
        item_no_element.val(inventory_item_no);
        remaining_amount_element.val(remaining_quantity);
        remaining_amount_element.attr('data-orig_amount',remaining_quantity);

        element_to_remove = $("#sel_base_item_options option[value='"+inventory_item_id+"']");

        element_to_remove.remove();
    });

    key_numeric("#txt_mark_up_percentage,#txt_no_of_serving,#txt_dine_in_price");
});
</script>


