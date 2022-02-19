<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Supplier Item Price Report
            <small></small>
        </h1>
       
    </section>
    <section class="content"> <!-- Main content -->
    <div class="box"  style="min-height:500px;"> <!-- Default box -->
        <div class="box-header with-border">
            <h3 class="box-title">Report</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
          
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" action="<?php echo base_url();?>reports/supplier_item_price_pdf" method="POST" id="frm_report" target="_blank">
                        <div class="form-group">  
                            <label class="col-md-3 control-label">Item Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="item_name" id="item_name">
                                <?php
                                foreach($list_of_items as $item){
                                ?>
                                <option value="<?php echo $item->inventory_item_id;?>"><?php echo $item->item_name;?></option>
                                <?php
                                }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">  
                            <label class="col-md-3 control-label">Unit of Measure</label>
                            <div class="col-md-9"> 
                                <select class="form-control" name="unit_of_measure" id="unit_of_measure">
                                <?php
                                    foreach($uom_list as $uom){
                                ?>
                                    <option value="<?php echo $uom->id;?>"><?php echo $uom->description;?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btn_generate" class="btn btn-primary pull-right" style="margin-right:1em;">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
          
        </div> <!-- /.box-body -->
     
    </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
$(document).ready(function(){
    
  $("#item_name").select2();

  $("#unit_of_measure").select2();


});

</script>
