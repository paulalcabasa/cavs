<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ez</b>CMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/images/person_images/' . $this->session->get_userdata()['person_image']);?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php 
                  echo $this->session->get_userdata()['first_name'] . " " . $this->session->get_userdata()['last_name'] ;
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/images/person_images/' . $this->session->get_userdata()['person_image']);?>" class="img-circle" alt="User Image">

                <p>
                  <?php 
                  echo $this->session->get_userdata()['first_name'] . " " . $this->session->get_userdata()['last_name'] ;
                ?>
                <!--   <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
            <!--   <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row 
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <?php echo anchor('login/logout', 'Sign out', array('class'=>'btn btn-default btn-flat'));?>
                
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/images/person_images/' . $this->session->get_userdata()['person_image']);?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          <?php 
            echo $this->session->get_userdata()['first_name'] . " " . $this->session->get_userdata()['last_name'] ;
          ?>    
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
<!--         <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li> -->

        <!-- administrator -->
        <?php if($this->session->userdata['user_type_id'] == 3) { ?>
        <li class="header">SYSTEM USERS</li>
        <li><a href="<?php echo base_url();?>employee"><i class="ion-person-stalker"></i> <span>Employees</span></a></li>
        <li><a href="<?php echo base_url();?>stockholder"><i class="ion-person-stalker"></i> <span>Stockholders</span></a></li>
        <li><a href="<?php echo base_url();?>user"><i class="ion-person-stalker"></i> <span>Users</span></a></li>
       
        <li class="header">TRANSACTION</li>
        <li><a href="<?php echo base_url();?>transaction/new_transaction"><i class="fa fa-plus-circle"></i> <span>New</span></a></li>
        <li><a href="<?php echo base_url();?>transaction/all_transactions"><i class="fa fa-book"></i> <span>All Transactions</span></a></li>
        
        <li class="header">SALES</li>
        <li><a href="<?php echo base_url();?>food_inventory/new_food"><i class="fa fa-plus"></i> <span>New</span></a></li>
        <li><a href="<?php echo base_url();?>food_inventory/all_food_sales"><i class="fa fa-book"></i> <span>Food Sales</span></a></li>
        <li><a href="<?php echo base_url();?>reports/view_food_items_onhand" target="_blank"><i class="fa fa-book"></i> <span>Food Items Onhand</span></a></li>

        <li class="header">EXPENSES</li>
        <li><a href="<?php echo base_url();?>inventory_expense/all_inventory_expenses"><i class="fa fa-book"></i> <span>Expense Items</span></a></li>
       
        <li class="header">INVENTORY</li>
        <li><a href="<?php echo base_url();?>inventory_items"><i class="fa fa-book"></i> <span>Items</span></a></li>
        
        <li><a href="<?php echo base_url();?>supplier"><i class="fa fa-book"></i> <span>Suppliers</span></a></li>
        <li><a href="<?php echo base_url();?>unit_of_measure"><i class="fa fa-book"></i> <span>Unit of Measure</span></a></li>
        <li><a href="<?php echo base_url();?>reports/view_inventory_items_onhand" target="_blank"><i class="fa fa-book"></i> <span>Inventory Items Onhand</span></a></li>

        <li class="header">ACCOUNTING</li>
        <li><a href="<?php echo base_url();?>employee/credit_management"><i class="ion-person-stalker"></i> <span>Credit Management</span></a></li>
              
       
        <li class="header">REPORTS</li>
        <li><a href="<?php echo base_url();?>reports/sales_report"><i class="fa fa-bar-chart"></i> <span>Sales Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/sales_report_detailed"><i class="fa fa-bar-chart"></i> <span>Detailed Sales Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/sales_report_by_payment_type"><i class="fa fa-bar-chart"></i> <span>Sales Report by Payment Type</span></a></li>
        <li><a href="<?php echo base_url();?>reports/cost_vs_sales_summary_report"><i class="fa fa-pie-chart"></i> <span>Cost Vs Sales Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/monthly_sales_report"><i class="fa fa-line-chart"></i> <span>Monthly Sales Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/annual_sales_report"><i class="fa fa-bar-chart"></i> <span>Annual Sales Report</span></a></li>

        <li><a href="<?php echo base_url();?>reports/billing_summary"><i class="fa fa-bar-chart"></i> <span>Billing Summary Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/supplier_item_price"><i class="fa fa-bar-chart"></i> <span>Supplier Item Price Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/inventory_expense_report"><i class="fa fa-bar-chart"></i> <span>Inventory Expense Report</span></a></li>
      
        <?php } ?>     

         <!-- dietitian -->
        <?php if($this->session->userdata['user_type_id'] == 6) { ?>
        <li class="header">CANTEEN EMPLOYEES</li>
        <li><a href="<?php echo base_url();?>employee/canteen_employees"><i class="ion-person-stalker"></i> <span>Employees</span></a></li>
    	<li><a href="<?php echo base_url();?>stockholder"><i class="ion-person-stalker"></i> <span>Stockholders</span></a></li>
        <li class="header">TRANSACTION</li>
        <li><a href="<?php echo base_url();?>transaction/new_transaction"><i class="fa fa-plus-circle"></i> <span>New</span></a></li>
        <li><a href="<?php echo base_url();?>transaction/all_transactions"><i class="fa fa-book"></i> <span>All Transactions</span></a></li>
        
        <li class="header">SALES</li>
        <li><a href="<?php echo base_url();?>food_inventory/new_food"><i class="fa fa-plus"></i> <span>New</span></a></li>
        <li><a href="<?php echo base_url();?>food_inventory/all_food_sales"><i class="fa fa-book"></i> <span>Food Sales</span></a></li>
        <li><a href="<?php echo base_url();?>reports/view_food_items_onhand" target="_blank"><i class="fa fa-book"></i> <span>Food Items Onhand</span></a></li>

        <li class="header">EXPENSES</li>
        <li><a href="<?php echo base_url();?>inventory_expense/all_inventory_expenses"><i class="fa fa-book"></i> <span>Expense Items</span></a></li>
       
        <li class="header">INVENTORY</li>
        <li><a href="<?php echo base_url();?>inventory_items"><i class="fa fa-book"></i> <span>Items</span></a></li>
        
        <li><a href="<?php echo base_url();?>supplier"><i class="fa fa-book"></i> <span>Suppliers</span></a></li>
        <li><a href="<?php echo base_url();?>unit_of_measure"><i class="fa fa-book"></i> <span>Unit of Measure</span></a></li>
        <li><a href="<?php echo base_url();?>reports/view_inventory_items_onhand" target="_blank"><i class="fa fa-book"></i> <span>Inventory Items Onhand</span></a></li>      
        

        <li class="header">CREDITS</li>
        <li><a href="<?php echo base_url();?>employee/credit_management"><i class="ion-person-stalker"></i> <span>MDI</span></a></li>
        <li><a href="<?php echo base_url();?>employee/credit_management_sruho"><i class="ion-person-stalker"></i> <span>SRUHO</span></a></li>

        <li class="header">REPORTS</li>
        <li><a href="<?php echo base_url();?>reports/sales_report"><i class="fa fa-bar-chart"></i> <span>Sales Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/sales_report_detailed"><i class="fa fa-bar-chart"></i> <span>Detailed Sales Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/sales_report_by_payment_type"><i class="fa fa-bar-chart"></i> <span>Sales Report by Payment Type</span></a></li>
        <li><a href="<?php echo base_url();?>reports/cost_vs_sales_summary_report"><i class="fa fa-pie-chart"></i> <span>Cost Vs Sales Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/monthly_sales_report"><i class="fa fa-line-chart"></i> <span>Monthly Sales Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/annual_sales_report"><i class="fa fa-bar-chart"></i> <span>Annual Sales Report</span></a></li>

        <li><a href="<?php echo base_url();?>reports/billing_summary"><i class="fa fa-bar-chart"></i> <span>Billing Summary Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/supplier_item_price"><i class="fa fa-bar-chart"></i> <span>Supplier Item Price Report</span></a></li>
        <li><a href="<?php echo base_url();?>reports/inventory_expense_report"><i class="fa fa-bar-chart"></i> <span>Inventory Expense Report</span></a></li>
      
        <?php } ?>   

          <!-- hr -->
        <?php if($this->session->userdata['user_type_id'] == 10) { ?>

        <li><a href="<?php echo base_url();?>employee"><i class="ion-person-stalker"></i> <span>Employees</span></a></li>
        
         <li><a href="<?php echo base_url();?>reports/billing_summary"><i class="fa fa-bar-chart"></i> <span>Billing Summary Report</span></a></li>
        <?php } ?>       
  
        <!-- cashier -->
        <?php if($this->session->userdata['user_type_id'] == 4) { ?>
      
        <li class="header">TRANSACTION</li>
        <li><a href="<?php echo base_url();?>transaction/new_transaction"><i class="fa fa-plus-circle"></i> <span>New</span></a></li>
        <li><a href="<?php echo base_url();?>transaction/all_transactions"><i class="fa fa-book"></i> <span>All Transactions</span></a></li>
        <li class="header">SALES</li>
        <li><a href="<?php echo base_url();?>food_inventory/all_food_sales"><i class="fa fa-book"></i> <span>Food Sales</span></a></li>
        <li><a href="<?php echo base_url();?>reports/view_food_items_onhand" target="_blank"><i class="fa fa-book"></i> <span>Food Items Onhand</span></a></li>


        <?php } ?>  
	
 	      <?php if($this->session->userdata['user_type_id'] == 16) { ?>
      	 <li class="header">ACCOUNTING</li>
         <li><a href="<?php echo base_url();?>employee/credit_management"><i class="ion-person-stalker"></i> <span>Credit Management</span></a></li>
      	<?php } ?>

         <?php if($this->session->userdata['user_type_id'] == 1 || $this->session->userdata['user_type_id'] == 8) { ?>
         <li class="header">PORTAL</li>
         <li><a href="<?php echo base_url();?>portal/transaction_history"><i class="ion-person-stalker"></i> <span>Transaction History</span></a></li>
         <li><a href="<?php echo base_url();?>portal/meal_allowance_history"><i class="ion-person-stalker"></i> <span>Meal Allowance</span></a></li>
      
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>