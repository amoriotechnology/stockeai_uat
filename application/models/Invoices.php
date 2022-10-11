<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Invoices extends CI_Model {



    public function __construct() {

        parent::__construct();

        $this->load->library('auth');

        $this->load->library('lcustomer');

        $this->load->library('Smsgateway');

        $this->load->library('session');

        $this->load->model('Customers');

        $this->auth->check_admin_auth();

    }



    //Count invoice

    public function count_invoice() {

        //return $this->db->count_all("invoice");
        $this->db->where('sales_by',$this->session->userdata('user_id'));
        $query=$this->db->get('invoice');
        return $query->num_rows();

    } 
       public function commercial_inv_number()
    {
      return  $data = $this->db->select("commercial_invoice_number as voucher")
            ->from('invoice') 
            ->like('commercial_invoice_number', 'NS', 'after')
            ->order_by('ID','desc')
            ->get()
            ->result_array();
           
    }
         public function profarma_voucher_no()
    {
      return  $data = $this->db->select("chalan_no as voucher")
            ->from('profarma_invoice') 
            ->like('chalan_no', 'PI', 'after')
            ->order_by('ID','desc')
            ->get()
            ->result_array();
           
    }

public function fetch_data($day){
    //$fromdate = $this->input->post('prodt',TRUE);
    echo "sad";
    echo $day;
    $split=explode("-",$day);
   // print_r($split);
    die();
      $data = $this->db->select("p_quantity,price")
    ->from('product_information') 
    ->where('product_name', $split[0])
    ->where('product_model',$split[1])
    ->order_by('Time','desc')
    ->get()
    ->result_array();
   
   
}

public function add_profarma_invoice()
{    $purchase_id = date('YmdHis');
 
    $data = array(
               'billing_address'=>$this->input->post('billing_address'),
               'purchase_id' => $purchase_id,
               'purchase_date'=>$this->input->post('purchase_date'),
               'chalan_no'=>$this->input->post('chalan_no'),
               'customer_id'=>$this->input->post('customer_id'),
               'pre_carriage_'=>$this->input->post('pre_carriage_'),
               'receipt'=>$this->input->post('receipt'),
               'country_goods'=>$this->input->post('country_goods'),
               'country_destination'=>$this->input->post('country_destination'),
               'loading'=>$this->input->post('loading'),
               'discharge'=>$this->input->post('discharge'),
               'terms_payment'=>$this->input->post('terms_payment'),
               'description_goods'=>$this->input->post('description_goods'),
               'total'=>$this->input->post('total'),
               'ac_details'=>$this->input->post('ac_details'),
                'sales_by'        => $this->session->userdata('user_id')
            );

        //   $CI->load->model('Invoices');
          //  $this->Invoices->add_profarma_invoice($data);
            $this->db->insert('profarma_invoice', $data);
            $p_id = $this->input->post('product_id');
          
            $quantity = $this->input->post('product_quantity');
            $rate = $this->input->post('product_rate');
            $t_price = $this->input->post('total_price');
            $rowCount = count($this->input->post('product_id',TRUE));
echo $quantity;
            for ($i = 0; $i < $rowCount; $i++) {
   
               $product_quantity = $quantity[$i];
               $product_rate = $rate[$i];
               $product_id = $p_id[$i];
               $total_price = $t_price[$i];
           
   
               $data1 = array(
                   'purchase_detail_id' => $this->generator(15),
                   'purchase_id'        => $purchase_id,
                   'product_id'         => $product_id,
                   'quantity'           => $product_quantity,
                   'rate'               => $product_rate,
                   'total_amount'       => $total_price,
                   'create_by'          =>  $this->session->userdata('user_id'),
                   'status'             => 1
               );
               print_r($data1);
               die();
               $this->db->insert('profarma_invoice_details', $data);
           }         

  
}

public function get_profarma_invoice()
{
$this->db->select('pi.*, ci.customer_name');
$this->db->from('profarma_invoice pi');
$this->db->join('customer_information ci', 'ci.customer_id = pi.customer_id');
$query = $this->db->get()->result();

return $query;
}
public function getcustomer_data($value){
    $this->db->select('*');
    $this->db->from('customer_information');
    $this->db->where('customer_name', $value);
    $query = $this->db->get()->result();
     return $query;

}

public function availability($product_nam,$product_model){
 
    $this->db->select('p_quantity,price');
       $this->db->from('product_information');
     
       $this->db->where('product_name', $product_nam);
       $this->db->where('product_model', $product_model);
   // echo "select 'p_quantity,price' from 'product_information' where product_name='".$product_nam."' and 'product_model'='".$product_model."'";
  //die();
    $query = $this->db->get()->result();
    
    return $query;
}


     public function getInvoiceList($postData=null){

       $this->load->library('occational');

         $response = array();

         $usertype = $this->session->userdata('user_type');

         $fromdate = $this->input->post('fromdate',TRUE);

         $todate   = $this->input->post('todate',TRUE);

         if(!empty($fromdate)){

            $datbetween = "(a.date BETWEEN '$fromdate' AND '$todate')";

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

            $searchQuery = " (b.customer_name like '%".$searchValue."%' or a.invoice like '%".$searchValue."%' or a.date like'%".$searchValue."%' or a.invoice_id like'%".$searchValue."%' or u.first_name like'%".$searchValue."%'or u.last_name like'%".$searchValue."%')";

         }



         ## Total number of records without filtering

         $this->db->select('count(*) as allcount');

         $this->db->from('invoice a');

         $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');

         $this->db->join('users u', 'u.user_id = a.sales_by','left');

         if($usertype == 2){

          $this->db->where('a.sales_by',$this->session->userdata('user_id'));

         }

          if(!empty($fromdate) && !empty($todate)){

             $this->db->where($datbetween);

         }

          if($searchValue != '')

          $this->db->where($searchQuery);

          

         $records = $this->db->get()->result();

         $totalRecords = $records[0]->allcount;



         ## Total number of record with filtering

         $this->db->select('count(*) as allcount');

         $this->db->from('invoice a');

         $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');

         $this->db->join('users u', 'u.user_id = a.sales_by','left');

        if($usertype == 2){

          $this->db->where('a.sales_by',$this->session->userdata('user_id'));

     }

         if(!empty($fromdate) && !empty($todate)){

             $this->db->where($datbetween);

         }

         if($searchValue != '')

            $this->db->where($searchQuery);

          

         $records = $this->db->get()->result();

         $totalRecordwithFilter = $records[0]->allcount;



         ## Fetch records

         $this->db->select("a.*,b.customer_name,u.first_name,u.last_name");

         $this->db->from('invoice a');

         $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');

         $this->db->join('users u', 'u.user_id = a.sales_by','left');

        if($usertype == 2){

          $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        }

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



           $button .='  <a href="'.$base_url.'Cinvoice/invoice_inserted_data/'.$record->invoice_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('invoice').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';



         // $button .='  <a href="'.$base_url.'Cinvoice/min_invoice_inserted_data/'.$record->invoice_id.'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('mini_invoice').'"><i class="fa fa-fax" aria-hidden="true"></i></a>';



         // $button .='  <a href="'.$base_url.'Cinvoice/pos_invoice_inserted_data/'.$record->invoice_id.'" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('pos_invoice').'"><i class="fa fa-fax" aria-hidden="true"></i></a>';

          // $button .='  <a href="'.$base_url.'Cinvoice/invoicdetails_download/'.$record->invoice_id.'" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('download').'"><i class="fa fa-download"></i></a>';



      if($_SESSION['sale_update']==1)
          {

         $button .=' <a href="'.$base_url.'Cinvoice/invoice_update_form/'.$record->invoice_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';

     }



       



          $details ='  <a href="'.$base_url.'Cinvoice/invoice_inserted_data/'.$record->invoice_id.'" class="" >'.$record->invoice.'</a>';

               

            $data[] = array( 

                'sl'               =>$sl,

                'invoice'          =>$details,

                'salesman'         =>$record->first_name.' '.$record->last_name,

                'customer_name'    =>$record->customer_name,

                'final_date'       =>$this->occational->dateConvert($record->date),

                'total_amount'     =>$record->total_amount,

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

       //Ocean Import Tracking details_data
    public function ocean_export_tracking_details_data($purchase_id) {
        $this->db->select('*');
        $this->db->from('ocean_export_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.ocean_export_tracking_id', $purchase_id);
     
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }



         public function update_ocean_export() {
        //print_r($this->input->post()); die;
        $purchase_id  = $this->input->post('ocean_export_tracking_id',TRUE);
        
  
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');



         $data = array(

        

            'ocean_export_tracking_id'   => $purchase_id,

            'booking_no'     => $this->input->post('booking_no',TRUE),

            'supplier_id'   => $this->input->post('supplier_id',TRUE),

            'container_no' => $this->input->post('container_no',TRUE),

            'seal_no'   => $this->input->post('seal_no',TRUE),

            'etd'   => $this->input->post('etd',TRUE),

            'eta'   => $this->input->post('eta',TRUE),

            'shipper' => $this->input->post('shipper',TRUE),

            'invoice_date' => $this->input->post('invoice_date',TRUE),

            'consignee' => $this->input->post('consignee',TRUE),

            'notify_party' => $this->input->post('notify_party',TRUE),

            'vessel' =>  $this->input->post('vessel',TRUE),

            'voyage_no' => $this->input->post('voyage_no',TRUE),

            'port_of_loading' =>  $this->input->post('port_of_loading',TRUE),

            'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),

            'place_of_delivery' => $this->input->post('place_of_delivery',TRUE),

            'freight_forwarder'  => $this->input->post('freight_forwarder',TRUE),

            'particular' => $this->input->post('particulars',TRUE),

            'status'  => 1,

        );

  



      
        if ($purchase_id != '') {
            $this->db->where('ocean_export_tracking_id', $purchase_id);
            $this->db->update('ocean_export_tracking', $data);
            //account transaction update
     
        }

        return true;
    }


    public function getProfarmaInvoiceList($postData=null){

        $this->load->library('occational');
 
          $response = array();
 
          $usertype = $this->session->userdata('user_type');
 
          $fromdate = $this->input->post('fromdate',TRUE);
 
          $todate   = $this->input->post('todate',TRUE);
 
          if(!empty($fromdate)){
 
             $datbetween = "(a.date BETWEEN '$fromdate' AND '$todate')";
 
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
 
             $searchQuery = " (b.customer_name like '%".$searchValue."%' or a.invoice like '%".$searchValue."%' or a.date like'%".$searchValue."%' or a.invoice_id like'%".$searchValue."%' or u.first_name like'%".$searchValue."%'or u.last_name like'%".$searchValue."%')";
 
          }
 
 
 
          ## Total number of records without filtering
 
          $this->db->select('count(*) as allcount');
 
          $this->db->from('profarma_invoice a');
 
          $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
 
          $this->db->join('users u', 'u.user_id = a.sales_by','left');
 
          if($usertype == 2){
 
           $this->db->where('a.sales_by',$this->session->userdata('user_id'));
 
          }
 
           if(!empty($fromdate) && !empty($todate)){
 
              $this->db->where($datbetween);
 
          }
 
           if($searchValue != '')
 
           $this->db->where($searchQuery);
 
           

          $records = $this->db->get()->result();
 
          $totalRecords = $records[0]->allcount;
 
 
 
          ## Total number of record with filtering
 
          $this->db->select('count(*) as allcount');
 
          $this->db->from('profarma_invoice a');
 
          $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
 
      //     $this->db->join('users u', 'u.user_id = a.sales_by','left');
 
          if($usertype == 2){
 
           $this->db->where('a.sales_by',$this->session->userdata('user_id'));
 
         }
 
          if(!empty($fromdate) && !empty($todate)){
 
              $this->db->where($datbetween);
 
          }
 
          if($searchValue != '')
 
             $this->db->where($searchQuery);
 
           
 
          $records = $this->db->get()->result();
 
          $totalRecordwithFilter = $records[0]->allcount;
 
 
 
          ## Fetch records
 
          $this->db->select("a.*,b.customer_name,u.first_name,u.last_name");
 
          $this->db->from('profarma_invoice a');

          $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
 
          $this->db->join('users u', 'u.user_id = a.sales_by','left');
 
         if($usertype == 2){
 
          $this->db->where('a.sales_by',$this->session->userdata('user_id'));
 
         }
 
           if(!empty($fromdate) && !empty($todate)){
 
              $this->db->where($datbetween);
 
          }
 
          if($searchValue != '')
 
          $this->db->where($searchQuery);
 
        
 
        //   $this->db->order_by($columnName, $columnSortOrder);
 
        //   $this->db->limit($rowperpage, $start);

          $records = $this->db->get()->result();

          
        //   $response = array(
 
        //     "draw" => intval($draw),

        //     "iTotalRecords" => $totalRecordwithFilter,

        //     "iTotalDisplayRecords" => $totalRecords,

        //     "aaData" => $records

        //  );

        //  return $response; 



          
          $data = array();
 
          $sl =1;
 
   
 
          foreach($records as $record ){
 
           $button = '';
 
           $base_url = base_url();
 
           $jsaction = "return confirm('Are You Sure ?')";
 
 
 
            $button .='  <a href="'.$base_url.'Cinvoice/profarma_invoice_inserted_data/'.$record->purchase_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('invoice').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
 
 
 
          $button .='  <a href="'.$base_url.'Cinvoice/min_invoice_inserted_data/'.$record->purchase_id.'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('mini_invoice').'"><i class="fa fa-fax" aria-hidden="true"></i></a>';
 
 
 
          $button .='  <a href="'.$base_url.'Cinvoice/pos_invoice_inserted_data/'.$record->purchase_id.'" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('pos_invoice').'"><i class="fa fa-fax" aria-hidden="true"></i></a>';
 
           // $button .='  <a href="'.$base_url.'Cinvoice/invoicdetails_download/'.$record->invoice_id.'" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('download').'"><i class="fa fa-download"></i></a>';
 
 
 
       if($_SESSION['sale_update']==1)
       {
 
          $button .=' <a href="'.$base_url.'Cinvoice/profarma_invoice_update_form/'.$record->purchase_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
 
      }
 
 
 
        
 
 
 
           $details ='  <a href="'.$base_url.'Cinvoice/profarma_invoice_inserted_data/'.$record->purchase_id.'" class="" >'.$record->purchase_id.'</a>';
 
                
 
             $data[] = array( 
 
                 'sl'               =>$sl,
 
                 'invoice'          =>$details,
 
                 'salesman'         =>$record->first_name.' '.$record->last_name,
 
                 'customer_name'    =>$record->customer_name,
 
                 'final_date'       =>$this->occational->dateConvert($record->purchase_date),
 
                 'currency'     =>'$',

                 'total_amount'     =>$record->total,
 
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


       public function getOceanExportList($postData=null){
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
        $this->db->from('ocean_export_tracking a');
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
        $this->db->from('ocean_export_tracking a');
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
        $this->db->from('ocean_export_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
         $this->db->where($searchQuery);
       
         // $this->db->order_by($columnName, $columnSortOrder);
         // $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
         foreach($records as $record ){
          $button = '';
          $base_url = base_url();
          $jsaction = "return confirm('Are You Sure ?')";

           $button .='  <a href="'.$base_url.'Cinvoice/ocean_export_tracking_details_data/'.$record->ocean_export_tracking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
 if($_SESSION['sale_update']==1)
          {
         $button .=' <a href="'.$base_url.'Cinvoice/ocean_export_tracking_update_form/'.$record->ocean_export_tracking_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Cinvoice/ocean_export_tracking_update_form/'.$record->ocean_export_tracking_id.'">'.$record->ocean_export_tracking_id.'</a>';
               
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
        $this->db->from('sale_trucking a');
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
        $this->db->from('sale_trucking a');
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
          $this->db->from('sale_trucking a');
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

           $button .='  <a href="'.$base_url.'Cinvoice/trucking_details_data/'.$record->trucking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
       if($_SESSION['sale_update']==1)
          {
         $button .=' <a href="'.$base_url.'Cinvoice/trucking_update_form/'.$record->trucking_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Cinvoice/trucking_update_form/'.$record->trucking_id.'">'.$record->trucking_id.'</a>';
               
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



        //Retrieve trucking Edit Data
    public function retrieve_trucking_editdata($purchase_id) {

       $this->db->select('a.*,
                        b.*,
                        d.customer_id,
                        d.customer_name'
        );
        $this->db->from('sale_trucking a');
        $this->db->join('sale_trucking_details b', 'b.sale_trucking_id =a.trucking_id');
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







    //Count todays_sales_report

    public function todays_sales_report() {

        $today = date('Y-m-d');

        $this->db->select('a.*,b.customer_name, b.customer_id, a.invoice_id,a.invoice');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.date', $today);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->order_by('a.invoice', 'desc');

        $query = $this->db->get()->result();

        return $query;

    }



//    ======= its for  best_sales_products ===========

    public function best_sales_products() {

        $this->db->select('b.product_id, b.product_name, sum(a.quantity) as quantity');

        $this->db->from('invoice_details a');

        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->group_by('b.product_id');

        $this->db->order_by('quantity', 'desc');

        $query = $this->db->get();

        return $query->result();

    }



//    ======= its for  best_sales_products ===========

    public function best_saler_product_list() {

        $this->db->select('b.product_id, b.product_name, sum(a.quantity) as quantity');

        $this->db->from('invoice_details a');

        $this->db->join('product_information b', 'b.product_id = a.product_id');

        $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->group_by('b.product_id');

        $this->db->order_by('quantity', 'desc');

        $query = $this->db->get();

        return $query->result();

    }



//    ======= its for  todays_customer_receipt ===========

    public function todays_customer_receipt($today = null) {

         $this->db->select('a.*,b.HeadName,c.customer_name');

        $this->db->from('acc_transaction a');

        $this->db->join('acc_coa b','a.COAID=b.HeadCode');

         $this->db->join('customer_information c','b.customer_id=c.customer_id');
         $this->db->where('c.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.Credit >',0);

        $this->db->where('DATE(a.VDate)',$today);

        $this->db->where('a.IsAppove',1);

        $query = $this->db->get();

        return $query->result();

    }



//    ======= its for  todays_customer_receipt ===========

    public function filter_customer_wise_receipt($custome_id = null, $from_date = null) {

        $this->db->select('a.*,b.HeadName');

        $this->db->from('acc_transaction a');

        $this->db->join('acc_coa b','a.COAID=b.HeadCode');

        $this->db->where('b.customer_id',$custome_id);

        $this->db->where('a.Credit >',0);

        $this->db->where('DATE(a.VDate)',$from_date);

        $this->db->where('a.IsAppove',1);

        $query = $this->db->get();

        return $query->result();







    }



    //invoice List

    public function invoice_list($perpage, $page) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->order_by('a.invoice', 'desc');

        $this->db->limit($perpage, $page);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    public function todays_invoice(){

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('a.date',date('Y-m-d'));

        $this->db->order_by('a.invoice', 'desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }

    // pdf list

      public function invoice_list_pdf() {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.invoice', 'desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }

 

 public function user_invoice_data($user_id){

   return  $this->db->select('*')->from('users')->where('user_id',$user_id)->get()->row();

 }

    // search invoice by customer id

    public function invoice_search($customer_id, $per_page, $page) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('a.customer_id', $customer_id);

        $this->db->order_by('a.invoice', 'desc');

        $this->db->limit($per_page, $page);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // invoice search by invoice id

    public function invoice_list_invoice_id($invoice_no) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('invoice', $invoice_no);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // date to date invoice list

    public function invoice_list_date_to_date($from_date, $to_date, $perpage, $page) {

        $dateRange = "a.date BETWEEN '$from_date' AND '$to_date'";

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where($dateRange, NULL, FALSE);

        $this->db->order_by('a.invoice', 'desc');

        $this->db->limit($perpage, $page);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // Invoiec list date to date 

    public function invoice_list_date_to_date_count($from_date, $to_date) {

        $dateRange = "a.date BETWEEN '$from_date%' AND '$to_date%'";

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where($dateRange, NULL, FALSE);

        $this->db->order_by('a.invoice', 'desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->num_rows();

        }

        return false;

    }



    //invoice List

    public function invoice_list_count() {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->order_by('a.invoice', 'desc');

        $this->db->limit('500');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->num_rows();

        }

        return false;

    }



// count invoice search by customer

    public function invoice_search_count($customer_id) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('a.customer_id', $customer_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->num_rows();

        }

        return false;

    }



    //invoice Search Item

    public function search_inovoice_item($customer_id) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('b.customer_id', $customer_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    //POS invoice entry

    public function pos_invoice_setup($product_id) {

        $product_information = $this->db->select('*')

                ->from('product_information')

                ->join('supplier_product', 'product_information.product_id = supplier_product.product_id')
                ->where('product_information.created_by',$this->session->userdata('user_id'))

                ->where('product_information.product_id', $product_id)

                ->get()

                ->row();



        if ($product_information != null) {



            $this->db->select('SUM(a.quantity) as total_purchase');

            $this->db->from('product_purchase_details a');

            $this->db->where('a.product_id', $product_id);

            $total_purchase = $this->db->get()->row();



            $this->db->select('SUM(b.quantity) as total_sale');

            $this->db->from('invoice_details b');

            $this->db->where('b.product_id', $product_id);

            $total_sale = $this->db->get()->row();



            $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);

          

          $data2 = (object) array(

                        'total_product'  => $available_quantity,

                        'supplier_price' => $product_information->supplier_price,

                        'price'          => $product_information->price,

                        'supplier_id'    => $product_information->supplier_id,

                        'product_id'     => $product_information->product_id,

                        'product_name'   => $product_information->product_name,

                        'product_model'  => $product_information->product_model,

                        'unit'           => $product_information->unit,

                        'tax'            => $product_information->tax,

                        'image'          => $product_information->image,

                        'serial_no'      => $product_information->serial_no,

            );



        



            return $data2;

        } else {

            return false;

        }

    }



    //POS customer setup

    public function pos_customer_setup() {

        $query = $this->db->select('*')

                ->from('customer_information')
                ->where('create_by',$this->session->userdata('user_id'))
                ->where('customer_name', 'Walking Customer')

                ->get();

        if ($query->num_rows() > 0) {
          //  print_r($query->result_array());
            return $query->result_array();

        }

        return false;

    }



    //Count invoice

    public function invoice_entry() {

        $this->load->model('Web_settings');

        $tablecolumn = $this->db->list_fields('tax_collection');

        $num_column = count($tablecolumn)-4;

        $invoice_id = $this->generator(10);

        $invoice_id = strtoupper($invoice_id);

        $createby=$this->session->userdata('user_id');

        $createdate=date('Y-m-d H:i:s');

        $quantity = $this->input->post('product_quantity',TRUE);

        $invoice_no_generated = $this->number_generator();

       

        $changeamount = $this->input->post('change',TRUE);

        if($changeamount > 0){

           $paidamount = $this->input->post('n_total',TRUE);



        }else{

             $paidamount = $this->input->post('paid_amount',TRUE);

        }



     $bank_id = $this->input->post('bank_id',TRUE);

        if(!empty($bank_id)){

       $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;

    

       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;

   }else{

    $bankcoaid='';

   }



        $available_quantity = $this->input->post('available_quantity',TRUE);

        $currency_details = $this->Web_settings->retrieve_setting_editdata();

       

        $result = array();

        foreach ($available_quantity as $k => $v) {

            if ($v < $quantity[$k]) {

                $this->session->set_userdata(array('error_message' => display('you_can_not_buy_greater_than_available_qnty')));

                redirect('Cinvoice');

            }

        }





        $product_id = $this->input->post('product_id',TRUE);

        if ($product_id == null) {

          //  $this->session->set_userdata(array('error_message' => display('please_select_product')));

           // redirect('Cinvoice/pos_invoice');

        }



        if (($this->input->post('customer_name_others',TRUE) == null) && ($this->input->post('customer_id') == null ) && ($this->input->post('customer_name',TRUE) == null )) {

            $this->session->set_userdata(array('error_message' => display('please_select_customer')));

            redirect(base_url() . 'Cinvoice');

        }





        if (($this->input->post('customer_id') == null ) && ($this->input->post('customer_name') == null )) {

            

            $data = array(

                'create_by'    =>$this->session->userdata('user_id'),
            'customer_name'    => $this->input->post('customer_name_others',TRUE),

            'customer_address' => $this->input->post('customer_name_others_address',TRUE),

            'customer_mobile'  => $this->input->post('customer_mobile',TRUE),

            'customer_email'   => "",

            'status'           => 2

            );



        



            $this->db->insert('customer_information', $data);

            $customer_id = $this->db->insert_id();

             $coa = $this->headcode();

           if($coa->HeadCode!=NULL){

                $headcode=$coa->HeadCode+1;

           }else{

                $headcode="102030000001";

            }

             $c_acc=$customer_id.'-'.$this->input->post('customer_name_others',TRUE);

            $createby=$this->session->userdata('user_id');

            $createdate=date('Y-m-d H:i:s');

           $customer_coa = [

             'HeadCode'         => $headcode,

             'HeadName'         => $c_acc,

             'PHeadName'        => 'Customer Receivable',

             'HeadLevel'        => '4',

             'IsActive'         => '1',

             'IsTransaction'    => '1',

             'IsGL'             => '0',

             'HeadType'         => 'A',

             'IsBudget'         => '0',

             'IsDepreciation'   => '0',

             'DepreciationRate' => '0',

             'CreateBy'         => $createby,

             'CreateDate'       => $createdate,

        ];

            $this->db->insert('acc_coa',$customer_coa);

            $this->db->select('*');

            $this->db->from('customer_information');
            $this->db->where('create_by',$this->session->userdata('user_id'));
            $query = $this->db->get();

            foreach ($query->result() as $row) {

                $json_customer[] = array('label' => $row->customer_name, 'value' => $row->customer_id);

            }

            $cache_file = './my-assets/js/admin_js/json/customer.json';

            $customerList = json_encode($json_customer);

            file_put_contents($cache_file, $customerList);





            //Previous balance adding -> Sending to customer model to adjust the data.

            $this->Customers->previous_balance_add(0, $customer_id);

        } else {

            $customer_id = $this->input->post('customer_id',TRUE);

        }





        //Full or partial Payment record.

        $paid_amount = $this->input->post('paid_amount',TRUE);

        if ($this->input->post('paid_amount',TRUE) >= 0) {



            $this->db->set('status', '1');

            $this->db->where('customer_id', $customer_id);



            $this->db->update('customer_information');

               }

            $transection_id = $this->auth->generator(15);





             for($j=0;$j<$num_column;$j++){

                $taxfield = 'tax'.$j;

                $taxvalue = 'total_tax'.$j;

              $taxdata[$taxfield]=$this->input->post($taxvalue);

            }

            $taxdata['customer_id'] = $customer_id;

            $taxdata['date']        = (!empty($this->input->post('invoice_date',TRUE))?$this->input->post('invoice_date',TRUE):date('Y-m-d'));

            $taxdata['relation_id'] = $invoice_id;

            $this->db->insert('tax_collection',$taxdata);



            // Inserting for Accounts adjustment.

            ############ default table :: customer_payment :: inflow_92mizdldrv #################

     



        //Data inserting into invoice table

        $datainv = array(

            'invoice_id'      => $invoice_id,

            'customer_id'     => $customer_id,

            'date'            => (!empty($this->input->post('invoice_date',TRUE))?$this->input->post('invoice_date',TRUE):date('Y-m-d')),

            'commercial_invoice_number' => $this->input->post('commercial_invoice_number',TRUE),

            'billing_address' => $this->input->post('billing_address',TRUE),

            'container_no' => $this->input->post('container_number',TRUE),

            'bl_no' => $this->input->post('bl_no',TRUE),

            'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),

            'total_amount'    => $this->input->post('grand_total_price',TRUE),

            'total_tax'       => $this->input->post('total_tax',TRUE),

            'invoice'         => $invoice_no_generated,

            'invoice_details' => (!empty($this->input->post('inva_details',TRUE))?$this->input->post('inva_details',TRUE):'Thank you for shopping with us'),

            'invoice_discount'=> $this->input->post('invoice_discount',TRUE),

            'total_discount'  => $this->input->post('total_discount',TRUE),

            'paid_amount'     => $this->input->post('paid_amount',TRUE),

            'due_amount'      => $this->input->post('due_amount',TRUE),

            'prevous_due'     => $this->input->post('previous',TRUE),

            'shipping_cost'   => $this->input->post('shipping_cost',TRUE),

            'sales_by'        => $this->session->userdata('user_id'),

            'status'          => 1,

            'payment_type'    =>  $this->input->post('paytype',TRUE),

            'bank_id'         =>  (!empty($this->input->post('bank_id',TRUE))?$this->input->post('bank_id',TRUE):null),

            'payment_terms'    => $this->input->post('payment_terms',TRUE),

             'number_of_days'    => $this->input->post('number_of_days',TRUE),

             'payment_due_date'  => $this->input->post('payment_due_date',TRUE),

        );

    print_r($datainv);

        $this->db->insert('invoice', $datainv);

        $prinfo  = $this->db->select('product_id,Avg(rate) as product_rate')->from('product_purchase_details')->where_in('product_id',$product_id)->group_by('product_id')->get()->result(); 

    $purchase_ave = [];

    $i=0;

    foreach ($prinfo as $avg) {

      $purchase_ave [] =  $avg->product_rate*$quantity[$i];

      $i++;

    }

   $sumval = array_sum($purchase_ave);



   $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id',$customer_id)->get()->row();

    $headn = $customer_id.'-'.$cusifo->customer_name;

    $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();

    $customer_headcode = $coainfo->HeadCode;

// Cash in Hand debit

      $cc = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  1020101,

      'Narration'      =>  'Cash in Hand in Sale for Invoice No - '.$invoice_no_generated.' customer- '.$cusifo->customer_name,

      'Debit'          =>  $paidamount,

      'Credit'         =>  0,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $createby,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 

     

     // bank ledger

 $bankc = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INVOICE',

      'VDate'          =>  $createdate,

      'COAID'          =>  $bankcoaid,

      'Narration'      =>  'Paid amount for customer  Invoice No - '.$invoice_no_generated.' customer -'.$cusifo->customer_name,

      'Debit'          =>  $paidamount,

      'Credit'         =>  0,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $createby,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 



       ///Inventory credit

       $coscr = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  10107,

      'Narration'      =>  'Inventory credit For Invoice No'.$invoice_no_generated,

      'Debit'          =>  0,

      'Credit'         =>  $sumval,//purchase price asbe

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$coscr);

       

    // Customer Transactions

    //Customer debit for Product Value

    $cosdr = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  $customer_headcode,

      'Narration'      =>  'Customer debit For Invoice No -  '.$invoice_no_generated.' Customer '.$cusifo->customer_name,

      'Debit'          =>  $this->input->post('n_total',TRUE)-(!empty($this->input->post('previous',TRUE))?$this->input->post('previous',TRUE):0),

      'Credit'         =>  0,

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$cosdr);



         $pro_sale_income = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INVOICE',

      'VDate'          =>  $createdate,

      'COAID'          =>  303,

      'Narration'      =>  'Sale Income For Invoice NO - '.$invoice_no_generated.' Customer '.$cusifo->customer_name,

      'Debit'          =>  0,

      'Credit'         =>  $this->input->post('n_total',TRUE)-(!empty($this->input->post('previous',TRUE))?$this->input->post('previous',TRUE):0),

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$pro_sale_income);



       ///Customer credit for Paid Amount

       $cuscredit = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  $customer_headcode,

      'Narration'      =>  'Customer credit for Paid Amount For Customer Invoice NO- '.$invoice_no_generated.' Customer- '.$cusifo->customer_name,

      'Debit'          =>  0,

      'Credit'         =>  $paidamount,

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       if(!empty($this->input->post('paid_amount',TRUE))){

            $this->db->insert('acc_transaction',$cuscredit);

          

        if($this->input->post('paytype',TRUE) == 2){

        $this->db->insert('acc_transaction',$bankc);

        

        }

            if($this->input->post('paytype',TRUE) == 1){

        $this->db->insert('acc_transaction',$cc);

        }

       

  }

     $customerinfo = $this->db->select('*')->from('customer_information')->where('customer_id',$customer_id)->get()->row();



        $rate                = $this->input->post('product_rate',TRUE);

        $p_id                = $this->input->post('product_id',TRUE);

        $total_amount        = $this->input->post('total_price',TRUE);

        $discount_rate       = $this->input->post('discount_amount',TRUE);

        $discount_per        = $this->input->post('discount',TRUE);

        $tax_amount          = $this->input->post('tax',TRUE);

        $invoice_description = $this->input->post('desc',TRUE);

        $serial_n            = $this->input->post('serial_no',TRUE);



        for ($i = 0, $n = count($p_id); $i < $n; $i++) {

            $product_quantity = $quantity[$i];

            $product_rate = $rate[$i];

            $product_id = $p_id[$i];

            $serial_no  = (!empty($serial_n[$i])?$serial_n[$i]:null);

            $total_price = $total_amount[$i];

            $supplier_rate = $this->supplier_price($product_id);

            // $disper = $discount_per[$i];

            $disper = 0;

            $discount = is_numeric($product_quantity) * is_numeric($product_rate) * is_numeric($disper) / 100;

            // $tax = $tax_amount[$i];
            $tax =0;

            $description = $invoice_description[$i];

           

            $data1 = array(

                'invoice_details_id' => $this->generator(15),

                'invoice_id'         => $invoice_id,

                'product_id'         => $product_id,

                'serial_no'          => $serial_no,

                'quantity'           => $product_quantity,

                'rate'               => $product_rate,

                'discount'           => $discount,

                'description'        => $description,

                'discount_per'       => $disper,

                'tax'                => $tax,

                'paid_amount'        => $paidamount,

                'due_amount'         => $this->input->post('due_amount',TRUE),

                'supplier_rate'      => $supplier_rate,

                'total_price'        => $total_price,

                'status'             => 1

            );

            if (!empty($quantity)) {

                $this->db->insert('invoice_details', $data1);

            }

        }

        $message = 'Mr.'.$customerinfo->customer_name.',

        '.'You have purchase  '.$this->input->post('grand_total_price',TRUE).' '. $currency_details[0]['currency'].' You have paid .'.$this->input->post('paid_amount',TRUE).' '. $currency_details[0]['currency'];

       



   $config_data = $this->db->select('*')->from('sms_settings')->get()->row();

        if($config_data->isinvoice == 1){

          $this->smsgateway->send([

            'apiProvider' => 'nexmo',

            'username'    => $config_data->api_key,

            'password'    => $config_data->api_secret,

            'from'        => $config_data->from,

            'to'          => $customerinfo->customer_mobile,

            'message'     => $message

        ]);

      }

    

        return $invoice_id;

    }


    private function stripHTMLtags($str)
    {
        $t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
        $t = htmlentities($t, ENT_QUOTES, "UTF-8");
        return $t;
    }




         //Ocean Import Entry
    public function ocean_export_entry() {

        $purchase_id = date('YmdHis');
        $fomdata=$this->input->post();
   $data = array(
            'ocean_export_tracking_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'shipper' => $fomdata['supplier_id'],
            'container_no' =>$fomdata['container_no'],
            'seal_no'      =>$fomdata['seal_no'],
            'etd'   => $fomdata['delivery_date'],
            'eta'   => $fomdata['arrival'],
            'invoice_date' => $fomdata['invoice_date'],
            'consignee' =>$fomdata['consignee'],
            'notify_party' => $fomdata['etd'],
            'vessel' => $fomdata['vessel'],
            'voyage_no' =>$fomdata['voyage_no'],
            'port_of_loading' => $fomdata['port_of_loading'],
            'port_of_discharge' => $fomdata['port_of_discharge'],
            'place_of_delivery' =>$fomdata['place_of_delivery'],
            'freight_forwarder' =>$fomdata['freight_forwarder'],
            'particular'   =>$fomdata['particular'],
            'booking_no'          => $fomdata['booking_no'],
            'supplier_id'        => $fomdata['supplier_id'],
            'status'             => 1,
          
        );
       


          $query= $this->db->insert('ocean_export_tracking', $data);
  

        return true;
    }




    //Get Supplier rate of a product

    public function supplier_rate($product_id) {

        $this->db->select('supplier_price');

        $this->db->from('supplier_product');

        $this->db->where(array('product_id' => $product_id));
        $this->db->where('created_by',$this->session->userdata('user_id'));

        $query = $this->db->get();

        return $query->result_array();



        $this->db->select('Avg(rate) as supplier_price');

        $this->db->from('product_purchase_details');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $this->db->where(array('product_id' => $product_id));

        $query = $this->db->get()->row();

        return $query->result_array();

    }



     public function supplier_price($product_id) {

        $this->db->select('supplier_price');

        $this->db->from('supplier_product');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->where(array('product_id' => $product_id));

        $supplier_product = $this->db->get()->row();

   



        $this->db->select('Avg(rate) as supplier_price');

        $this->db->from('product_purchase_details');

        $this->db->where('create_by',$this->session->userdata('user_id'));

        $this->db->where(array('product_id' => $product_id));

        $purchasedetails = $this->db->get()->row();

      $price = (!empty($purchasedetails->supplier_price)?$purchasedetails->supplier_price:$supplier_product->supplier_price);

 

        return (!empty($price)?$price:0);

    }





    //Retrieve invoice Edit Data

    public function retrieve_invoice_editdata($invoice_id) {

        $this->db->select('a.*, sum(c.quantity) as sum_quantity, a.total_tax as taxs,a. prevous_due,b.customer_name,c.*,c.tax as total_tax,c.product_id,d.product_name,d.product_model,d.tax,d.unit,d.*');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->join('invoice_details c', 'c.invoice_id = a.invoice_id');

        $this->db->join('product_information d', 'd.product_id = c.product_id');

        $this->db->where('a.invoice_id', $invoice_id);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->group_by('d.product_id');



        $query = $this->db->get();



        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }

    public function retrieve_profarma_invoice_editdata($invoice_id) {

        $this->db->select('a.*, sum(c.quantity) as sum_quantity,b.customer_name,c.*,c.product_id,d.product_name,d.product_model,d.tax,d.unit,d.*');

        $this->db->from('profarma_invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->join('profarma_invoice_details c', 'c.purchase_id = a.purchase_id');

        $this->db->join('product_information d', 'd.product_id = c.product_id');

        $this->db->where('a.purchase_id', $invoice_id);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->group_by('d.product_id');



        $query = $this->db->get();


 // $sql = $this->db->last_query();

 // print_r($sql);
 // die();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }


    //update_invoice

    public function update_invoice() {

        $tablecolumn = $this->db->list_fields('tax_collection');

        $num_column  = count($tablecolumn)-4;

        $invoice_id  = $this->input->post('invoice_id',TRUE);



        $invoice_no  = $this->input->post('invoice',TRUE);

        $createby    = $this->session->userdata('user_id');

        $createdate  = date('Y-m-d H:i:s');

        $customer_id = $this->input->post('customer_id',TRUE);

        $quantity    = $this->input->post('product_quantity',TRUE);

        $product_id  = $this->input->post('product_id',TRUE);



       $changeamount = $this->input->post('change',TRUE);

        if($changeamount > 0){

        $paidamount = $this->input->post('n_total',TRUE);



        }else{

        $paidamount = $this->input->post('paid_amount',TRUE);

        }





   $bank_id = $this->input->post('bank_id',TRUE);

        if(!empty($bank_id)){

       $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;

    

       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;

   }else{

    $bankcoaid='';

   }

   

             $transection_id = $this->auth->generator(15);





            $this->db->where('VNo', $invoice_id);

            $this->db->delete('acc_transaction');

            $this->db->where('relation_id', $invoice_id);

            $this->db->delete('tax_collection');

      

        $data = array(

            'invoice_id'      => $invoice_id,

            'customer_id'     => $this->input->post('customer_id',TRUE),

            'date'            => $this->input->post('invoice_date',TRUE),

              'commercial_invoice_number' => $this->input->post('commercial_invoice_number',TRUE),

            'billing_address' => $this->input->post('billing_address',TRUE),

            'container_no' => $this->input->post('container_number',TRUE),

            'bl_no' => $this->input->post('bl_no',TRUE),

            'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),

            'total_amount'    => $this->input->post('grand_total_price',TRUE),

            'total_tax'       => $this->input->post('total_tax',TRUE),

            'invoice_details' => $this->input->post('inva_details',TRUE),

            'due_amount'      => $this->input->post('due_amount',TRUE),

            'paid_amount'     => $this->input->post('paid_amount',TRUE),

            'invoice_discount'=> $this->input->post('invoice_discount',TRUE),

            'total_discount'  => $this->input->post('total_discount',TRUE),

            'prevous_due'     => $this->input->post('previous',TRUE),

            'shipping_cost'   => $this->input->post('shipping_cost',TRUE),

            'payment_type'    =>  $this->input->post('paytype',TRUE),

            'bank_id'         =>  (!empty($this->input->post('bank_id',TRUE))?$this->input->post('bank_id',TRUE):null),

        );

   

      



     

        $prinfo  = $this->db->select('product_id,Avg(rate) as product_rate')->from('product_purchase_details')->where_in('product_id',$product_id)->group_by('product_id')->get()->result(); 

    $purchase_ave = [];

    $i=0;

    foreach ($prinfo as $avg) {

      $purchase_ave [] =  $avg->product_rate*$quantity[$i];

      $i++;

    }

   $sumval = array_sum($purchase_ave);



   $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id',$customer_id)->get()->row();

    $headn = $customer_id.'-'.$cusifo->customer_name;

    $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();

    $customer_headcode = $coainfo->HeadCode;

// Cash in Hand debit

      $cc = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  1020101,

      'Narration'      =>  'Cash in Hand for sale for Invoice No -'.$invoice_no.' Customer '.$cusifo->customer_name,

      'Debit'          =>  $paidamount,

      'Credit'         =>  0,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $createby,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 

     



       ///Inventory credit

       $coscr = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  10107,

      'Narration'      =>  'Inventory credit For Invoice No'.$invoice_no,

      'Debit'          =>  0,

      'Credit'         =>  $sumval,//purchase price asbe

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$coscr);

       

        // bank ledger

 $bankc = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INVOICE',

      'VDate'          =>  $createdate,

      'COAID'          =>  $bankcoaid,

      'Narration'      =>  'Paid amount for  Invoice NO- '.$invoice_no.' customer '.$cusifo->customer_name,

      'Debit'          =>  $paidamount,

      'Credit'         =>  0,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $createby,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 



/// Sale income

   $pro_sale_income = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INVOICE',

      'VDate'          =>  $createdate,

      'COAID'          =>  303,

      'Narration'      =>  'Sale Income From Invoice NO - '.$invoice_no.' Customer '.$cusifo->customer_name,

      'Debit'          =>  0,

      'Credit'         =>  $this->input->post('n_total',TRUE)-(!empty($this->input->post('previous',TRUE))?$this->input->post('previous',TRUE):0),

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$pro_sale_income);

    //Customer debit for Product Value

    $cosdr = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  $customer_headcode,

      'Narration'      =>  'Customer debit For Invoice NO - '.$invoice_no.' customer-  '.$cusifo->customer_name,

      'Debit'          =>  $this->input->post('grand_total_price',TRUE),

      'Credit'         =>  0,

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$cosdr);



       ///Customer credit for Paid Amount

       $customer_credit = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  $customer_headcode,

      'Narration'      =>  'Customer credit for Paid Amount For Invoice No -'.$invoice_no.' Customer '.$cusifo->customer_name,

      'Debit'          =>  0,

      'Credit'         =>  $paidamount,

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 



if ($invoice_id != '') {

            $this->db->where('invoice_id', $invoice_id);

            $this->db->update('invoice', $data);

        }

if(!empty($this->input->post('paid_amount',TRUE))){

            $this->db->insert('acc_transaction',$customer_credit);

        if($this->input->post('paytype') == 2){

        $this->db->insert('acc_transaction',$bankc);

   

        }

            if($this->input->post('paytype') == 1){

        $this->db->insert('acc_transaction',$cc);

        }

       

  }



     



         for($j=0;$j<$num_column;$j++){

                $taxfield = 'tax'.$j;

                $taxvalue = 'total_tax'.$j;

              $taxdata[$taxfield]=$this->input->post($taxvalue);

            }

            $taxdata['customer_id'] = $customer_id;

            $taxdata['date']        = (!empty($this->input->post('invoice_date',TRUE))?$this->input->post('invoice_date',TRUE):date('Y-m-d'));

            $taxdata['relation_id'] = $invoice_id;

            $this->db->insert('tax_collection',$taxdata);



        // Inserting for Accounts adjustment.

        ############ default table :: customer_payment :: inflow_92mizdldrv #################



        $invoice_d_id  = $this->input->post('invoice_details_id',TRUE);

        $cartoon       = $this->input->post('cartoon',TRUE);

        $quantity      = $this->input->post('product_quantity',TRUE);

        $rate          = $this->input->post('product_rate',TRUE);

        $p_id          = $this->input->post('product_id',TRUE);

        $total_amount  = $this->input->post('total_price',TRUE);

        $discount_rate = $this->input->post('discount_amount',TRUE);

        $discount_per  = $this->input->post('discount',TRUE);

        $invoice_description = $this->input->post('desc',TRUE);

        $this->db->where('invoice_id', $invoice_id);

        $this->db->delete('invoice_details');

        $serial_n       = $this->input->post('serial_no',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {

            // $cartoon_quantity = $cartoon[$i];

            $product_quantity = $quantity[$i];

            $product_rate     = $rate[$i];

            $product_id       = $p_id[$i];

            $serial_no        = (!empty($serial_n[$i])?$serial_n[$i]:null);

            $total_price      = $total_amount[$i];

            $supplier_rate    = $this->supplier_price($product_id);

            $discount         = $discount_rate[$i];

            // $dis_per          = $discount_per[$i];

            $dis_per          = 0;

           $desciption        = $invoice_description[$i];

            if (!empty($tax_amount[$i])) {

                $tax = $tax_amount[$i];

            } else {

                $tax = $this->input->post('tax');

            }





            $data1 = array(
                'create_by'=>$this->session->userdata('user_id'),
                'invoice_details_id' => $this->generator(15),

                'invoice_id'         => $invoice_id,

                'product_id'         => $product_id,

                'serial_no'          => $serial_no,

                'quantity'           => $product_quantity,

                'rate'               => $product_rate,

                'discount'           => $discount,

                'total_price'        => $total_price,

                'discount_per'       => $dis_per,

                'tax'                => $this->input->post('total_tax',TRUE),

                'paid_amount'        => $paidamount,

                 'supplier_rate'     => $supplier_rate,

                'due_amount'         => $this->input->post('due_amount',TRUE),

                 'description'       => $desciption,

            );

            $this->db->insert('invoice_details', $data1);







           



            $customer_id = $this->input->post('customer_id',TRUE);

          

        }



        return $invoice_id;

    }

      //Retrieve ocean import tracking Edit Data
    public function retrieve_ocean_export_tracking_editdata($purchase_id) {

         $this->db->select('a.*,
                        d.supplier_id,
                        d.supplier_name'
        );
        $this->db->from('ocean_export_tracking a');
     
        $this->db->join('supplier_information d', 'd.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.ocean_export_tracking_id', $purchase_id);
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;


    }


    //update ocean import trucking

     public function update_ocean_import() {
        //print_r($this->input->post()); die;
        $purchase_id  = $this->input->post('ocean_export_tracking_id',TRUE);
        
  
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');



         $data = array(

        

            'ocean_export_tracking_id'   => $purchase_id,

            'booking_no'     => $this->input->post('booking_no',TRUE),

            'supplier_id'   => $this->input->post('supplier_id',TRUE),

            'container_no' => $this->input->post('container_no',TRUE),

            'seal_no'   => $this->input->post('seal_no',TRUE),

            'etd'   => $this->input->post('etd',TRUE),

            'eta'   => $this->input->post('eta',TRUE),

            'shipper' => $this->input->post('shipper',TRUE),

            'invoice_date' => $this->input->post('invoice_date',TRUE),

            'consignee' => $this->input->post('consignee',TRUE),

            'notify_party' => $this->input->post('notify_party',TRUE),

            'vessel' =>  $this->input->post('vessel',TRUE),

            'voyage_no' => $this->input->post('voyage_no',TRUE),

            'port_of_loading' =>  $this->input->post('port_of_loading',TRUE),

            'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),

            'place_of_delivery' => $this->input->post('place_of_delivery',TRUE),

            'freight_forwarder'  => $this->input->post('freight_forwarder',TRUE),

            'particular' => $this->input->post('particular',TRUE),

            'status'  => 1,

        );

  



      
        if ($purchase_id != '') {
            $this->db->where('ocean_export_tracking_id', $purchase_id);
            $this->db->update('ocean_export_tracking', $data);
            //account transaction update
     
        }

        return true;
    }

public function profarma_invoice_customer()
{
    $query = $this->db->get('customer_information');

    if ($query->num_rows() > 0) {

        return $query->result_array();

    }
    return true;
}

    //Retrieve invoice_html_data

    public function retrieve_invoice_html_data($invoice_id) {



        $this->db->select('a.total_tax,

                        a.*,

                        b.*,

                        c.*,

                        d.product_id,

                        d.product_name,

                        d.product_details,

                        d.unit,

                        d.product_model,

                        a.paid_amount as paid_amount,

                        a.due_amount as due_amount'

                    );

        $this->db->from('invoice a');

        $this->db->join('invoice_details c', 'c.invoice_id = a.invoice_id');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('a.invoice_id', $invoice_id);

        $this->db->where('c.quantity >', 0);

        $query = $this->db->get();


        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // Delete invoice Item

    public function retrieve_product_data($product_id) {

        $this->db->select('supplier_price,price,supplier_id,tax');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product.id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

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



    // Delete invoice Item

    public function delete_invoice($invoice_id) {

        

        $this->db->where('invoice_id', $invoice_id)->delete('invoice');

        //Delete invoice_details table

        $this->db->where('invoice_id', $invoice_id)->delete('invoice_details');

        //Delete transaction from customer_ledger table

        return true;

    }



    public function invoice_search_list($cat_id, $company_id) {

        $this->db->select('a.*,b.sub_category_name,c.category_name');

        $this->db->from('invoices a');

        $this->db->join('invoice_sub_category b', 'b.sub_category_id = a.sub_category_id');

        $this->db->join('invoice_category c', 'c.category_id = b.category_id');

        $this->db->where('a.sister_company_id', $company_id);

        $this->db->where('c.category_id', $cat_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // GET TOTAL PURCHASE PRODUCT

    public function get_total_purchase_item($product_id) {

        $this->db->select('SUM(quantity) as total_purchase');

        $this->db->from('product_purchase_details');

       // $this->db->where('create_by',$this->session->userdata('user_id'));

        $this->db->where('product_id', $product_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // GET TOTAL SALES PRODUCT

    public function get_total_sales_item($product_id) {

        $this->db->select('SUM(quantity) as total_sale');

        $this->db->from('invoice_details');

        $this->db->where('create_by',$this->session->userdata('user_id'));

        $this->db->where('product_id', $product_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }

    //get_total_product_from_purchase_order

    

     public function get_total_product_from_purchase_order($product_id, $supplier_id) {

        $this->db->select('SUM(a.quantity) as total_purchase,b.*');

        $this->db->from('product_purchase_details a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');

        $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.product_id', $product_id);

       // $this->db->where('b.supplier_id', $supplier_id);

        $total_purchase = $this->db->get()->row();



        $this->db->select('SUM(b.quantity) as total_sale');

        $this->db->from('invoice_details b');
        $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $this->db->where('b.product_id', $product_id);

        $total_sale = $this->db->get()->row();



        $this->db->select('a.*,b.*');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

      //  $this->db->where('b.supplier_id', $supplier_id);

        $product_information = $this->db->get()->row();



        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);



        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();



        $data2 = array(

            'total_product'  => $available_quantity,

            'supplier_price' => $product_information->supplier_price,

            'price'          => $product_information->price,

            'supplier_id'    => $product_information->supplier_id,

            'unit'           => $product_information->unit,

            'tax'            => $product_information->tax,

            'discount_type'  => $currency_details[0]['discount_type'],

        );



        return $data2;

    }


    //Get total product

    public function get_total_product($product_id, $supplier_id) {

        $this->db->select('SUM(a.quantity) as total_purchase,b.*');

        $this->db->from('product_purchase_details a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');

        $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.product_id', $product_id);

        $this->db->where('b.supplier_id', $supplier_id);

        $total_purchase = $this->db->get()->row();



        $this->db->select('SUM(b.quantity) as total_sale');

        $this->db->from('invoice_details b');
        $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $this->db->where('b.product_id', $product_id);

        $total_sale = $this->db->get()->row();



        $this->db->select('a.*,b.*');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $this->db->where('b.supplier_id', $supplier_id);

        $product_information = $this->db->get()->row();



        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);



        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();



        $data2 = array(

            'total_product'  => $available_quantity,

            'supplier_price' => $product_information->supplier_price,

            'price'          => $product_information->price,

            'supplier_id'    => $product_information->supplier_id,

            'unit'           => $product_information->unit,

            'tax'            => $product_information->tax,

            'discount_type'  => $currency_details[0]['discount_type'],

        );



        return $data2;

    }



// product information retrieve by product id

    public function get_total_product_invoic($product_id) {

        $this->db->select('SUM(a.quantity) as total_purchase');

        $this->db->from('product_purchase_details a');
      //  $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.product_id', $product_id);

        $total_purchase = $this->db->get()->row();



        $this->db->select('SUM(b.quantity) as total_sale');

        $this->db->from('invoice_details b');
     //   $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $this->db->where('b.product_id', $product_id);

        $total_sale = $this->db->get()->row();



        $this->db->select('a.*,b.*');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');

     //   $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $product_information = $this->db->get()->row();



        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);



        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

         $tablecolumn = $this->db->list_fields('tax_collection');

               $num_column = count($tablecolumn)-4;

          $taxfield='';

          $taxvar = [];

           // for($i=0;$i<$num_column;$i++){

           //  $taxfield = 'tax'.$i;

           //  $data2[$taxfield] = $product_information->$taxfield;

           //  $taxvar[$i]       = $product_information->$taxfield;

           //  $data2['taxdta']  = $taxvar;

           // }



    $content ='';



        $html = "";

        if (empty($content)) {

            $html .="No Serial Found !";

        }else{

            // Select option created for product

            $html .="<select name=\"serial_no[]\"   class=\"serial_no_1 form-control\" id=\"serial_no_1\">";

                $html .= "<option value=''>".display('select_one')."</option>";

                foreach ($content as $serial) {

                    $html .="<option value=".$serial.">".$serial."</option>";

                }   

            $html .="</select>";

        }



       

            $data2['total_product']  = $available_quantity;

            $data2['supplier_price'] = $product_information->supplier_price;

            $data2['price']          = $product_information->price;

            $data2['supplier_id']    = $product_information->supplier_id;

            $data2['unit']           = $product_information->unit;

            $data2['tax']            = $product_information->tax;

            $data2['serial']         = $html;

            $data2['discount_type']  = $currency_details[0]['discount_type'];

            $data2['txnmber']        = $num_column;

        



        return $data2;

    }



    //This function is used to Generate Key

    public function generator($lenth) {

        $number = array("1", "2", "3", "4", "5", "6", "7", "8", "9");



        for ($i = 0; $i < $lenth; $i++) {

            $rand_value = rand(0, 8);

            $rand_number = $number["$rand_value"];



            if (empty($con)) {

                $con = $rand_number;

            } else {

                $con = "$con" . "$rand_number";

            }

        }

        return $con;

    }



    //NUMBER GENERATOR

    public function number_generator() {

        $this->db->select_max('invoice', 'invoice_no');

        $query = $this->db->get('invoice');

        $result = $query->result_array();

        $invoice_no = $result[0]['invoice_no'];

        if ($invoice_no != '') {

            $invoice_no = $invoice_no + 1;

        } else {

            $invoice_no = 1000;

        }

        return $invoice_no;

    }

     public function headcode(){

        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030001%'");

        return $query->row();



    }

    //csv invoice

    public function invoice_csv_file() {

         $query = $this->db->select('a.invoice,a.invoice_id,b.customer_name,a.date,a.total_amount')

                ->from('invoice a')

                ->join('customer_information b', 'b.customer_id = a.customer_id', 'left')

                ->where('a.sales_by',$this->session->userdata('user_id'))

                ->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



     public function category_dropdown()

    {

        $data = $this->db->select("*")

            ->from('product_category')

            ->get()

            ->result();



        $list = array('' => 'select_category');

        if (!empty($data)) {

            foreach($data as $value)

                $list[$value->category_id] = $value->category_name;

            return $list;

        } else {

            return false; 

        }

    }



    public function customer_dropdown()

    {

        $data = $this->db->select("*")

            ->from('customer_information')

            ->where('create_by',$this->session->userdata('user_id'))

            ->get()

            ->result();



        $list[''] = 'Select Customer';

        if (!empty($data)) {

            foreach($data as $value)

                $list[$value->customer_id] = $value->customer_name;

            return $list;

        } else {

            return false; 

        }

    }



    public function walking_customer(){

       return $data = $this->db->select('*')->from('customer_information')->where('create_by',$this->session->userdata('user_id'))->like('customer_name','walking','after')->get()->result_array();

    }



        public function allproduct(){

        $this->db->select('*');

        $this->db->from('product_information');

        $this->db->where('created_by',$this->session->userdata('user_id'));

        $this->db->order_by('product_name','asc');

        $query = $this->db->get();

        $itemlist=$query->result();

        return $itemlist;

        }



 public function searchprod($cid = null,$pname= null)

    { 

        $this->db->select('*');

        $this->db->from('product_information');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->like('category_id',$cid);

        $this->db->like('product_name',$pname);

        $this->db->order_by('product_name','asc');

        $query = $this->db->get();

        $itemlist=$query->result();

        return $itemlist;

    }









public function service_invoice_taxinfo($invoice_id){

       return $this->db->select('*')   

            ->from('tax_collection')

            ->where('relation_id',$invoice_id)

            ->get()

            ->result_array(); 

    }





public function customerinfo_rpt($customer_id){

       return $this->db->select('*')   

            ->from('customer_information')

            ->where('customer_id',$customer_id)
            ->where('create_by',$this->session->userdata('user_id'))

            ->get()

            ->result_array(); 

    }



    

        public function autocompletproductdata($product_name){

        $query=$this->db->select('*')

                ->from('product_information')
              //  ->where('created_by',$this->session->userdata('user_id'))

                ->like('product_name', $product_name, 'both')

                ->or_like('product_model', $product_name, 'both')

                ->order_by('product_name','asc')

                ->limit(15)

                ->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();  

        }

        return false;

    }





    public function stock_qty_check($product_id){

        $this->db->select('SUM(a.quantity) as total_purchase');

        $this->db->from('product_purchase_details a');

       // $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.product_id', $product_id);

        $total_purchase = $this->db->get()->row();



        $this->db->select('SUM(b.quantity) as total_sale');

        $this->db->from('invoice_details b');
        $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $this->db->where('b.product_id', $product_id);

        $total_sale = $this->db->get()->row();



        $this->db->select('a.*,b.*');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $product_information = $this->db->get()->row();



        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);

        return (!empty($available_quantity)?$available_quantity:0);



    }


     //Trucking Entry
    public function trucking_entry() {


      $trucking_date = $this->input->post('trucking_date',TRUE);
        


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

        $purchase_id = date('YmdHis');

        $data = array(
            'trucking_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'invoice_no' => $this->input->post('invoice_no',TRUE),
            'invoice_date' =>$this->input->post('invoice_date',TRUE),
            'bill_to'      =>$this->input->post('bill_to',TRUE),
            'shipment_company'   => $this->input->post('shipment_company',TRUE),
            'container_pickup_date'   => $this->input->post('container_pick_up_date',TRUE),
            'delivery_date' => $this->input->post('delivery_date',TRUE),
            'grand_total_amount' => $this->input->post('total',TRUE),
            'status'             => 1,
          
        );



      // new end


        $this->db->insert('sale_trucking', $data);
       /* if($this->input->post('paytype') == 2){
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
*/
   
        $rowCount = count($this->input->post('trucking_date',TRUE));

        for ($i = 0; $i < $rowCount; $i++) {
            $t_date = $this->input->post('trucking_date',TRUE);
            $trucking_rate = $this->input->post('product_rate',TRUE);
            $quantity = $this->input->post('product_quantity',TRUE);
            $trucking_description = $this->input->post('description',TRUE);
            $trucking_pro_no =  $this->input->post('pro_no',TRUE);
            $t_price = $this->input->post('total_price',TRUE);
          //  if(!empty($_POST['trucking_date']) && !empty($_POST['product_quantity']) && !empty($_POST['description']) && 
         //   !empty($_POST['product_rate']) && !empty($_POST['pro_no']) && !empty($_POST['total_price'])){
                $trucking_date = $t_date[$i];
                $product_quantity = $quantity[$i];
                $description = $trucking_description[$i];
                $product_rate =  $trucking_rate[$i];
                $pro_no = $trucking_pro_no[$i];
                $total =  $t_price[$i];
                $data1 = array(
                    'sale_trucking_detail_id' => $this->generator(15),
                    'sale_trucking_id'        => $purchase_id,
                    'trucking_date' =>$trucking_date,
                   
                    'qty'           => $product_quantity,
                    'description'               => $description,
                    'rate'              =>  $product_rate ,
                  
                    'pro_no_reference'           => $pro_no,
                    'total'       => $total,
                    'create_by'          =>  $this->session->userdata('user_id'),
                    'status'             => 1
                );
              
          //  if (!empty($quantity)) {
                $this->db->insert('sale_trucking_details', $data1);
          //  }
   
    }
     

      



        return true;
    }

}

