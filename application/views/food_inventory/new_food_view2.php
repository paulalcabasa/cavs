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
                                <label class="control-label col-md-3">Food Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_food_name" name="txt_food_name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Quantity</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_qty" name="txt_qty"/>
                                </div>
                            </div>
                           <!--  <div class="form-group">
                                <label class="control-label col-md-3">Cost Price</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"/>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label col-md-3">Selling Price</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="txt_selling_price" name="txt_selling_price"/>
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
                <table class="table table-bordered" id="tbl_food_ingredients">
                    <thead>
                        <tr>
                            <th style="width:25%;">Food Item</th>
                            <th style="width:15%;">Amount</th>
                            <th style="width:15%;">Unit of Measure</th>
                            <th style="width:25%;">Unit Cost</th>
                            <th style="width:20%;">Total</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="right" class='text-bold'>Total Cost</td>
                            <td class='text-bold text-danger' id="txt_total_cost">0.00</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" class='text-bold'>Mark-Up Percentage</td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txt_mark_up_percentage" />
                                    <span class="input-group-addon" id="basic-addon2">%</span>
                                </div>
                            </td>
                            <td align="right" class='text-bold'>Mark-Up Value</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_mark_up_value"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" class='text-bold'>No of Serving</td>
                            <td><input type="text" class="form-control" id="txt_no_of_serving" /></td>
                            <td align="right" class='text-bold'>Cost Per Serving</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_cost_of_serving"/></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" class='text-bold'>Dine In Price</td>
                            <td><input type="text" class="form-control" id="txt_dine_in_price" /></td>
                            <td align="right" class='text-bold'>Total Price Dine In</td>
                            <td><input type="text" readonly="readonly" class="form-control" id="txt_total_dine_in_price"/></td>
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
function add_ingredient_row(list_of_uom){
    var new_row = "";
    new_row += "<tr>";
    new_row += "<td><input type='text' class='form-control' /></td>";
    new_row += "<td><input type='text' class='form-control txt_amount' /></td>";
    new_row += "<td><input type='text' class='form-control txt_unit_of_measure' data-provide='typeahead' autocomplete='off'/></td>";
    new_row += "<td><input type='text' class='form-control txt_unit_cost' /></td>";
    new_row += "<td><input type='text' readonly='readonly' class='form-control txt_total_item_cost' /></td>";
    new_row += "<td><a href='#' class='btn_remove_item'><i class='fa fa-remove fa-1x'></i></a></td>";
    new_row += "</tr>";
    $("#tbl_food_ingredients tbody").append(new_row);
    $(".txt_unit_of_measure").typeahead({
        source: list_of_uom, 
        autoSelect: true
    });
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
    $("#txt_qty").val($(this).val());
    total_cost = parseFloat($("#txt_total_cost").text()) + parseFloat($("#txt_mark_up_value").val());
    total = parseFloat(total_cost) / parseFloat($("#txt_no_of_serving").val());
    $("#txt_cost_of_serving").val(total.toFixed(2));
}
$(document).ready(function(){

    

    var list_of_uom = JSON.parse('<?php echo $uom_list;?>');
    $("#btn_add_item").click(function(){
        add_ingredient_row(list_of_uom);
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
    });

    $("body").on("click",".btn_remove_item",function(ev){
        $(this).parent().parent().remove();
        computeTotal();
    });

    $("#txt_mark_up_percentage").on("blur",function(){
        computeMarkup();
    });

    $("#txt_qty").on("blur",function(){
        $("#txt_no_of_serving").val($(this).val());
        total_cost = $("#txt_total_cost").text();
        total = parseFloat(total_cost) / parseFloat($(this).val());
        $("#txt_cost_of_serving").val(total.toFixed(2));
    });

    $("#txt_no_of_serving").on("blur",function(){
        $("#txt_qty").val($(this).val());
        total_cost = parseFloat($("#txt_total_cost").text()) + parseFloat($("#txt_mark_up_value").val());
        total = parseFloat(total_cost) / parseFloat($(this).val());
        $("#txt_cost_of_serving").val(total.toFixed(2));
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
        total_dine_in_price = parseFloat(no_of_serving.val()) * parseFloat(dine_in_price.val());
        total_dine_in_price_elem.val(total_dine_in_price);
    });

    $("#btn_upload_food_photo").click(function(){
        $("#txt_food_image").click();
    });

    $("#btn_save_food").click(function(){
        var formData = new FormData($("#frm_food_details")[0]);
        var list_of_ingredients = [];
        var index = 0;

        // getting all the ingredients if there are any
        $("#tbl_food_ingredients tbody tr").each(function(){
            food_item = $(this).find("td:nth-child(1)").find('input').val();
            amount = $(this).find("td:nth-child(2)").find('input').val();
            unit_of_measure = $(this).find("td:nth-child(3)").find('input').val();
            unit_cost = $(this).find("td:nth-child(4)").find('input').val();
            list_of_ingredients[index] = {"food_item":food_item,"amount":amount,"unit_of_measure":unit_of_measure,"unit_cost":unit_cost};
            index++;
        });

      

        // preparing data to be passed to ajax
        list_of_ingredients = JSON.stringify(list_of_ingredients);
        formData.append('ingredients',list_of_ingredients);
        formData.append('mark_up_percentage',$("#txt_mark_up_percentage").val());
        formData.append('mark_up_value',$("#txt_mark_up_value").val());
        formData.append('unit_cost',$("#txt_cost_of_serving").val());
        formData.append('total_cost',$("#txt_total_cost").text());
        formData.append('total_price',$("#txt_total_dine_in_price").val());
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
            }
        });
    });

    $("#food_info_modal").on("hidden.bs.modal",function(){
        location.reload();
    });

    $("body").on("blur",".txt_amount",function(){
        var element = $(this);
        var parent_tr_element = element.parent().parent();
        var amount = $(this);
        var unit_cost = parent_tr_element.find('td:nth-child(4)').find('input');
        var total_item_cost_element = parent_tr_element.find('td:nth-child(5)').find('input');
        var total_item_cost = parseFloat(amount.val()) * parseFloat(unit_cost.val());
        total_item_cost_element.val(total_item_cost.toFixed(2));
     
    });
});
</script>


