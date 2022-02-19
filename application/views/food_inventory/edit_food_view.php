<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
  <!--   <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Success alert preview. This alert is dismissable.
    </div> -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>New Food
            <small>Page for registering foods in the system</small>
        </h1>
    </section>
    <section class="content"> <!-- Main content -->
        <div class="box"> <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Food Information</h3>
                 <button type="button" class="btn btn-primary pull-right" id="btn_save_food">Save Changes</button>
            </div>
            <div class="box-body">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" id="frm_food_details">
                    <input type="hidden" name="food_id" value="<?php echo $food_details[0]->id;?>" id="food_id"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3">Food No</label>
                                <div class="col-md-9">
                                    <input type="text" readonly="readonly" class="form-control" value="<?php echo format_food_id($food_details[0]->id);?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="sel_category" name="sel_category">
                                <?php 
                                    foreach($food_categories as $category){
                                        $is_selected = $food_details[0]->food_category_id == $category->id ? "selected" : "";    
                                ?>
                                        <option value="<?php echo $category->id;?>" <?php echo $is_selected;?> ><?php echo $category->category;?></option>
                                <?php
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Food Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_food_name" name="txt_food_name" value="<?php echo $food_details[0]->food_name;?>"/>
                                    <span class='help-block form-error-msg'><?php echo form_error('txt_food_name');?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Quantity</label>
                                <div class="col-md-9">
                                    <input type="text" readonly="readonly" class="form-control" id="txt_qty" name="txt_qty" value="<?php echo $food_details[0]->quantity;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Selling Price</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" readonly="readonly" id="txt_selling_price" name="txt_selling_price" value="<?php echo $food_details[0]->unit_price;?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                               <div class="form-group">
                                <label class="control-label col-md-3">Barcode</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_barcode" name="txt_barcode" value="<?php echo $food_details[0]->barcode_value;?>"/>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file" class="hidden" id="txt_food_image" name="txt_food_image" onchange="PreviewImage('txt_food_image','food_pic')"/>
                                    <div class="food-image-new">
                                        <img src="<?php echo base_url();?>assets/images/foods/<?php echo $food_image;?>" id="food_pic" width="150" height="150" class="img-rounded"/>
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
                <h3 class="box-title">Food Items</h3>
                <button type="button" class="btn btn-default pull-right" id="btn_add_item">Add item</button>    
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="tbl_food_ingredients">
                    <thead>
                        <tr>
                            <th style="width:25%;">Food Item</th>
                            <th style="width:15%;">Amount</th>
                            <th style="width:15%;">Unit of Measure</th>
                            <th style="width:25%;">Unit Cost</th>
                            <th style="width:20%;">Total</th>
                            <th></th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($food_ingredients as $item){
                   
                    ?>
                        <tr>
                            <td><input type='text' class='form-control' value="<?php echo $item->ingredient_name;?>"/></td>
                            <td><input type='text' class='form-control txt_amount' value="<?php echo $item->amount;?>"/></td>
                            <td><input type='text' class='form-control txt_unit_of_measure' data-provide='typeahead' autocomplete='off' value="<?php echo $item->unit_of_measure;?>"/></td>
                            <td><input type='text' class='form-control txt_unit_cost' value="<?php echo $item->unit_cost;?>"/></td>
                            <td><input type='text' readonly='readonly' class='form-control txt_total_item_cost'  value="<?php echo $item->amount * $item->unit_cost;?>"/></td>
                            <td><a href='#' class='btn_update_item' data-item_id="<?php echo $item->id;?>"><i class='fa fa-save fa-1x'></i></a></td>
                            <td><a href='#' class='btn_remove_item' data-item_id="<?php echo $item->id;?>"><i class='fa fa-remove fa-1x'></i></a></td>
                        </tr>
                    <?php 
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="right" class='text-bold'>Total Cost</td>
                            <td class='text-bold text-danger' id="txt_total_cost"><?php echo $food_details[0]->total_food_cost;?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" class='text-bold'>Mark-Up Percentage</td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txt_mark_up_percentage" value="<?php echo $food_details[0]->mark_up_percentage;?>" />
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                </div>
                            </td>
                            <td align="right" class='text-bold'>Mark-Up Value</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_mark_up_value" value="<?php echo $food_details[0]->mark_up_value;?>"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" class='text-bold'>No of Serving</td>
                            <td><input type="text" class="form-control" id="txt_no_of_serving" value="<?php echo $food_details[0]->quantity;?>"/></td>
                            <td align="right" class='text-bold'>Cost Per Serving</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_cost_of_serving" value="<?php echo $food_details[0]->unit_cost;?>"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" class='text-bold'>Dine In Price</td>
                            <td><input type="text" class="form-control" id="txt_dine_in_price" value="<?php echo $food_details[0]->unit_price;?>"/></td>
                            <td align="right" class='text-bold'>Total Price Dine In</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_total_dine_in_price" value="<?php echo $food_details[0]->total_food_price;?>"/></td>
                        </tr>
                      
                    </tfoot>
                </table>
              
            </div> <!-- /.box-body -->
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
function add_ingredient_row(list_of_uom){
    var data;
    $.ajax({
        type:"POST",
        data:{
            food_id : $("#food_id").val()
        },
        url:"<?php echo base_url();?>food_inventory/ajax_add_food_item",
        success:function(response){
            location.reload();
        }
    });
 /*   var new_row = "";
    new_row += "<tr>";
    new_row += "<td><input type='text' class='form-control' /></td>";
    new_row += "<td><input type='text' class='form-control txt_amount'/></td>";
    new_row += "<td><input type='text' class='form-control txt_unit_of_measure' data-provide='typeahead' autocomplete='off'/></td>";
    new_row += "<td><input type='text' class='form-control txt_unit_cost' /></td>";
    new_row += "<td><input type='text' readonly='readonly' class='form-control txt_total_item_cost' /></td>";
    new_row += "<td><a href='#' class='btn_remove_item'><i class='fa fa-remove fa-1x'></i></a></td>";
    new_row += "</tr>";
    $("#tbl_food_ingredients tbody").append(new_row);
    $(".txt_unit_of_measure").typeahead({
        source: list_of_uom, 
        autoSelect: true
    });*/

}
function computeTotal(){
    var total = 0;
    $("#tbl_food_ingredients tbody tr").each(function(ev){
        var total_item_cost_element = $(this).find('td:nth-child(5)').find('input').val();
        total += parseFloat(total_item_cost_element);
    });

    $("#txt_total_cost").text(total.toFixed(2));
}
function computeMarkup(){
    total_cost = $("#txt_total_cost").text();
    mark_up_percentage = $("#txt_mark_up_percentage").val();
    total = parseFloat(total_cost) * (parseFloat(mark_up_percentage)/100);
    $("#txt_mark_up_value").val(total.toFixed(2));
}
function computeCostPerServing(){
    $("#txt_qty").val($("#txt_cost_of_serving").val());
    total_cost = parseFloat($("#txt_total_cost").text()) + parseFloat($("#txt_mark_up_value").val());
    total = parseFloat(total_cost) / parseFloat($("#txt_no_of_serving").val());
    $("#txt_cost_of_serving").val(total.toFixed(2));
}
function computeTotalDinePrice(){
    $("#txt_qty").val($("#txt_no_of_serving").val());
    var total_dine_in_price = parseFloat($("#txt_dine_in_price").val()) * parseFloat($("#txt_no_of_serving").val());
    $("#txt_total_dine_in_price").val(total_dine_in_price.toFixed(2));
    total_cost = parseFloat($("#txt_total_cost").text()) + parseFloat($("#txt_mark_up_value").val());
    total = parseFloat(total_cost) / parseFloat($("#txt_no_of_serving").val());
    $("#txt_cost_of_serving").val(total.toFixed(2));
}
function saveFoodPrice(){
    var food_id = $("#food_id").val();
    var cost_per_serving = $("#txt_cost_of_serving").val();
    var dine_in_price = $("#txt_dine_in_price").val();
    var total_dine_in_price = $("#txt_total_dine_in_price").val();
    var quantity = $("#txt_no_of_serving").val();

    $.ajax({
        type:"POST",
        data:{ 
            food_id              : food_id,
            cost_per_serving     : cost_per_serving,
            dine_in_price        : dine_in_price,
            total_dine_in_price  : total_dine_in_price,
            quantity             : quantity
        },
        url:"<?php echo base_url()?>food_inventory/ajax_update_food_price_details",
        success:function(response){
            
        }
    });
}
$(document).ready(function(){

    var list_of_uom = JSON.parse('<?php echo $uom_list;?>');
    $("#btn_add_item").click(function(){
        add_ingredient_row(list_of_uom);
    });    

    $(".txt_unit_of_measure").typeahead({
        source: list_of_uom, 
        autoSelect: true
    });

    $("body").on("blur",".txt_unit_cost",function(){
        var element = $(this);
        var parent_tr_element = element.parent().parent();
        var amount = parent_tr_element.find('td:nth-child(2)').find('input');
        var unit_cost = $(this);
        var total_item_cost_element = parent_tr_element.find('td:nth-child(5)').find('input');
        var total_item_cost = parseFloat(amount.val()) * parseFloat(unit_cost.val());
        total_item_cost_element.val(total_item_cost.toFixed(2));
        computeTotal();
        computeMarkup();
        computeCostPerServing();
    });

    $("body").on("click",".btn_remove_item",function(ev){
        $(this).parent().parent().remove();
        computeTotal();
        computeMarkup();
        computeCostPerServing();
        var item_id = $(this).data('item_id');
        var total_cost = $("#txt_total_cost").text();
        var mark_up_value = $("#txt_mark_up_value").val();
        var cost_per_serving = $("#txt_cost_of_serving").val();
        var mark_up_percentage = $("#txt_mark_up_percentage").val();
        var food_id = $("#food_id").val();
        $.ajax({
            type:"POST",
            data:{
                item_id : item_id,
                total_cost : total_cost,
                mark_up_value : mark_up_value,
                cost_per_serving : cost_per_serving,
                mark_up_percentage : mark_up_percentage,
                food_id : food_id
            },
            url:"<?php echo base_url()?>food_inventory/ajax_delete_food_item",
            success:function(response){
              
            }
        });
        ev.preventDefault();
    });

    $("#txt_mark_up_percentage").on("blur",function(){
        computeMarkup();
        computeCostPerServing();
        var mark_up_value = $("#txt_mark_up_value").val();
        var cost_per_serving = $("#txt_cost_of_serving").val();
        var mark_up_percentage = $("#txt_mark_up_percentage").val();
        var food_id = $("#food_id").val();
        var total_cost = $("#txt_total_cost").text();
        $.ajax({
            type:"POST",
            data:{ 
                food_id             : food_id,
                mark_up_percentage  : mark_up_percentage,
                mark_up_value       : mark_up_value,
                cost_per_serving    : cost_per_serving,
                total_cost          : total_cost
            },
            url:"<?php echo base_url()?>food_inventory/ajax_update_food_cost_details",
            success:function(response){
               
            }
        });
    });



    $("#txt_no_of_serving").on("blur",function(){
        computeTotalDinePrice();
        saveFoodPrice();
    });


    $("#txt_dine_in_price").on("blur",function(){
        $("#txt_selling_price").val($(this).val());
        var dine_in_price = $(this);
        var total_dine_in_price_elem = $("#txt_total_dine_in_price");
        var no_of_serving = $("#txt_no_of_serving");
        total_dine_in_price = parseFloat(no_of_serving.val()) * parseFloat(dine_in_price.val());
        total_dine_in_price_elem.val(total_dine_in_price);
        saveFoodPrice();
    });

    $("#btn_upload_food_photo").click(function(){
        $("#txt_food_image").click();
    });

    $("#btn_save_food").click(function(){
        var isError = false;
        if($("#txt_food_name").val() == ""){
            alert("Please enter the name of the food");
            isError = false;
        }
        else {
            if(!isError){
                $.ajax({
                    type:"POST",
                    data:{
                        food_id : $("#food_id").val(),
                        food_name : $("#txt_food_name").val(),
                        category : $("#sel_category").val(),
                        barcode_value : $("#txt_barcode").val()
                    },
                    url:"<?php echo base_url();?>food_inventory/ajax_update_food_details",
                    success:function(response){
                        location.reload();
                    }
                });
            }
        }
    });

    $("#food_info_modal").on("hidden.bs.modal",function(){
        location.reload();
    });

    $("#txt_food_image").on("change",function(){
        var formData = new FormData($("#frm_food_details")[0]);
        $.ajax({
            url: "<?php echo base_url();?>food_inventory/ajax_update_food_pic",
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                
            }
        });
    });

    $("body").on("blur",".txt_amount",function(){
        var element = $(this);
        var parent_tr_element = element.parent().parent();
        var amount = $(this);
        var unit_cost = parent_tr_element.find('td:nth-child(4)').find('input');
        var total_item_cost_element = parent_tr_element.find('td:nth-child(5)').find('input');
        var total_item_cost = parseFloat(amount.val()) * parseFloat(unit_cost.val());
        total_item_cost_element.val(total_item_cost.toFixed(2));
        computeTotal();
        computeMarkup();
        computeCostPerServing();
    });

    $("body").on("click",".btn_update_item",function(ev){
        var item_id = $(this).data('item_id');
        var element = $(this);
        var parent_tr_element = element.parent().parent();
        var item_name = parent_tr_element.find('td:nth-child(1)').find('input').val();
        var amount = parent_tr_element.find('td:nth-child(2)').find('input').val();
        var unit_of_measure = parent_tr_element.find('td:nth-child(3)').find('input').val();
        var unit_cost = parent_tr_element.find('td:nth-child(4)').find('input').val();
        var total_cost = $("#txt_total_cost").text();
        var mark_up_value = $("#txt_mark_up_value").val();
        var mark_up_percentage = $("#txt_mark_up_percentage").val();
        var cost_per_serving = $("#txt_cost_of_serving").val();
        $.ajax({
            type:"POST",
            data:{ 
                item_id          : item_id,
                food_id          : $("#food_id").val(),
                item_name        : item_name,
                amount           : amount,
                unit_of_measure  : unit_of_measure,
                unit_cost        : unit_cost,
                total_cost       : total_cost,
                mark_up_value    : mark_up_value,
                cost_per_serving : cost_per_serving,
                mark_up_percentage : mark_up_percentage
            },
            url:"<?php echo base_url()?>food_inventory/ajax_update_food_item",
            success:function(response){
                $("#food_info_body").html('Data saved successfully.');
                $("#food_info_modal").modal('show');
            }
        });
        ev.preventDefault();
    });

});
</script>


