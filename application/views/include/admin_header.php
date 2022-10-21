<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$CI->load->model('Reports');
$CI->load->model('Users');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
$users = $CI->Users->profile_edit_data();
$out_of_stock = $CI->Reports->out_of_stock_count();
      


?>

<style>

.navbar-custom-menu>.navbar-nav>li>.dropdown-menu {
    position: absolute;
    right: 0;
    left: auto;
    width: 850px;
    top: 111%;
    padding: 20px;

    border-radius: 10px;
    background-color: #fff;
}

ul.dropdown-submenu {
    padding: 0;
}

ul.dropdown-submenu>li {
    list-style: none;
}
    ul.dropdown-submenu>li>a {
    padding: 5px 10px;
    color: #777;
    display: block;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    white-space: nowrap;
}

ul.dropdown-submenu>li>.menu-title a{
    color: #777;
    font-size: 16px;
    font-weight: 500;

}

ul.dropdown-submenu>li>a:hover{
    background-color: #e1e3e9;
    color: #333;
}

 ul.dropdown-submenu>li>a>i {

    font-size: 16px;
    margin-right: 10px;

 }

</style>

<header class="main-header"> 
    <a href="<?php echo base_url() ?>" class="logo"> <!-- Logo -->
        <span class="logo-mini">
            <!--<b>A</b>BD-->
            <img src="<?php
            if (isset($Web_settings[0]['favicon'])) {
                echo html_escape($Web_settings[0]['favicon']);
            }
            ?>" alt="">
        </span>

        <span class="logo-lg">
            <!--<b>Admin</b>BD-->
            <img src="<?php
            if (isset($Web_settings[0]['logo'])) {
                echo html_escape($Web_settings[0]['logo']);
            }
            ?>" alt="">
        </span>
    </a>
    <!-- Header Navbar -->


    <nav class="navbar navbar-static-top text-center">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>

            <span class="pe-7s-keypad"></span>
        </a>

             
          <?php
          $urcolp = '0';
          if($this->uri->segment(2) =="gui_pos" ){
            $urcolp = "gui_pos";
          }
          if($this->uri->segment(2) =="pos_invoice" ){
            $urcolp = "pos_invoice";
          }

           if($this->uri->segment(2) != $urcolp ){

           if($this->permission1->method('new_invoice','create')->access()){
         

           ?>
           <a href="<?php echo base_url('Cinvoice')?>" class="btn btn-success btn-outline"><i class="fa fa-balance-scale"></i> <?php  echo display('invoice') ?></a>
     <?php }?>

     
        <?php if($this->permission1->method('customer_receive','create')->access()){ ?>
           <a href="<?php echo base_url('accounts/customer_receive')?>" class="btn btn-success btn-outline"><i class="fa fa-money"></i> Sales Payments</a>
       <?php } ?>
      
  <?php if($this->permission1->method('supplier_payment','create')->access()){ ?>
          <a href="<?php echo base_url('accounts/supplier_payment')?>" class="btn btn-success btn-outline"><i class="fa fa-money" aria-hidden="true"></i> Expenses Payment</a>
      <?php } ?>

<?php if($this->permission1->method('add_purchase','create')->access()){ ?>
          <a href="<?php echo base_url('Cpurchase')?>" class="btn btn-success btn-outline"><i class="ti-shopping-cart"></i> <?php echo display('purchase') ?></a>
 <?php }} ?>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                 <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Cservice/help_desk_show') ?>" >
                        <i class="pe-7s-help1" title="Help"></i>
                        <span class="label" style="background-color: #e53952;">?</span>
                    </a>
                </li>


                <li class="dropdown notifications-menu">
                    <a href="<?php echo base_url('Creport/out_of_stock') ?>" >
                        <i class="pe-7s-attention" title="<?php echo display('out_of_stock') ?>"></i>
                        <span class="label"><?php echo html_escape($out_of_stock) ?></span>
                    </a>
                </li>
                <!-- settings -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>
                  <!--   <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i><?php echo display('user_profile') ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i><?php echo 'Dashboard Settings' ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i><?php echo display('change_password') ?></a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i><?php echo display('logout') ?></a></li>
                    </ul> -->


                    <div class="dropdown-menu">

    <div class="row">
                
                  
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">

                        <li class="menu-title">Manage Setting</li>
                         <li><a href="<?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i>myManage Company</a></li>
                    

                    
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>Language </a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>Currency</a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>Setting </a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>Mail Setting </a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>Help</a></li>
                    </ul>
                  </div>
               
                  
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">
                          <li class="menu-title">Role Permission</li>
                        <li><a href=" <?php echo base_url('Permission/add_role') ?>"><i class="pe-7s-users"></i>Add Role</a></li>
                        <li><a href="<?php echo base_url('Permission/role_list') ?>"><i class="ti-dashboard"></i>Role List</a></li>
                        <li><a href=" <?php echo base_url('Permission/user_assign') ?>"><i class="pe-7s-settings"></i>User Assign Role</a></li>
                       
                    </ul>
                  </div>

                   <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">

                         <li class="menu-title">SMS</li>
                        <li><a href=" <?php echo base_url('Csms/configure') ?>"><i class="pe-7s-users"></i>SMS Configure</a></li>
                    </ul>
                  </div>
                  
                  <div class="menuCol col-xl-3 col-lg-3 col-md-12">
                    <ul class="dropdown-submenu">

                         <li class="menu-title">Admin Details</li>
                        <li><a href="  <?php echo base_url('Admin_dashboard/edit_profile') ?>"><i class="pe-7s-users"></i>User Profile</a></li>
                        <li><a href=" <?php echo base_url('Admin_dashboard/dashboardsetting') ?>"><i class="ti-dashboard"></i>Dashboard Settings</a></li>
                        <li><a href=" <?php echo base_url('Admin_dashboard/change_password_form') ?>"><i class="pe-7s-settings"></i>Change Password</a></li>
                        <li><a href="<?php echo base_url('Admin_dashboard/logout') ?>"><i class="pe-7s-key"></i>Logout</a></li>
                    </ul>
                  </div>
                
              </div>

</div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel text-center row" style="display: flex; align-items: center;">
            <div class="image col-md-6">
                <img src="<?php echo html_escape($users[0]['logo']) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="info col-md-6">
                <p>
                    
<?php 
if($_SESSION['user_type']==1)
{
    echo 'Super User';
}

if($_SESSION['user_type']==2)
{
    echo 'Admin User';
}

if($_SESSION['user_type']==3)
{
    echo 'User';
}

?>

                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo display('online') ?></a>
            </div>
        </div>




<?php if($_SESSION['user_type']==2)
{

    ?>

<ul class="sidebar-menu">

            <li class="active">
                <a href="<?php echo base_url(); ?>"><i class="ti-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>




    <!-- Invoice menu start -->


    
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span>Sale </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_invoice">New Sale</a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_profarma_invoice">Profarma Invoice</a></li>
                                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_packing_list">Packing List</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_ocean_export_tracking">Ocean Export Tracking</a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_trucking">Trucking</a></li>
                    

                </ul>
            </li>
        

                <!-- Customer menu start -->
                        <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Ccustomer/manage_customer">
                    <i class="fa fa-handshake-o"></i><span>Customer</span>
                 <!--    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
                </a>


              <!--   <a href="<?php echo base_url(); ?>Cinvoice/manage_invoice">
                    <i class="fa fa-balance-scale"></i><span>Sale</span> -->
                    <!-- <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
              <!--   </a> -->
          
            </li>
       
                         <!-- Customer menu end -->



            <!-- Customer menu start -->
            <!--             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-handshake-o"></i><span>Customer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "> <a href="<?php echo base_url(); ?>Ccustomer/manage_customer">Manage Customer</a></li>
                                                    <li class="treeview  ">
             <a href="<?php echo base_url(); ?>Ccustomer/manage_customer">Manage Customer</a> 
        </li>
                                                     <li class="treeview  ">
             <a href="<?php echo base_url(); ?>Ccustomer/customer_ledger_report">Customer Ledger</a>
        </li>
                                                         <li class="treeview  ">
             <a href="<?php echo base_url(); ?>Ccustomer/credit_customer">Credit Customer</a> 
        </li>
                      
                                         <li class="treeview  ">
             <a href="<?php echo base_url(); ?>Ccustomer/paid_customer">Paid Customer</a> 
        </li>
                      
                                           <li class="treeview  ">
            <a href="<?php echo base_url(); ?>Ccustomer/customer_advance">Customer Advance</a> 
        </li>
                                      </ul>
            </li>
         -->
            <!-- Customer menu end -->




               <!-- Product menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Cproduct/manage_product">
                    <i class="ti-bag"></i><span>Product</span>
                 
                </a>

       
          
            </li>
  
                         <!-- Product menu end -->






                    <!-- Supplier menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Csupplier/manage_supplier">
                    <i class="ti-user"></i><span>Vendor</span>
                 
                </a>

           
       
          
            </li>
        
                         <!-- Supplier menu end -->



            
                     <!-- Purchase menu start -->



                                  <li class="treeview  ">
                <a href="#">
                    <i class="ti-shopping-cart"></i><span>Expenses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>Cpurchase/manage_purchase">New Expenses</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>Cpurchase/manage_purchase_order">Purchase Order</a></li>
                       


                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Cpurchase/manage_packing_list">Packing List</a></li>
            

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Ccpurchase/manage_ocean_import_tracking">Ocean Import Tracking</a></li>
                       

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Ccpurchase/manage_trucking">Trucking</a></li>
                                       </ul>
            </li>
        


           <!--              <li  class="treeview  ">
                <a href="<?php echo base_url(); ?>Cpurchase/manage_purchase">
                    <i class="ti-shopping-cart"></i><span>Expenses</span> -->
                    <!-- <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
              <!--   </a>
                
            </li>
         -->
            <!-- Purchase menu end -->  
             <!-- Quotation Menu Start -->
            
                     <li class="treeview  ">
                <a href="<?php echo base_url(); ?>Cquotation/manage_quotation">
                    <i class="fa fa-book"></i><span>Quotation</span>
                   
                </a>
                <!-- <ul class="treeview-menu" >
                                <li><a href="<?php echo base_url(); ?>Cquotation">Add Quotation</a></li>
                                                    <li><a href="<?php echo base_url(); ?>Cquotation/manage_quotation">Manage Quotation</a></li>
                                </ul> -->
            </li>
        
                    <!-- quotation Menu end -->
             <!-- Stock menu start -->
              
                    <li class="treeview ">
            <a href="#">
                <i class="ti-bar-chart"></i><span>Stock</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Creport">Stock Report</a></li>
            
            </ul>
        </li>
    
            <!-- Stock menu end -->




        <!-- Taxes menu start -->
                    <li class="treeview ">
            <a href="<?php echo base_url(); ?>Caccounts/add_taxes">
                <i class="ti-bar-chart"></i><span>Taxes</span>
              <!--   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span> -->
            </a>
            <!-- <ul class="treeview-menu">
                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Caccounts/add_taxes">Add Taxes</a></li>
            

                             <li class="treeview  "><a href="<?php echo base_url(); ?>Caccounts">Taxes List</a></li>
            
            </ul>
 -->

           

        </li>
    
            <!-- Taxes menu end -->



                    <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-retweet" aria-hidden="true"></i><span>Return</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>Cretrun_m">Return</a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>Cretrun_m/return_list">Stock Return List</a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>Cretrun_m/supplier_return_list">Supplier Return List</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>Cretrun_m/wastage_return_list">Wastage Return List</a></li>
                      
                </ul>
            </li>
        



            <!-- Report menu start -->
                         <li class="treeview  ">
                <a href="#">
                    <i class="ti-book"></i><span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/closing">Closing</a></li>
                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/closing_report">Closing Report</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/all_report">Todays Report</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/todays_customer_receipt">Todays Customer Receipt</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/todays_sales_report">Sales Report</a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/user_sales_report">User Wise Sales Report</a></li>
                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/retrieve_dateWise_DueReports">Due Report</a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/retrieve_dateWise_Shippingcost">Shipping Cost Report</a></li>
                                                        <li><a href="<?php echo base_url(); ?>Admin_dashboard/todays_purchase_report">Expenses Report</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/purchase_report_category_wise">Expenses Report (Category wise)</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/product_sales_reports_date_wise">Sales Report (Product Wise)</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/sales_report_category_wise">Sales Report (Category wise)</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/sales_return">Sales Return</a></li>
                                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/supplier_return">Supplier Return</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/retrieve_dateWise_tax">Tax Report</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/total_profit_report">Profit Report (Sale Wise)</a></li>
                                    </ul>
            </li>
                    <!-- Report menu end -->


<!--New Account start-->
             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-money"></i><span>Accounts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/show_tree">Chart of Account</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/supplier_payment">Supplier Payment</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/customer_receive">Customer Receive</a></li>
                    
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/cash_adjustment">Cash Adjustment</a></li>
                                                             <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/debit_voucher">Debit Voucher</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/credit_voucher">Credit Voucher</a></li>
                                         
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/contra_voucher">Contra Voucher</a></li>
                                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/journal_voucher">Journal Voucher</a></li> 
                     
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/aprove_v">Vouchar Approval</a></li> 
                                                                      <li class="treeview  "><a href="">Report                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/cash_book">Cash Book</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/inventory_ledger">Inventory Ledger</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/bank_book">Bank Book</a></li>
                                                                        <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/general_ledger">General Ledger</a></li>
                                                                         <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/trial_balance">Trial Balance</a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/profit_loss_report">Profit Loss</a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/cash_flow_report">Cash Flow</a></li>
                                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/coa_print">Coa Print</a></li>
                                            </ul>   

            </li>
                        </ul>
            </li>


           <!-- New Account End -->

            <!-- Bank menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-briefcase"></i><span>Bank</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                          <li class="treeview  "><a href="<?php echo base_url(); ?>Csettings/index">Add New Bank</a></li>
                                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Csettings/bank_list">Manage Bank</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Csettings/bank_transaction">Bank Transaction</a></li>
                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Csettings/bank_ledger">Bank Ledger</a></li>
                                </ul>
            </li>
                    <!-- Bank menu end -->

           



         






                <!-- Human Resource New menu start -->
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span>Human Resource</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/add_employee">Employee Info (W4 form)</a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/manage_employee">Time sheet</a></li>
                                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/pay_slip_list">Pay slip / Checks per user</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/payroll_setting">Payroll settings</a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/add_expense_item">Expense</a></li>
                    



                                           <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/add_office_loan">Office loan</a></li>
                    


                                         <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/payroll_reports">Payroll reports</a></li>
                    


                </ul>
            </li>
                         <!-- Human Resource New menu end -->











                              
            <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Cweb_setting/email_setting">
                    <i class="ti-user"></i><span>Email</span>
                 
                </a>


                

           
       
          
            </li>
             

              
         




      
            <!-- service menu start -->


                            
                             
            <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Cservice/manage_service">
                    <i class="ti-user"></i><span>Service</span>
                 
            </a>

           
       
          
            </li>
                         <!-- service menu end -->




                              
            <li class="treeview  ">

             <a href="fa fa-asl-interpreting">
                    <i class="ti-user"></i><span>Manage Invoice Template</span>
                 
                </a>


                 <ul class="treeview-menu">
                
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>Cweb_setting/invoice_template">Sales Invoice</a>
                    </li>

                     <li class="treeview">
                        <a href="<?php echo base_url(); ?>Cweb_setting/expense_invoice_template">Expense Invoice</a>
                    </li>
               

            </ul>

           
       
          
            </li>
             


<!-- 

                        
            <li  class="treeview  ">
                <a href="#">
                    <i class="fa fa-asl-interpreting"></i><span>Service</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>Cservice">Add Service</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>Cservice/manage_service">Manage Service</a></li>
                                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Cservice/service_invoice_form">Service Invoice</a></li>
                                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Cservice/manage_service_invoice">Manage Service Invoice</a></li>
                                       </ul>
            </li>
         -->


      

           

            <!-- Software Settings menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-settings"></i><span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                      <!-- Software Settings menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-settings"></i> <span>Manage Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>Company_setup/manage_company">myManage Company</a></li>
                                             
                                                   
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Language">Language </a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Currency">Currency </a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Cweb_setting">Setting </a></li>
                
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>Cweb_setting/mail_setting">Mail Setting </a></li>
                                 <li style="display:none" class="treeview  "><a href="<?php echo base_url(); ?>Cweb_setting/app_setting">App Settings </a></li>
                </ul>
            </li>
                 <!-- Role permission start -->




              <li class="treeview  ">
                <a href="#">
                    <i class="ti-key"></i> <span>Role Permission</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
             
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Permission/add_role">Add Role</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>Permission/role_list">Role List</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>Permission/user_assign">User Assign Role</a></li>
                                     

                    </ul>
                </li>
                            <!-- Role permission End -->
                 <!-- sms menu start -->
                 <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-comments"></i> <span>SMS</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                
                      <li class="treeview  "><a href="<?php echo base_url(); ?>Csms/configure">SMS Configure</a></li>
                     
 
                </ul>
             </li>
         


                          <!-- sms menu start -->
                 <li class="treeview  ">
                <a href="<?php echo base_url(); ?>Cservice/help_desk">
                    <i class="fa fa-comments"></i> <span>Help</span>
                   
                </a>
         
             </li>
         



                <!-- sms menu end -->
                 <!-- Synchronizer setting start -->
                          <li style="display:none;" class="treeview  ">
                <a href="#">
                    <i class="ti-reload"></i>  <span>Data Synchronizer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul style="display:none" class="treeview-menu">
                
                               <li class="treeview  "><a href="<?php echo base_url(); ?>Backup_restore/restore_form">Restore</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Backup_restore/import_form">Import</a></li>
                
                     <li class="treeview  "><a href="<?php echo base_url(); ?>Backup_restore/download">Back Up</a></li>
                </ul>
            </li>
                    <!-- Synchronizer setting end -->
                
                </ul>
            </li>
                    <!-- Software Settings menu end -->

        </ul>


<?php } ?>



<!-- //////////////////////////////////////////////////// -->   





        <!-- sidebar menu -->
<?php if($_SESSION['user_type']==3)
{

    ?>

<ul class="sidebar-menu">

            <li class="active">
                <a href="<?php echo base_url(); ?>"><i class="ti-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>




    <!-- Invoice menu start -->


    <?php 
    if($_SESSION['sales']['create']==1  || $_SESSION['sales']['read']==1 || $_SESSION['sales']['update']==1 || $_SESSION['sales']['delete']==1 )
        { ?>
    
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span>Sale </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_invoice">New Sale</a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_profarma_invoice">Profarma Invoice</a></li>
                                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_packing_list">Packing List</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_ocean_export_tracking">Ocean Export Tracking</a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>Cinvoice/manage_trucking">Trucking</a></li>
                    

                </ul>
            </li>
        <?php } ?>
                         <!-- Invoice menu end -->

       
<?php 
    if($_SESSION['customer']['create']==1  || $_SESSION['customer']['read']==1 || $_SESSION['customer']['update']==1 || $_SESSION['customer']['delete']==1 )
        { ?>

                <!-- Customer menu start -->
                        <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Ccustomer/manage_customer">
                    <i class="fa fa-handshake-o"></i><span>Customer</span>
                 <!--    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
                </a>


              <!--   <a href="<?php echo base_url(); ?>Cinvoice/manage_invoice">
                    <i class="fa fa-balance-scale"></i><span>Sale</span> -->
                    <!-- <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
              <!--   </a> -->
          
            </li>
        <?php } ?>
                         <!-- Customer menu end -->



            <!-- Customer menu start -->
            <!--             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-handshake-o"></i><span>Customer</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "> <a href="<?php echo base_url(); ?>Ccustomer/manage_customer">Manage Customer</a></li>
                                                    <li class="treeview  ">
             <a href="<?php echo base_url(); ?>Ccustomer/manage_customer">Manage Customer</a> 
        </li>
                                                     <li class="treeview  ">
             <a href="<?php echo base_url(); ?>Ccustomer/customer_ledger_report">Customer Ledger</a>
        </li>
                                                         <li class="treeview  ">
             <a href="<?php echo base_url(); ?>Ccustomer/credit_customer">Credit Customer</a> 
        </li>
                      
                                         <li class="treeview  ">
             <a href="<?php echo base_url(); ?>Ccustomer/paid_customer">Paid Customer</a> 
        </li>
                      
                                           <li class="treeview  ">
            <a href="<?php echo base_url(); ?>Ccustomer/customer_advance">Customer Advance</a> 
        </li>
                                      </ul>
            </li>
         -->
            <!-- Customer menu end -->



<?php 
    if($_SESSION['product']['create']==1  || $_SESSION['product']['read']==1 || $_SESSION['product']['update']==1 || $_SESSION['product']['delete']==1 )
        { ?>
               <!-- Product menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Cproduct/manage_product">
                    <i class="ti-bag"></i><span>Product</span>
                 
                </a>

       
          
            </li>
        <?php } ?>
                         <!-- Product menu end -->




<?php 
    if($_SESSION['supplier']['create']==1  || $_SESSION['supplier']['read']==1 || $_SESSION['supplier']['update']==1 || $_SESSION['supplier']['delete']==1 )
        { ?>

                    <!-- Supplier menu start -->
                       <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Csupplier/manage_supplier">
                    <i class="ti-user"></i><span>Vendor</span>
                 
                </a>

           
       
          
            </li>
        <?php } ?>
                         <!-- Supplier menu end -->



            
                     <!-- Purchase menu start -->

<?php 
    if($_SESSION['purchase']['create']==1  || $_SESSION['purchase']['read']==1 || $_SESSION['purchase']['update']==1 || $_SESSION['purchase']['delete']==1 )
        { ?>

                                  <li class="treeview  ">
                <a href="#">
                    <i class="ti-shopping-cart"></i><span>Expenses</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>Cpurchase/manage_purchase">New Expenses</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>Cpurchase/manage_purchase_order">Purchase Order</a></li>
                       


                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Cpurchase/manage_packing_list">Packing List</a></li>
            

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Ccpurchase/manage_ocean_import_tracking">Ocean Import Tracking</a></li>
                       

                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Ccpurchase/manage_trucking">Trucking</a></li>
                                       </ul>
            </li>
        
<?php } ?>

           <!--              <li  class="treeview  ">
                <a href="<?php echo base_url(); ?>Cpurchase/manage_purchase">
                    <i class="ti-shopping-cart"></i><span>Expenses</span> -->
                    <!-- <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
              <!--   </a>
                
            </li>
         -->
            <!-- Purchase menu end -->  
             <!-- Quotation Menu Start -->
             <?php 
    if($_SESSION['quotation']['create']==1  || $_SESSION['quotation']['read']==1 || $_SESSION['quotation']['update']==1 || $_SESSION['quotation']['delete']==1 )
        { ?>
                     <li class="treeview  ">
                <a href="<?php echo base_url(); ?>Cquotation/manage_quotation">
                    <i class="fa fa-book"></i><span>Quotation</span>
                   
                </a>
                <!-- <ul class="treeview-menu" >
                                <li><a href="<?php echo base_url(); ?>Cquotation">Add Quotation</a></li>
                                                    <li><a href="<?php echo base_url(); ?>Cquotation/manage_quotation">Manage Quotation</a></li>
                                </ul> -->
            </li>
        <?php } ?>
                    <!-- quotation Menu end -->
             <!-- Stock menu start -->
              <?php 
    if($_SESSION['stock']['create']==1  || $_SESSION['stock']['read']==1 || $_SESSION['stock']['update']==1 || $_SESSION['stock']['delete']==1 )
        { ?>
                    <li class="treeview ">
            <a href="#">
                <i class="ti-bar-chart"></i><span>Stock</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Creport">Stock Report</a></li>
            
            </ul>
        </li>
    <?php } ?>
            <!-- Stock menu end -->


<?php 
    if($_SESSION['tax']['create']==1  || $_SESSION['tax']['read']==1 || $_SESSION['tax']['update']==1 || $_SESSION['tax']['delete']==1 )
        { ?>

        <!-- Taxes menu start -->
                    <li class="treeview ">
            <a href="<?php echo base_url(); ?>Caccounts/add_taxes">
                <i class="ti-bar-chart"></i><span>Taxes</span>
              <!--   <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span> -->
            </a>
            <!-- <ul class="treeview-menu">
                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Caccounts/add_taxes">Add Taxes</a></li>
            

                             <li class="treeview  "><a href="<?php echo base_url(); ?>Caccounts">Taxes List</a></li>
            
            </ul>
 -->

           

        </li>
    <?php } ?>
            <!-- Taxes menu end -->

<?php 
    if($_SESSION['return']['create']==1  || $_SESSION['return']['read']==1 || $_SESSION['return']['update']==1 || $_SESSION['return']['delete']==1 )
        { ?>

                    <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-retweet" aria-hidden="true"></i><span>Return</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>Cretrun_m">Return</a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>Cretrun_m/return_list">Stock Return List</a></li>
                                                               <li class="treeview  "><a href="<?php echo base_url(); ?>Cretrun_m/supplier_return_list">Supplier Return List</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>Cretrun_m/wastage_return_list">Wastage Return List</a></li>
                      
                </ul>
            </li>
        <?php } ?>

<?php 
    if( $_SESSION['report']['read']==1 )
        { ?>

            <!-- Report menu start -->
                         <li class="treeview  ">
                <a href="#">
                    <i class="ti-book"></i><span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/closing">Closing</a></li>
                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/closing_report">Closing Report</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/all_report">Todays Report</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/todays_customer_receipt">Todays Customer Receipt</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/todays_sales_report">Sales Report</a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/user_sales_report">User Wise Sales Report</a></li>
                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/retrieve_dateWise_DueReports">Due Report</a></li>
                                                                 <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/retrieve_dateWise_Shippingcost">Shipping Cost Report</a></li>
                                                        <li><a href="<?php echo base_url(); ?>Admin_dashboard/todays_purchase_report">Expenses Report</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/purchase_report_category_wise">Expenses Report (Category wise)</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/product_sales_reports_date_wise">Sales Report (Product Wise)</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/sales_report_category_wise">Sales Report (Category wise)</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/sales_return">Sales Return</a></li>
                                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/supplier_return">Supplier Return</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/retrieve_dateWise_tax">Tax Report</a></li>
                                                                  <li class="treeview  "><a href="<?php echo base_url(); ?>Admin_dashboard/total_profit_report">Profit Report (Sale Wise)</a></li>
                                    </ul>
            </li>
                    <!-- Report menu end -->

<?php 
}
    if(  $_SESSION['accounts']['read']==1)
        { ?>
<!--New Account start-->
             <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-money"></i><span>Accounts</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/show_tree">Chart of Account</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/supplier_payment">Supplier Payment</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/customer_receive">Customer Receive</a></li>
                    
                                         <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/cash_adjustment">Cash Adjustment</a></li>
                                                             <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/debit_voucher">Debit Voucher</a></li>
                                                                <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/credit_voucher">Credit Voucher</a></li>
                                         
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/contra_voucher">Contra Voucher</a></li>
                                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/journal_voucher">Journal Voucher</a></li> 
                     
                                             <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/aprove_v">Vouchar Approval</a></li> 
                                                                      <li class="treeview  "><a href="">Report                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                                     <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/cash_book">Cash Book</a></li>
                                                     <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/inventory_ledger">Inventory Ledger</a></li>
                                                              <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/bank_book">Bank Book</a></li>
                                                                        <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/general_ledger">General Ledger</a></li>
                                                                         <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/trial_balance">Trial Balance</a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/profit_loss_report">Profit Loss</a></li>
                                                   <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/cash_flow_report">Cash Flow</a></li>
                                                                          <li class="treeview  "><a href="<?php echo base_url(); ?>accounts/coa_print">Coa Print</a></li>
                                            </ul>   

            </li>
                        </ul>
            </li>

            <?php 
}
    if($_SESSION['bank']['create']==1  || $_SESSION['bank']['read']==1 || $_SESSION['bank']['update']==1 || $_SESSION['bank']['delete']==1 )
        { ?>
           <!-- New Account End -->

            <!-- Bank menu start -->
                          <li class="treeview  ">
                <a href="#">
                    <i class="ti-briefcase"></i><span>Bank</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                          <li class="treeview  "><a href="<?php echo base_url(); ?>Csettings/index">Add New Bank</a></li>
                                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Csettings/bank_list">Manage Bank</a></li>
                                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Csettings/bank_transaction">Bank Transaction</a></li>
                
                                      <li class="treeview  "><a href="<?php echo base_url(); ?>Csettings/bank_ledger">Bank Ledger</a></li>
                                </ul>
            </li>
                    <!-- Bank menu end -->

           



           <?php 
}
    if($_SESSION['hrm_management']['create']==1  || $_SESSION['hrm_management']['read']==1 || $_SESSION['hrm_management']['update']==1 || $_SESSION['hrm_management']['delete']==1 )
        { ?>






                <!-- Human Resource New menu start -->
                        <li class="treeview  ">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span>Human Resource</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                                        <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/add_employee">Employee Info (W4 form)</a></li>
                                                    <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/manage_employee">Time sheet</a></li>
                                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/pay_slip_list">Pay slip / Checks per user</a></li>
                                            <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/payroll_setting">Payroll settings</a></li>
                    

                                          <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/add_expense_item">Expense</a></li>
                    



                                           <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/add_office_loan">Office loan</a></li>
                    


                                         <li class="treeview  "><a href="<?php echo base_url(); ?>Chrm/payroll_reports">Payroll reports</a></li>
                    


                </ul>
            </li>
                         <!-- Human Resource New menu end -->


<?php } ?>








                              
            <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Cweb_setting/email_setting">
                    <i class="ti-user"></i><span>Email</span>
                 
                </a>


                

           
       
          
            </li>
             

              
         



 <?php 

    if($_SESSION['service']['create']==1  || $_SESSION['service']['read']==1 || $_SESSION['service']['update']==1 || $_SESSION['service']['delete']==1 )
        { ?>

      
            <!-- service menu start -->


                            
                             
            <li class="treeview  ">

             <a href="<?php echo base_url(); ?>Cservice/manage_service">
                    <i class="ti-user"></i><span>Service</span>
                 
            </a>

           
       
          
            </li>
                         <!-- service menu end -->
<?php } ?>



                              
            




                        
           
  


      

           

            <!-- Software Settings menu start -->
                          <
        </ul>
<?php } ?>


<?php if($_SESSION['user_type']==1)
{

    ?>
        <ul class="sidebar-menu">
            <li class="active">
                <a href="<?php echo base_url(); ?>"><i class="ti-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo base_url('User'); ?>"> <span>Add company</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
            <li class="">
                <a href="<?php echo base_url('User'); ?>"><span><i class="ti-user"></i>Add Admin User</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
           
            <li class="">
                <a href="<?php echo base_url('User'); ?>"><span>Manage company</span>
                    <span class="pull-right-container">
                        <span class="label label-success pull-right"></span>
                    </span>
                </a>
            </li>
           
        </ul>

    <?php } ?>



    
    </div> <!-- /.sidebar -->
</aside>
