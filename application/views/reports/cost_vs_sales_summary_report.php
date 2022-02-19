<div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content-header"> <!-- Content Header (Page header) -->
        <h1>Cost Vs Sales Report Summary
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
	                    <form class="form-horizontal" id="frm_report" method="POST" action="<?php echo base_url();?>reports/cost_vs_sales_summary_report_pdf" target="_blank">
	                        <div class="form-group">  
	                            <label class="col-md-3 control-label">Date</label>
	                            <div class="col-md-9">
	                                <input type="text" class="form-control" id="txt_report_date" autocomplete="off"/>
	                                <input type="hidden" class="form-control" id="start_date" name="start_date"/>
	                                <input type="hidden" class="form-control" id="end_date" name="end_date"/>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <button type="button" id="btn_generate" class="btn btn-primary pull-right" style="margin-right:1em;">Generate</button>
	                        </div>
	                    </form>
	                </div>
	                <div class="col-md-6"></div>
	            </div>
	            <div class="row">
	                <div class="col-md-12">
	                   
	                </div>
	            </div>
	        </div> <!-- /.box-body -->
	     
	    </div><!-- /.box -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$(document).ready(function(){
    var start_date,end_date;

    $('#txt_report_date').daterangepicker({
        "showDropdowns": true,
        "showWeekNumbers": true,
          ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    $('#txt_report_date').on('apply.daterangepicker', function(ev, picker) {
        start_date = picker.startDate.format('YYYY-MM-DD');
        end_date = picker.endDate.format('YYYY-MM-DD');
        $("#start_date").val(start_date);
        $("#end_date").val(end_date);
    });

    $("#btn_generate").click(function(){
    	if($("#start_date").val() == "" && $("#end_date").val() == ""){
    		alert("Select start and end date.");
    	}
    	else {
    		$("#frm_report").submit();
    	}
    });

    $("#txt_report_date").val("");

});

</script>
