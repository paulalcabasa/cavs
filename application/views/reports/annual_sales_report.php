<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Annual Sales Report
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
                    <form class="form-horizontal" action="<?php echo base_url();?>reports/annual_sales_report_pdf" method="POST" id="frm_report" target="_blank">
                        <div class="form-group">  
                            <label class="col-md-3 control-label">Year</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="txt_report_year" name="year" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn_generate" class="btn btn-primary pull-right" style="margin-right:1em;">Generate</button>
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
    
    $('#txt_report_year').datetimepicker({     
        viewMode: 'years',
        format: 'YYYY'
    });

    $("#btn_generate").click(function(){
    
        var year = $("#txt_report_year").val();
       /*
        $("#year").text(year);
       
        $.ajax({
            type:"POST",
            data:{
                year : year
            },
            url:"<?php echo base_url();?>/reports/ajax_get_annual_sales_report",
            success:function(response){
                $("#tbl_data tbody").html(response);
            }
        });*/
        if(year != ""){
            $("#frm_report").submit();
        }
        else {
            alert("Select year.");
        }
    });


});

</script>
