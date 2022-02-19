<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Error 404 | Page not found</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/bootstrap-3.3.6/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/font-awesome-4.6.3/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/adminlte-2.3.4/dist/css/AdminLTE.css">
  <!-- Custom Style for CMS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/cms_custom_style.css">
    <link rel='shortcut icon' href='<?php echo base_url();?>assets/images/favicon.ico' type='image/x-icon'/ >
  <!-- iCheck -->
<!--   <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition">
    <section class="content-header" style="align:center;"> <!-- Content Header (Page header) -->
    <h1>Page Not Found!
    <small>Error 404</small>
    </h1>
    </section>
    <section class="content"> <!-- Main content -->
        <div class="box"> <!-- Default box -->
            <div class="box-header with-border">
                <h3 class="box-title">Error</h3>
            </div>
            <div class="box-body">
                The page you requested could not be reached. Please check your links or contact your system administrator.
            </div> <!-- /.box-body -->
            <div class="box-footer">
                <a href="#" id="btn_link">Click here to get back where you came from</a>
            </div> <!-- /.box-footer-->
        </div><!-- /.box -->
    </section> <!-- /.content -->


<script>
var btn_link = document.getElementById("btn_link");
var historyObj = window.history;
btn_link.onclick = function(){
    historyObj.back();  
};
</script>
</body>
</html>



