<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ppurchases extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //Count purchase
    public function count_purchase() {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
         $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }


        //Count purchase
    public function count_purchase_order() {
        $this->db->select('*');
        $this->db->from('purchase_order');
  //  $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
       ////  $this->db->where('a.create_by',$this->session->userdata('user_id'));
//$this->db->order_by('a.purchase_date', 'desc');
     //   $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

           //Count Ocean Import
    public function count_ocean_import() {
        $this->db->select('*');
        $this->db->from('ocean_import_tracking');
  //  $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
       ////  $this->db->where('a.create_by',$this->session->userdata('user_id'));
//$this->db->order_by('a.purchase_date', 'desc');
     //   $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }


               //Count Trucking
    public function count_trucking() {
        $this->db->select('*');
        $this->db->from('expense_trucking');
  //    $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
       ////  $this->db->where('a.create_by',$this->session->userdata('user_id'));
//$this->db->order_by('a.purchase_date', 'desc');
     //   $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    


     public function getPurchaseList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.purchase_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
         ## Read value
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value

         ## Search 
         $searchQuery = "";
         if($searchValue != ''){
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

         ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
         $this->db->where($searchQuery);
       
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
         foreach($records as $record ){
          $button = '';
          $base_url = base_url();
          $jsaction = "return confirm('Are You Sure ?')";

           $button .='  <a href="'.$base_url.'Ccpurchase/purchase_details_data/'.$record->purchase_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Ccpurchase/purchase_update_form/'.$record->purchase_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Ccpurchase/purchase_details_data/'.$record->purchase_id.'">'.$record->purchase_id.'</a>';
               
            $data[] = array( 
                'sl'               =>$sl,
                'chalan_no'        =>$record->chalan_no,
                 'etd'        =>$record->etd,
                  'eta'        =>$record->eta,
                'purchase_id'      =>$purchase_ids,
                'supplier_name'    =>$record->supplier_name,
                'purchase_date'    =>$this->occational->dateConvert($record->purchase_date),
                'total_amount'     =>$record->grand_total_amount,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
         );

         return $response; 
    }





       public function getPurchaseOrderList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.est_ship_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
         ## Read value
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value

         ## Search 
         $searchQuery = "";
         if($searchValue != ''){
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('purchase_order a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
       // $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('purchase_order a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('purchase_order a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
         $this->db->where($searchQuery);
       
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
         foreach($records as $record ){
          $button = '';
          $base_url = base_url();
          $jsaction = "return confirm('Are You Sure ?')";

           $button .='  <a href="'.$base_url.'Ccpurchase/purchase_order_details_data/'.$record->purchase_order_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Ccpurchase/purchase_order_update_form/'.$record->purchase_order_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Ccpurchase/purchase_order_details_data/'.$record->purchase_order_id.'">'.$record->purchase_order_id.'</a>';
               
               $data[] = array( 
                'sl'               =>$sl,
                'chalan_no'        =>$record->chalan_no,
                 'etd'        =>$record->etd,
                  'eta'        =>$record->eta,
                'purchase_id'      =>$purchase_ids,
                'supplier_name'    =>$record->supplier_name,
                'purchase_date'    =>$this->occational->dateConvert($record->purchase_date),
                'total_amount'     =>$record->grand_total_amount,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
         );

         return $response; 
    }



      public function getOceanImportList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.est_ship_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
         ## Read value
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value

         ## Search 
         $searchQuery = "";
         if($searchValue != ''){
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
       // $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
         $this->db->where($searchQuery);
       
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
         foreach($records as $record ){
          $button = '';
          $base_url = base_url();
          $jsaction = "return confirm('Are You Sure ?')";

           $button .='  <a href="'.$base_url.'Ccpurchase/ocean_import_tracking_details_data/'.$record->ocean_import_tracking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Ccpurchase/ocean_import_tracking_update_form/'.$record->ocean_import_tracking_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Ccpurchase/ocean_import_tracking_details_data/'.$record->ocean_import_tracking_id.'">'.$record->ocean_import_tracking_id.'</a>';
               
               $data[] = array( 
                'sl'               =>$sl,
                'booking_no'        =>$record->booking_no,
                 'container_no'        =>$record->container_no,
                  'seal_no'        =>$record->seal_no,
                'ocean_import_tracking_id'      =>$purchase_ids,
                'supplier_name'    =>$record->supplier_name,
                'invoice_date'    =>$this->occational->dateConvert($record->invoice_date),
                'place_of_delivery'     =>$record->place_of_delivery,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
         );

         return $response; 
    }




        public function getTruckingList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.est_ship_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
         ## Read value
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value

         ## Search 
         $searchQuery = "";
         if($searchValue != ''){
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('expense_trucking a');
        $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
       // $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('expense_trucking a');
         $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('a.*,b.customer_name');
          $this->db->from('expense_trucking a');
         $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
         $this->db->where($searchQuery);
       
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
         foreach($records as $record ){
          $button = '';
          $base_url = base_url();
          $jsaction = "return confirm('Are You Sure ?')";

           $button .='  <a href="'.$base_url.'Ccpurchase/trucking_details_data/'.$record->trucking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Ccpurchase/trucking_update_form/'.$record->trucking_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Ccpurchase/trucking_details_data/'.$record->trucking_id.'">'.$record->trucking_id.'</a>';
               
               $data[] = array( 
                'sl'               =>$sl,
                'invoice_no'        =>$record->invoice_no,
                'trucking_id'      =>$purchase_ids,
                'customer_name'    =>$record->customer_name,
                'container_pickup_date' => $record->container_pickup_date,
                'delivery_date' => $record->delivery_date,
                'invoice_date'    =>$this->occational->dateConvert($record->invoice_date),
                'shipment_company'     =>$record->shipment_company,
                'total' => $record->grand_total_amount,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
         );

         return $response; 
    }


    //purchase List
    public function purchase_list($per_page, $page) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // purchase search by suppplier
    public function purchase_search($supplier_id, $per_page, $page) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.supplier_id', $supplier_id);
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // purchase search count
    public function count_purchase_seach($supplier_id) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.supplier_id', $supplier_id);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

//purchase info by invoice id
    public function purchase_list_invoice_id($invoice_no) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.chalan_no', $invoice_no);
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Select All Supplier List
    public function select_all_supplier() {
        $query = $this->db->select('*')
                ->from('supplier_information')
                ->where('created_by',$this->session->userdata('user_id'))
                ->where('status', '1')
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //purchase Search  List
    public function purchase_by_search($supplier_id) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('b.supplier_id', $supplier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Count purchase
    public function purchase_entry() {
        $purchase_id = date('YmdHis');

        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
      
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
       }else{
           $bankcoaid = '';
       }

        //supplier & product id relation ship checker.
        // for ($i = 0, $n = count($p_id); $i < $n; $i++) {
        //     $product_id = $p_id[$i];
        //     $value = $this->product_supplier_check($product_id, $supplier_id);
        //     if ($value == 0) {
        //         $this->session->set_flashdata('error_message', display('product_and_supplier_did_not_match'));
        //         redirect(base_url('Ccpurchase'));
        //         exit();
        //     }
        // }

        $data = array(
            'purchase_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'chalan_no'          => $this->input->post('invoice_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'grand_total_amount' => $this->input->post('total',TRUE),
            // 'grand_total_amount' => $this->input->post('grand_total_price',TRUE),
            'total_discount'     => $this->input->post('discount',TRUE),
            'purchase_date'      => $this->input->post('bill_date',TRUE),
            'purchase_details'   => $this->input->post('purchase_details',TRUE),
            'payment_due_date'   => $this->input->post('payment_due_date',TRUE),
            'remarks'            => $this->input->post('remarks',TRUE),
            'message_invoice'    => $this->input->post('message_invoice',TRUE),
          
            'etd'   => $this->input->post('etd',TRUE),
            'eta'   => $this->input->post('eta',TRUE),
            'shipping_line'   => $this->input->post('shipping_line',TRUE),
            'container_no'   => $this->input->post('container_no',TRUE),
            'bl_number'   => $this->input->post('bl_number',TRUE),
            'isf_filling'   => $this->input->post('isf_filling',TRUE),
            'paid_amount'        => $paid_amount,
            'due_amount'         => $due_amount,
            'status'             => 1,
            'bank_id'            =>  $this->input->post('bank_id',TRUE),
            'payment_type'       =>  $this->input->post('paytype',TRUE),
        );
        //Supplier Credit
        $purchasecoatran = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
          'Debit'          =>  0,
          'Credit'         =>  $this->input->post('grand_total_price',TRUE),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
          ///Inventory Debit
       $coscr = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory Debit For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  $this->input->post('grand_total_price',TRUE),
      'Credit'         =>  0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 



       // Expense for company
         $expense = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->input->post('purchase_date',TRUE),
      'COAID'          => 402,
      'Narration'      => 'Company Credit For  '.$supinfo->supplier_name,
      'Debit'          => $this->input->post('grand_total_price',TRUE),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 
             $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

     $supplierdebit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
             
                  // bank ledger
 $bankc = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
 // Bank summary for credit

       //new end


        
       
        $this->db->insert('product_purchase', $data);
        $this->db->insert('acc_transaction',$coscr);
        $this->db->insert('acc_transaction',$purchasecoatran);  
        $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
       
        $this->db->insert('acc_transaction',$supplierdebit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplierdebit); 
        }    
        }       

        $rate = $this->input->post('product_rate',TRUE);
        $quantity = $this->input->post('product_quantity',TRUE);
        $t_price = $this->input->post('total_price',TRUE);
        $discount = $this->input->post('discount',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $disc = $discount[$i];

            $data1 = array(
                'purchase_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'create_by'          =>  $this->session->userdata('user_id'),
                'status'             => 1
            );

            if (!empty($quantity)) {
                $this->db->insert('product_purchase_details', $data1);
            }
        }

        return true;
    }





     //Purchase Order Entry
    public function purchase_order_entry() {
        $purchase_id = date('YmdHis');

        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
      
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
       }else{
           $bankcoaid = '';
       }

        //supplier & product id relation ship checker.
        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_id = $p_id[$i];
            $value = $this->product_supplier_check($product_id, $supplier_id);
            if ($value == 0) {
                $this->session->set_flashdata('error_message', display('product_and_supplier_did_not_match'));
                redirect(base_url('Ccpurchase'));
                exit();
            }
        }

        $data = array(
            'purchase_order_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),


            'ship_to'         =>$this->input->post('ship_to',TRUE),
            'created_by'       =>$this->input->post('created_by',TRUE),
            'payment_terms' => $this->input->post('payment_terms',TRUE),
            'shipment_terms' => $this->input->post('shipment_terms',TRUE),
            'est_ship_date'  => $this->input->post('est_ship_date',TRUE),


            'chalan_no'          => $this->input->post('chalan_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'grand_total_amount' => $this->input->post('total',TRUE),
            // 'grand_total_amount' => $this->input->post('grand_total_price',TRUE),
            'total_discount'     => $this->input->post('discount',TRUE),
            'purchase_date'      => $receive_date,
            'purchase_details'   => $this->input->post('purchase_details',TRUE),
            'payment_due_date'   => $this->input->post('payment_due_date',TRUE),
            'remarks'            => $this->input->post('remarks',TRUE),
            'message_invoice'    => $this->input->post('message_invoice',TRUE),
          
            'etd'   => $this->input->post('etd',TRUE),
            'eta'   => $this->input->post('eta',TRUE),
            'shipping_line'   => $this->input->post('shipping_line',TRUE),
            'container_no'   => $this->input->post('container_no',TRUE),
            'bl_number'   => $this->input->post('bl_number',TRUE),
            'isf_filling'   => $this->input->post('isf_filling',TRUE),
            'paid_amount'        => $paid_amount,
            'due_amount'         => $due_amount,
            'status'             => 1,
            'bank_id'            =>  $this->input->post('bank_id',TRUE),
            'payment_type'       =>  $this->input->post('paytype',TRUE),
        );
        //Supplier Credit
        $purchasecoatran = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
          'Debit'          =>  0,
          'Credit'         =>  $this->input->post('grand_total_price',TRUE),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
          ///Inventory Debit
       $coscr = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory Debit For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  $this->input->post('grand_total_price',TRUE),
      'Credit'         =>  0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 



       // Expense for company
         $expense = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->input->post('purchase_date',TRUE),
      'COAID'          => 402,
      'Narration'      => 'Company Credit For  '.$supinfo->supplier_name,
      'Debit'          => $this->input->post('grand_total_price',TRUE),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 
             $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

     $supplierdebit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
             
                  // bank ledger
 $bankc = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
 // Bank summary for credit

       //new end


        
       
        $this->db->insert('purchase_order', $data);
        $this->db->insert('acc_transaction',$coscr);
        $this->db->insert('acc_transaction',$purchasecoatran);  
        $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
       
        $this->db->insert('acc_transaction',$supplierdebit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplierdebit); 
        }    
        }       

        $rate = $this->input->post('product_rate',TRUE);
        $quantity = $this->input->post('product_quantity',TRUE);
        $slabs = $this->input->post('slabs',TRUE);
        $t_price = $this->input->post('total_price',TRUE);
        $discount = $this->input->post('discount',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $slabs = $slabs[$i];
            $product_quantity = $quantity[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $disc = $discount[$i];

            $data1 = array(
                'purchase_order_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'slabs'              => $slabs,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'create_by'          =>  $this->session->userdata('user_id'),
                'status'             => 1
            );

            if (!empty($quantity)) {
                $this->db->insert('purchase_order_details', $data1);
            }
        }

        return true;
    }




         //Ocean Import Entry
    public function ocean_import_entry() {

        $purchase_id = date('YmdHis');

        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
      
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
       }else{
           $bankcoaid = '';
       }

        //supplier & product id relation ship checker.
        // for ($i = 0, $n = count($p_id); $i < $n; $i++) {
        //     $product_id = $p_id[$i];
        //     $value = $this->product_supplier_check($product_id, $supplier_id);
        //     if ($value == 0) {
        //         $this->session->set_flashdata('error_message', display('product_and_supplier_did_not_match'));
        //         redirect(base_url('Ccpurchase'));
        //         exit();
        //     }
        // }

        $data = array(
            'ocean_import_tracking_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'shipper' => $this->input->post('shipper',TRUE),
            'container_no' =>$this->input->post('container_no',TRUE),
            'seal_no'      =>$this->input->post('seal_no',TRUE),
            'etd'   => $this->input->post('etd',TRUE),
            'eta'   => $this->input->post('eta',TRUE),
            'invoice_date' => $this->input->post('invoice_date',TRUE),
            'consignee' => $this->input->post('consignee',TRUE),
            'notify_party' => $this->input->post('notify_party',TRUE),
            'vessel' => $this->input->post('vessel',TRUE),
            'voyage_no' =>$this->input->post('voyage_no',TRUE),
            'port_of_loading' => $this->input->post('port_of_loading',TRUE),
            'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),
            'place_of_delivery' =>$this->input->post('place_of_delivery',TRUE),
            'freight_forwarder' =>$this->input->post('freight_forwarder',TRUE),
            'particular'   => $this->input->post('particular',TRUE),
            'booking_no'          => $this->input->post('booking_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'status'             => 1,
          
        );



          $query= $this->db->insert('ocean_import_tracking', $data);
       // print_r($query);die();
        //Supplier Credit
        // $purchasecoatran = array(
        //   'VNo'            =>  $purchase_id,
        //   'Vtype'          =>  'Purchase',
        //   'VDate'          =>  $this->input->post('purchase_date',TRUE),
        //   'COAID'          =>  $sup_coa->HeadCode,
        //   'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
        //   'Debit'          =>  0,
        //   'Credit'         =>  $this->input->post('grand_total_price',TRUE),
        //   'IsPosted'       =>  1,
        //   'CreateBy'       =>  $receive_by,
        //   'CreateDate'     =>  $receive_date,
        //   'IsAppove'       =>  1
        // ); 
          ///Inventory Debit
    //    $coscr = array(
    //   'VNo'            =>  $purchase_id,
    //   'Vtype'          =>  'Purchase',
    //   'VDate'          =>  $this->input->post('purchase_date',TRUE),
    //   'COAID'          =>  10107,
    //   'Narration'      =>  'Inventory Debit For Supplier '.$supinfo->supplier_name,
    //   'Debit'          =>  $this->input->post('grand_total_price',TRUE),
    //   'Credit'         =>  0,//purchase price asbe
    //   'IsPosted'       => 1,
    //   'CreateBy'       => $receive_by,
    //   'CreateDate'     => $createdate,
    //   'IsAppove'       => 1
    // ); 



       // Expense for company
    //      $expense = array(
    //   'VNo'            => $purchase_id,
    //   'Vtype'          => 'Purchase',
    //   'VDate'          => $this->input->post('purchase_date',TRUE),
    //   'COAID'          => 402,
    //   'Narration'      => 'Company Credit For  '.$supinfo->supplier_name,
    //   'Debit'          => $this->input->post('grand_total_price',TRUE),
    //   'Credit'         => 0,//purchase price asbe
    //   'IsPosted'       => 1,
    //   'CreateBy'       => $receive_by,
    //   'CreateDate'     => $createdate,
    //   'IsAppove'       => 1
    // ); 
    //          $cashinhand = array(
    //   'VNo'            =>  $purchase_id,
    //   'Vtype'          =>  'Purchase',
    //   'VDate'          =>  $this->input->post('purchase_date',TRUE),
    //   'COAID'          =>  1020101,
    //   'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
    //   'Debit'          =>  0,
    //   'Credit'         =>  $paid_amount,
    //   'IsPosted'       =>  1,
    //   'CreateBy'       =>  $receive_by,
    //   'CreateDate'     =>  $createdate,
    //   'IsAppove'       =>  1
    // ); 

     // $supplierdebit = array(
     //      'VNo'            =>  $purchase_id,
     //      'Vtype'          =>  'Purchase',
     //      'VDate'          =>  $this->input->post('purchase_date',TRUE),
     //      'COAID'          =>  $sup_coa->HeadCode,
     //      'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
     //      'Debit'          =>  $paid_amount,
     //      'Credit'         =>  0,
     //      'IsPosted'       =>  1,
     //      'CreateBy'       =>  $receive_by,
     //      'CreateDate'     =>  $receive_date,
     //      'IsAppove'       =>  1
     //    ); 
             
                  // bank ledger
 // $bankc = array(
 //      'VNo'            =>  $purchase_id,
 //      'Vtype'          =>  'Purchase',
 //      'VDate'          =>  $this->input->post('purchase_date',TRUE),
 //      'COAID'          =>  $bankcoaid,
 //      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
 //      'Debit'          =>  0,
 //      'Credit'         =>  $paid_amount,
 //      'IsPosted'       =>  1,
 //      'CreateBy'       =>  $receive_by,
 //      'CreateDate'     =>  $createdate,
 //      'IsAppove'       =>  1
 //    ); 
 // Bank summary for credit

       //new end


        
       

        // $this->db->insert('acc_transaction',$coscr);
        // $this->db->insert('acc_transaction',$purchasecoatran);  
        // $this->db->insert('acc_transaction',$expense);
      //   if($this->input->post('paytype') == 2){
      //     if(!empty($paid_amount)){
      //   $this->db->insert('acc_transaction',$bankc);
       
      //   $this->db->insert('acc_transaction',$supplierdebit);
      // }
      //   }
      //   if($this->input->post('paytype') == 1){
      //     if(!empty($paid_amount)){
      //   $this->db->insert('acc_transaction',$cashinhand);
      //   $this->db->insert('acc_transaction',$supplierdebit); 
      //   }    
      //   }       

        // $rate = $this->input->post('product_rate',TRUE);
        // $quantity = $this->input->post('product_quantity',TRUE);
        // $slabs = $this->input->post('slabs',TRUE);
        // $t_price = $this->input->post('total_price',TRUE);
        // $discount = $this->input->post('discount',TRUE);

        // for ($i = 0, $n = count($p_id); $i < $n; $i++) {
        //     $slabs = $slabs[$i];
        //     $product_quantity = $quantity[$i];
        //     $product_rate = $rate[$i];
        //     $product_id = $p_id[$i];
        //     $total_price = $t_price[$i];
        //     $disc = $discount[$i];

        //     $data1 = array(
        //         'purchase_order_detail_id' => $this->generator(15),
        //         'purchase_id'        => $purchase_id,
        //         'product_id'         => $product_id,
        //         'slabs'              => $slabs,
        //         'quantity'           => $product_quantity,
        //         'rate'               => $product_rate,
        //         'total_amount'       => $total_price,
        //         'discount'           => $disc,
        //         'create_by'          =>  $this->session->userdata('user_id'),
        //         'status'             => 1
        //     );

        //     if (!empty($quantity)) {
        //         $this->db->insert('purchase_order_details', $data1);
        //     }
        // }

        return true;
    }


           //Trucking 
    //Entry
    public function trucking_entry() {

        $purchase_id = date('YmdHis');

        $p_id = $this->input->post('product_id',TRUE);
      //  $supplier_id = $this->input->post('supplier_id',TRUE);
      //  $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
      //  $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
      //  $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
      
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
       }else{
           $bankcoaid = '';
       }

        //supplier & product id relation ship checker.
        // for ($i = 0, $n = count($p_id); $i < $n; $i++) {
        //     $product_id = $p_id[$i];
        //     $value = $this->product_supplier_check($product_id, $supplier_id);
        //     if ($value == 0) {
        //         $this->session->set_flashdata('error_message', display('product_and_supplier_did_not_match'));
        //         redirect(base_url('Ccpurchase'));
        //         exit();
        //     }
        // }

        $data = array(
            'trucking_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'invoice_no' => $this->input->post('invoice_no',TRUE),
            'invoice_date' =>$this->input->post('invoice_date',TRUE),
            'bill_to'      =>$this->input->post('bill_to',TRUE),
            'shipment_company'   => $this->input->post('shipment_company',TRUE),
            'container_pickup_date'   => $this->input->post('container_pickup_date',TRUE),
            'delivery_date' => $this->input->post('delivery_date',TRUE),
            'grand_total_amount' => $this->input->post('total',TRUE),
            'status'             => 1,
          
        );



        
   
        //Supplier Credit
        // $purchasecoatran = array(
        //   'VNo'            =>  $purchase_id,
        //   'Vtype'          =>  'Purchase',
        //   'VDate'          =>  $this->input->post('purchase_date',TRUE),
        //   'COAID'          =>  $sup_coa->HeadCode,
        //   'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
        //   'Debit'          =>  0,
        //   'Credit'         =>  $this->input->post('grand_total_price',TRUE),
        //   'IsPosted'       =>  1,
        //   'CreateBy'       =>  $receive_by,
        //   'CreateDate'     =>  $receive_date,
        //   'IsAppove'       =>  1
        // ); 
          //Inventory Debit
    //    $coscr = array(
    //   'VNo'            =>  $purchase_id,
    //   'Vtype'          =>  'Purchase',
    //   'VDate'          =>  $this->input->post('purchase_date',TRUE),
    //   'COAID'          =>  10107,
    //   'Narration'      =>  'Inventory Debit For Supplier '.$supinfo->supplier_name,
    //   'Debit'          =>  $this->input->post('grand_total_price',TRUE),
    //   'Credit'         =>  0,//purchase price asbe
    //   'IsPosted'       => 1,
    //   'CreateBy'       => $receive_by,
    //   'CreateDate'     => $createdate,
    //   'IsAppove'       => 1
    // ); 



      // Expense for company
    //      $expense = array(
    //   'VNo'            => $purchase_id,
    //   'Vtype'          => 'Purchase',
    //   'VDate'          => $this->input->post('purchase_date',TRUE),
    //   'COAID'          => 402,
    //   'Narration'      => 'Company Credit For  '.$supinfo->supplier_name,
    //   'Debit'          => $this->input->post('grand_total_price',TRUE),
    //   'Credit'         => 0,//purchase price asbe
    //   'IsPosted'       => 1,
    //   'CreateBy'       => $receive_by,
    //   'CreateDate'     => $createdate,
    //   'IsAppove'       => 1
    // ); 
    //          $cashinhand = array(
    //   'VNo'            =>  $purchase_id,
    //   'Vtype'          =>  'Purchase',
    //   'VDate'          =>  $this->input->post('purchase_date',TRUE),
    //   'COAID'          =>  1020101,
    //   'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
    //   'Debit'          =>  0,
    //   'Credit'         =>  $paid_amount,
    //   'IsPosted'       =>  1,
    //   'CreateBy'       =>  $receive_by,
    //   'CreateDate'     =>  $createdate,
    //   'IsAppove'       =>  1
    // ); 

     // $supplierdebit = array(
     //      'VNo'            =>  $purchase_id,
     //      'Vtype'          =>  'Purchase',
     //      'VDate'          =>  $this->input->post('purchase_date',TRUE),
     //      'COAID'          =>  $sup_coa->HeadCode,
     //      'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
     //      'Debit'          =>  $paid_amount,
     //      'Credit'         =>  0,
     //      'IsPosted'       =>  1,
     //      'CreateBy'       =>  $receive_by,
     //      'CreateDate'     =>  $receive_date,
     //      'IsAppove'       =>  1
     //    ); 
             
              //    bank ledger
 // $bankc = array(
 //      'VNo'            =>  $purchase_id,
 //      'Vtype'          =>  'Purchase',
 //      'VDate'          =>  $this->input->post('purchase_date',TRUE),
 //      'COAID'          =>  $bankcoaid,
 //      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
 //      'Debit'          =>  0,
 //      'Credit'         =>  $paid_amount,
 //      'IsPosted'       =>  1,
 //      'CreateBy'       =>  $receive_by,
 //      'CreateDate'     =>  $createdate,
 //      'IsAppove'       =>  1
 //    ); 
 //Bank summary for credit

      // new end


        $this->db->insert('expense_trucking', $data);
        // $this->db->insert('acc_transaction',$coscr);
        // $this->db->insert('acc_transaction',$purchasecoatran);  
        // $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
       
        $this->db->insert('acc_transaction',$supplierdebit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplierdebit); 
        }    
        }       

        $trucking_date = $this->input->post('trucking_date',TRUE);
        $rate = $this->input->post('product_rate',TRUE);
        $quantity = $this->input->post('product_quantity',TRUE);
        $description = $this->input->post('description',TRUE);
        $pro_no =  $this->input->post('pro_no',TRUE);
        $t_price = $this->input->post('total_price',TRUE);
      

        for ($i = 0, $n = count($trucking_date); $i < $n; $i++) {
            $trucking_date = $trucking_date[$i];
            $rate = $rate[$i];
            $product_quantity = $quantity[$i];
            $description = $description[$i];
         
            $total_price = $t_price[$i];
            $pro_no = $pro_no[$i];
          

            $data1 = array(
                'expense_trucking_detail_id' => $this->generator(15),
                'expense_trucking_id'        => $purchase_id,
                'rate'              => $rate,
                'qty'           => $product_quantity,
                'description'               => $description,
                'total'       => $total_price,
                'pro_no_reference'           => $pro_no,
                'create_by'          =>  $this->session->userdata('user_id'),
                'status'             => 1
            );

            if (!empty($quantity)) {
                $this->db->insert('expense_trucking_details', $data1);
            }
        }

        return true;
    }

    //Retrieve purchase Edit Data
    public function retrieve_purchase_editdata($purchase_id) {
        $this->db->select('a.*,
						b.*,
						c.product_id,
						c.product_name,
						c.product_model,
						d.supplier_id,
						d.supplier_name'
        );
        $this->db->from('product_purchase a');
        $this->db->join('product_purchase_details b', 'b.purchase_id =a.purchase_id');
        $this->db->join('product_information c', 'c.product_id =b.product_id');
        $this->db->join('supplier_information d', 'd.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.purchase_id', $purchase_id);
        $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


       //Retrieve purchase order Edit Data
    public function retrieve_purchase_order_editdata($purchase_id) {
        $this->db->select('a.*,
                        b.*,
                        c.product_id,
                        c.product_name,
                        c.product_model,
                        d.supplier_id,
                        d.supplier_name'
        );
        $this->db->from('purchase_order a');
        $this->db->join('purchase_order_details b', 'b.purchase_id =a.purchase_order_id');
        $this->db->join('product_information c', 'c.product_id =b.product_id');
        $this->db->join('supplier_information d', 'd.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.purchase_order_id', $purchase_id);
        $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


       //Retrieve ocean import tracking Edit Data
    public function retrieve_ocean_import_tracking_editdata($purchase_id) {
        return 1;
        $sql = 'SELECT * FROM `ocean_import_tracking` a JOIN supplier_information b WHERE a.supplier_id = b.supplier_id and a.`ocean_import_tracking_id`="20220224105309"';
        $this->db->query($sql);

        // $this->db->select('a.*,b.*');
        // $this->db->from('ocean_import_tracking a');
        // $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        // $this->db->where('a.ocean_import_tracking_id', $purchase_id);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }


        //Retrieve trucking Edit Data
    public function retrieve_trucking_editdata($purchase_id) {
       $this->db->select('a.*,
                        b.*,
                        c.product_id,
                        c.product_name,
                        c.product_model,
                        d.supplier_id,
                        d.supplier_name'
        );
        $this->db->from('expense_trucking a');
        $this->db->join('expense_trucking_details b', 'b.expense_trucking_id =a.trucking_id');
        $this->db->join('product_information c', 'c.product_id =b.product_id');
        $this->db->join('customer_information d', 'd.customer_id = a.bill_to');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.trucking_id', $purchase_id);
       // $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    //Retrieve company Edit Data
    public function retrieve_company() {
        $this->db->select('*');
        $this->db->from('company_information');
        $this->db->limit('1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_purchase() {
          $purchase_id  = $this->input->post('purchase_id',TRUE);
          $paid_amount  = $this->input->post('paid_amount',TRUE);
          $due_amount   = $this->input->post('due_amount',TRUE);
          $bank_id      = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
       $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
    
       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
   }
        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
       $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');




        $data = array(
            'purchase_id'        => $purchase_id,
            'chalan_no'          => $this->input->post('chalan_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'grand_total_amount' => $this->input->post('grand_total_price',TRUE),
            'total_discount'     => $this->input->post('discount',TRUE),
            'purchase_date'      => $this->input->post('purchase_date',TRUE),
            'slabs'      => $this->input->post('slabs',TRUE),
            'purchase_details'   => $this->input->post('purchase_details',TRUE),
            'paid_amount'        => $paid_amount,
            'due_amount'         => $due_amount,
             'bank_id'           =>  $this->input->post('bank_id',TRUE),
            'payment_type'       =>  $this->input->post('paytype',TRUE),
        );
      $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
                  // bank ledger
 $bankc = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

        
         $purchasecoatran = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier -'.$supinfo->supplier_name,
          'Debit'          =>  0,
          'Credit'         =>  $this->input->post('grand_total_price',TRUE),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
          ///Inventory credit
       $coscr = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory Devit Supplier '.$supinfo->supplier_name,
      'Debit'          =>  $this->input->post('grand_total_price',TRUE),
      'Credit'         =>  0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 
          // Expense for company
         $expense = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->input->post('purchase_date',TRUE),
      'COAID'          => 402,
      'Narration'      => 'Company Credit For Supplier'.$supinfo->supplier_name,
      'Debit'          => $this->input->post('grand_total_price',TRUE),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

         $supplier_debit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier . '.$supinfo->supplier_name,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 

        if ($purchase_id != '') {
            $this->db->where('purchase_id', $purchase_id);
            $this->db->update('product_purchase', $data);
            //account transaction update
             $this->db->where('VNo', $purchase_id);
            $this->db->delete('acc_transaction');
        
            //supplier ledger update

            $this->db->where('purchase_id', $purchase_id);
            $this->db->delete('product_purchase_details');
        }

        $this->db->insert('acc_transaction',$coscr);
        $this->db->insert('acc_transaction',$purchasecoatran);  
        $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
        $this->db->insert('acc_transaction',$supplier_debit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplier_debit); 
        }    
        }       

        $rate = $this->input->post('product_rate',TRUE);
        $p_id = $this->input->post('product_id',TRUE);

        $quantity = $this->input->post('product_quantity',TRUE);
        $t_price = $this->input->post('total_price',TRUE);

        $discount = $this->input->post('discount',TRUE);

        $slabs = $this->input->post('slabs',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $slabs = $slabs[$i];

            $disc = $discount[$i];

            $data1 = array(
                'purchase_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'create_by'          =>$this->session->userdata('user_id'),
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'slabs'           => $slabs,
            );


            if (($quantity)) {

                $this->db->insert('product_purchase_details', $data1);
            }
        }
        return true;
    }


 public function update_purchase_order() {
        //print_r($this->input->post()); die;
          $purchase_id  = $this->input->post('purchase_id',TRUE);
          $paid_amount  = $this->input->post('paid_amount',TRUE);
          $due_amount   = $this->input->post('due_amount',TRUE);
          $bank_id      = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
       $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
    
       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
   }
        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
       $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');




        $data = array(
            'purchase_id'        => $purchase_id,
            'chalan_no'          => $this->input->post('chalan_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'grand_total_amount' => $this->input->post('grand_total_price',TRUE),
            'total_discount'     => $this->input->post('discount',TRUE),
            'purchase_date'      => $this->input->post('purchase_date',TRUE),
            'slabs'      => $this->input->post('slabs',TRUE),
            'purchase_details'   => $this->input->post('purchase_details',TRUE),
            'paid_amount'        => $paid_amount,
            'due_amount'         => $due_amount,
             'bank_id'           =>  $this->input->post('bank_id',TRUE),
            'payment_type'       =>  $this->input->post('paytype',TRUE),
        );
      $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
                  // bank ledger
 $bankc = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

        
         $purchasecoatran = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier -'.$supinfo->supplier_name,
          'Debit'          =>  0,
          'Credit'         =>  $this->input->post('grand_total_price',TRUE),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
          ///Inventory credit
       $coscr = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory Devit Supplier '.$supinfo->supplier_name,
      'Debit'          =>  $this->input->post('grand_total_price',TRUE),
      'Credit'         =>  0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 
          // Expense for company
         $expense = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->input->post('purchase_date',TRUE),
      'COAID'          => 402,
      'Narration'      => 'Company Credit For Supplier'.$supinfo->supplier_name,
      'Debit'          => $this->input->post('grand_total_price',TRUE),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

         $supplier_debit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier . '.$supinfo->supplier_name,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 

        if ($purchase_id != '') {
            $this->db->where('purchase_id', $purchase_id);
            $this->db->update('product_purchase', $data);
            //account transaction update
             $this->db->where('VNo', $purchase_id);
            $this->db->delete('acc_transaction');
        
            //supplier ledger update

            $this->db->where('purchase_id', $purchase_id);
            $this->db->delete('product_purchase_details');
        }

        $this->db->insert('acc_transaction',$coscr);
        $this->db->insert('acc_transaction',$purchasecoatran);  
        $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
        $this->db->insert('acc_transaction',$supplier_debit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplier_debit); 
        }    
        }       

        $rate = $this->input->post('product_rate',TRUE);
        $p_id = $this->input->post('product_id',TRUE);

        $quantity = $this->input->post('product_quantity',TRUE);
        $t_price = $this->input->post('total_price',TRUE);

        $discount = $this->input->post('discount',TRUE);

        $slabs = $this->input->post('slabs',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $slabs = $slabs[$i];

            $disc = $discount[$i];

            $data1 = array(
                'purchase_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'create_by'          =>$this->session->userdata('user_id'),
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'slabs'           => $slabs,
            );

            // print_r($data1); die;


            if (($quantity)) {

                $this->db->insert('purchase_order_details', $data1);
            }
        }
        return true;
    }

    // Delete purchase Item

    public function purchase_search_list($cat_id, $company_id) {
        $this->db->select('a.*,b.sub_category_name,c.category_name');
        $this->db->from('purchases a');
        $this->db->join('purchase_sub_category b', 'b.sub_category_id = a.sub_category_id');
        $this->db->join('purchase_category c', 'c.category_id = b.category_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.sister_company_id', $company_id);
        $this->db->where('c.category_id', $cat_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve purchase_details_data
    public function purchase_details_data($purchase_id) {
        $this->db->select('a.*,b.*,c.*,e.purchase_details,d.product_id,d.product_name,d.product_model');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->join('product_purchase_details c', 'c.purchase_id = a.purchase_id');
        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->join('product_purchase e', 'e.purchase_id = c.purchase_id');
        $this->db->where('a.purchase_id', $purchase_id);
        $this->db->group_by('d.product_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


      //Ocean Import Tracking details_data
    public function ocean_import_tracking_details_data($purchase_id) {
        $this->db->select('*');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.ocean_import_tracking_id', $purchase_id);
     
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //This function will check the product & supplier relationship.
    public function product_supplier_check($product_id, $supplier_id) {
        $this->db->select('*');
        $this->db->from('supplier_product');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->where('product_id', $product_id);
        $this->db->where('supplier_id', $supplier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return 0;
    }

    //This function is used to Generate Key
    public function generator($lenth) {
        $number = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "N", "M", "O", "P", "Q", "R", "S", "U", "V", "T", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 61);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }
        return $con;
    }

    public function purchase_delete($purchase_id = null) {
        //Delete product_purchase table
        $this->db->where('VNo', $purchase_id);
        $this->db->delete('acc_transaction');
        //Delete acc transaction
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('product_purchase');
        //Delete product_purchase_details table
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('product_purchase_details');
        return true;
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

//purchase list date to date
    public function purchase_list_date_to_date($start, $end) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->where('a.purchase_date >=', $start);
        $this->db->where('a.purchase_date <=', $end);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
// purchase list for pdf
     public function pdf_purchase_list() {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_date', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // csv upload purchase list
        public function purchase_csv_file() {
         $query = $this->db->select('a.chalan_no,a.purchase_id,b.supplier_name,a.purchase_date,a.grand_total_amount')
                ->from('product_purchase a')
                ->join('supplier_information b', 'b.supplier_id = a.supplier_id', 'left')
                ->where('create_by',$this->session->userdata('user_id'))
                ->order_by('a.purchase_date','desc')
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

}
