<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Monthly Sales Report
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
                    <form class="form-horizontal" action="<?php echo base_url()?>reports/monthly_sales_report_pdf" id="frm_report" method="POST" target="_blank">
                        <div class="form-group">  
                            <label class="col-md-3 control-label">Period</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="txt_report_period" autocomplete="off"/>
                                <input type="hidden" class="form-control" id="month" name="month"/>
                                <input type="hidden" class="form-control" id="year" name="year"/>
                                <input type="hidden" class="form-control" id="month_name" name="month_name"/>
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
function get_month_name(month){
    month_name = "";
    switch(month){
        case '01' : 
            month_name = "January";
        break;
         case '02' : 
            month_name = "February";
        break;
         case '03' : 
            month_name = "March";
        break;
         case '04' : 
            month_name = "April";
        break;
         case '05' : 
            month_name = "May";
        break;
         case '06' : 
            month_name = "June";
        break;
         case '07' : 
            month_name = "July";
        break;
         case '08' : 
            month_name = "August";
        break;
         case '09' : 
            month_name = "September";
        break;
         case '10' : 
            month_name = "October";
        break;
         case '11' : 
            month_name = "November";
        break;
         case '12' : 
            month_name = "December";
        break;
    }
    return month_name;
}
$(document).ready(function(){
  

    $('#txt_report_period').datetimepicker({     
        viewMode: 'years',
        format: 'MM/YYYY'
    });

    $("#btn_generate").click(function(){
        var period_date = $("#txt_report_period").val().split("/");
        var month = period_date[0];
        var year = period_date[1];
     
        $("#month").val(month);
        $("#year").val(year);
        $("#month_name").val(get_month_name(month));
     /*   $("#year").text(year);
        $("#month_name").text(get_month_name(month));
        $.ajax({
            type:"POST",
            data:{
                month : month,
                year : year
            },
            url:"<?php echo base_url();?>/reports/ajax_get_monthly_sales_report",
            success:function(response){
                $("#tbl_data tbody").html(response);
            }
        });*/
        $("#frm_report").submit();
    });

   

});

</script>
