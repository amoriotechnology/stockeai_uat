<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Lpurchase {



    //Purchase add form

    public function purchase_add_form() {

        $CI = & get_instance();

        $CI->load->model('Purchases');
            $CI->load->model('Suppliers');
        $CI->load->model('Categories');
        $CI->load->model('Units');
   



        $CI->load->model('Web_settings');

        $all_supplier = $CI->Purchases->select_all_supplier();
           $supplier      = $CI->Suppliers->supplier_list("110", "0");

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();


        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();


        $data = array(

            'title'         => display('add_purchase'),

            'all_supplier'  => $all_supplier,

               'supplier'     => $supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,

        );

        $purchaseForm = $CI->parser->parse('purchase/add_purchase_form', $data, true);

        return $purchaseForm;

    }


      public function packing_add_form() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Categories');

        $CI->load->model('Units');


        $CI->load->model('Web_settings');

        $all_supplier = $CI->Purchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();


        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();

        $voucher_no = $CI->Purchases->packing_voucher_no();

        $data = array(

            'title'         => 'Add Packing List',

            'all_supplier'  => $all_supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'voucher_no'   => $voucher_no,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,

        );

        $purchaseForm = $CI->parser->parse('purchase/add_packing_list', $data, true);

        return $purchaseForm;

    }

    
    public function packing_list() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Categories');

        $CI->load->model('Units');

        $CI->load->model('Web_settings');

        $all_supplier = $CI->Purchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();


        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();
        $CI->load->model('Permission_model');
        $assign_role=$CI->Permission_model->assign_role();
        $assign_role= json_decode(json_encode($assign_role), true);



        $data = array(

            'title'         => 'Packing List',

            'all_supplier'  => $all_supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,
            'role'  => $assign_role,

        );

        $purchaseForm = $CI->parser->parse('purchase/packing_list', $data, true);

        return $purchaseForm;

    }


       //Purchase add form

    public function ocean_import_form() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Categories');
        $CI->load->model('Units');
   



        $CI->load->model('Web_settings');

        $all_supplier = $CI->Purchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();


        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();


        $data = array(

            'title'         => display('add_purchase'),

            'all_supplier'  => $all_supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,

        );

        $purchaseForm = $CI->parser->parse('purchase/ocean_import_tracking', $data, true);

        return $purchaseForm;

    }




      //Purchase Order form

      public function purchase_order_form() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Categories');

        $CI->load->model('Units');
   
        $CI->load->model('Web_settings');

      

        $all_supplier = $CI->Purchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();

        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();

     
        $voucher_no = $CI->Purchases->voucher_no();

    

        $data = array(

            'title'         => 'Add Purchase Order',

            'all_supplier'  => $all_supplier,
            
            'voucher_no' => $voucher_no ,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,

        );

        // echo "<pre>";
        // print_r($data);die();

    

        $purchaseForm = $CI->parser->parse('purchase/purchase_order', $data, true);

        return $purchaseForm;

    }


       public function random_no()
    {
        $inc_id = '';
        do {
            $id = rand(100000, 999999);
            $id2 = "PO" . $id;
            // $newcheck = $this->AdminInvestmentModel->random($id2);

            foreach ($newcheck as $newcheck) {
                if ($newcheck->c > 0) {
                    $id = rand(100000, 999999);
                } else {
                    $inc_id = "PO" . $id;
                }
            }
        } while ($inc_id == '');
        echo $inc_id;
    }


    // Retrieve Purchase List

    public function purchase_list() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');
        $CI->load->model('Permission_model');
        $assign_role=$CI->Permission_model->assign_role();
        $assign_role= json_decode(json_encode($assign_role), true);


        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $CI->load->model('Permission_model');
        $assign_role=$CI->Permission_model->assign_role();
        $assign_role= json_decode(json_encode($assign_role), true);

        $_SESSION['expense_update']=$assign_role;


        $data = array(

            'title'          => display('manage_purchase'),

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Purchases->count_purchase(),
            'role'  => $assign_role,

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }


    public function purchase_order_list() {

        $CI = & get_instance();


        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $CI->load->model('Permission_model');
        $assign_role=$CI->Permission_model->assign_role();
        $assign_role= json_decode(json_encode($assign_role), true);

        $data = array(

            'title'          => 'Manage Purchase Order',

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Purchases->count_purchase_order(),
            'role'  => $assign_role,

        );




        $purchaseList = $CI->parser->parse('purchase/purchase_order_list', $data, true);

        return $purchaseList;

    }



     


     public function ocean_import_list() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $CI->load->model('Permission_model');
        $assign_role=$CI->Permission_model->assign_role();
        $assign_role= json_decode(json_encode($assign_role), true);


        $data = array(

            'title'          => display('manage_purchase'),

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Purchases->count_ocean_import(),
            'total_purhcase' => $CI->Purchases->count_ocean_import(),
            'role'  => $assign_role,

        );



        $purchaseList = $CI->parser->parse('purchase/ocean_import_list', $data, true);

        return $purchaseList;

    }


     public function trucking_list() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Purchases->count_trucking(),

        );



        $purchaseList = $CI->parser->parse('purchase/trucking_list', $data, true);

        return $purchaseList;

    }



    //purchase search by supplier

    public function purchase_search_supplier($supplier_id, $links, $per_page, $page) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $purchases_list = $CI->Purchases->purchase_search($supplier_id, $per_page, $page);

        if (!empty($purchases_list)) {

            $j = 0;

            foreach ($purchases_list as $k => $v) {

                $purchases_list[$k]['final_date'] = $CI->occational->dateConvert($purchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($purchases_list as $k => $v) {

                $i++;

                $purchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'purchases_list' => $purchases_list,

            'links'          => $links,

            'currency'       => $currency_details[0]['currency'],

            'position'       => $currency_details[0]['currency_position'],

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



// purchase info by invoice no

    public function purchase_list_invoice_no($invoice_no) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $purchases_list = $CI->Purchases->purchase_list_invoice_id($invoice_no);

        if (!empty($purchases_list)) {

            $j = 0;

            foreach ($purchases_list as $k => $v) {

                $purchases_list[$k]['final_date'] = $CI->occational->dateConvert($purchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($purchases_list as $k => $v) {

                $i++;

                $purchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'purchases_list' => $purchases_list,

            'links'          => '',

            'currency'       => $currency_details[0]['currency'],

            'position'       => $currency_details[0]['currency_position'],

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



    //Purchase Item By Search

    public function purchase_by_search($supplier_id) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->library('occational');

        $purchases_list = $CI->Purchases->purchase_by_search($supplier_id);

        $j = 0;

        if (!empty($purchases_list)) {

            foreach ($purchases_list as $k => $v) {

                $purchases_list[$k]['final_date'] = $CI->occational->dateConvert($purchases_list[$j]['purchase_date']);

                $j++;

            }

            $i = 0;

            foreach ($purchases_list as $k => $v) {

                $i++;

                $purchases_list[$k]['sl'] = $i;

            }

        }

        $data = array(

            'title' => display('manage_purchase'),

            'purchases_list' => $purchases_list

        );

        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



    //Insert Purchase

    public function insert_purchase($data) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->Purchases->purchase_entry($data);

        return true;

    }



    //purchase Edit Data

    public function purchase_edit_data($purchase_id) {

        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Suppliers');
        $CI->load->model('Web_settings');
         $bank_list        = $CI->Web_settings->bank_list();
        $purchase_detail = $CI->Purchases->retrieve_purchase_editdata($purchase_id);
        $supplier_id = $purchase_detail[0]['supplier_id'];
        $supplier_list = $CI->Suppliers->supplier_list("110", "0");
        $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);





        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }

    


        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'         => display('purchase_edit'),

            'purchase_id'   => $purchase_detail[0]['purchase_id'],

            'chalan_no'     => $purchase_detail[0]['chalan_no'],

            'supplier_name' => $purchase_detail[0]['supplier_name'],

            'supplier_id'   => $purchase_detail[0]['supplier_id'],

             'description'   => $purchase_detail[0]['description'],

            'grand_total'   => $purchase_detail[0]['grand_total_amount'],

            'purchase_details' => $purchase_detail[0]['purchase_details'],

            'purchase_date' => $purchase_detail[0]['purchase_date'],

            'remarks'       => $purchase_detail[0]['remarks'],

            'total_discount'=> $purchase_detail[0]['total_discount'],

            'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

            'bank_id'       =>  $purchase_detail[0]['bank_id'],

            'purchase_info' => $purchase_detail,

            'supplier_list' => $supplier_list,

            'paid_amount'   => $purchase_detail[0]['paid_amount'],

            'due_amount'    => $purchase_detail[0]['due_amount'],

            'bank_list'     => $bank_list,

            'supplier_selected' => $supplier_selected,

            'discount_type' => $currency_details[0]['discount_type'],

            'paytype'       => $purchase_detail[0]['payment_type'],

        );

        $chapterList = $CI->parser->parse('purchase/edit_purchase_form', $data, true);

        return $chapterList;

    }



        //purchase Edit Data

    public function purchase_order_edit_data($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

         $bank_list        = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Purchases->retrieve_purchase_order_editdata($purchase_id);



        $supplier_id = $purchase_detail[0]['supplier_id'];

        $supplier_list = $CI->Suppliers->supplier_list("110", "0");

        $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'  => display('purchase_edit'),

            'ship_to'  => $purchase_detail[0]['ship_to'],

            'quantity'  => $purchase_detail[0]['quantity'],

            'created_by' => $purchase_detail[0]['created_by'],

            'payment_terms' => $purchase_detail[0]['payment_terms'],
            
            'shipment_terms' => $purchase_detail[0]['shipment_terms'],

            'est_ship_date' => $purchase_detail[0]['est_ship_date'],

            'slabs' => $purchase_detail[0]['slabs'],

            'purchase_id'   => $purchase_detail[0]['purchase_id'],

            'chalan_no'     => $purchase_detail[0]['chalan_no'],

            'supplier_name' => $purchase_detail[0]['supplier_name'],

            'supplier_id'   => $purchase_detail[0]['supplier_id'],

            'grand_total'   => $purchase_detail[0]['grand_total_amount'],

            'purchase_details' => $purchase_detail[0]['purchase_details'],

            'purchase_date' => $purchase_detail[0]['purchase_date'],

            'remarks'       => $purchase_detail[0]['remarks'],

            'total_discount'=> $purchase_detail[0]['total_discount'],

            'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

            'bank_id'       =>  $purchase_detail[0]['bank_id'],

            'purchase_info' => $purchase_detail,

            'supplier_list' => $supplier_list,

            'paid_amount'   => $purchase_detail[0]['paid_amount'],

            'due_amount'    => $purchase_detail[0]['due_amount'],

            'bank_list'     => $bank_list,

            'supplier_selected' => $supplier_selected,

            'discount_type' => $currency_details[0]['discount_type'],

            'paytype'       => $purchase_detail[0]['payment_type'],

        );



        $chapterList = $CI->parser->parse('purchase/edit_purchase_order_form', $data, true);

        return $chapterList;

    }


        //ocean import tracking Edit Data

    public function ocean_import_tracking_edit_data($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

         $bank_list        = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Purchases->retrieve_ocean_import_tracking_editdata($purchase_id);


        $supplier_id = $purchase_detail[0]['supplier_id'];

        $supplier_list = $CI->Suppliers->supplier_list("110", "0");

        $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'         => display('purchase_edit'),

            'ocean_import_tracking_id'   => $purchase_detail[0]['ocean_import_tracking_id'],

            'booking_no'     => $purchase_detail[0]['booking_no'],

            'container_no' => $purchase_detail[0]['container_no'],

            'seal_no'   => $purchase_detail[0]['seal_no'],

            'shipper' => $purchase_detail[0]['shipper'],

            'invoice_date' => $purchase_detail[0]['invoice_date'],

            'consignee' => $purchase_detail[0]['consignee'],

            'notify_party' => $purchase_detail[0]['notify_party'],

            'vessel' =>  $purchase_detail[0]['vessel'],

            'voyage_no' =>  $purchase_detail[0]['voyage_no'],

            'port_of_loading' =>  $purchase_detail[0]['port_of_loading'],

            'port_of_discharge' => $purchase_detail[0]['port_of_discharge'],

            'place_of_delivery' => $purchase_detail[0]['place_of_delivery'],

            'freight_forwarder'  => $purchase_detail[0]['freight_forwarder'],

            'particular' => $purchase_detail[0]['particular'],

            'attachment' => $purchase_detail[0]['attachment'],

            'status'  => $purchase_detail[0]['status'],

          

            'supplier_id'   => $purchase_detail[0]['supplier_id'],


        );



        $chapterList = $CI->parser->parse('purchase/edit_ocean_import_tracking_form', $data, true);

        return $chapterList;

    }




        //trucking Edit Data

    public function trucking_edit_data($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

         //$bank_list        = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Purchases->retrieve_trucking_editdata($purchase_id);

        $customer_id = $purchase_detail[0]['customer_id'];

        // $supplier_list = $CI->Suppliers->supplier_list("110", "0");

        // $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'         => display('purchase_edit'),

            'trucking_id'   => $purchase_detail[0]['trucking_id'],

            'invoice_no'     => $purchase_detail[0]['invoice_no'],

            'customer_name' => $purchase_detail[0]['customer_name'],

            'customer_id'   => $purchase_detail[0]['customer_id'],

            'bill_to'   => $purchase_detail[0]['bill_to'],

            'shipment_company'   => $purchase_detail[0]['shipment_company'],

            'container_pickup_date'   => $purchase_detail[0]['container_pickup_date'],

            'delivery_date'   => $purchase_detail[0]['delivery_date'],

            'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

         

        );



        $chapterList = $CI->parser->parse('purchase/edit_trucking_form', $data, true);

        return $chapterList;

    }



         //trucking Edit Data

    public function packing_list_edit_data($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

         //$bank_list        = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Purchases->retrieve_packing_editdata($purchase_id);

      
        // $customer_id = $purchase_detail[0]['customer_id'];

        // $supplier_list = $CI->Suppliers->supplier_list("110", "0");

        // $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'         => 'Packing List Edit',

            'expense_packing_id'   => $purchase_detail[0]['expense_packing_id'],

            'invoice_no'     => $purchase_detail[0]['invoice_no'],

            'invoice_date'   => $purchase_detail[0]['invoice_date'],

            'gross_weight' => $purchase_detail[0]['gross_weight'],

            'container_no' => $purchase_detail[0]['container_no'],

            'thickness' => $purchase_detail[0]['thickness'],

            'description' =>  $purchase_detail[0]['description'],

            'grand_total_amount' =>  $purchase_detail[0]['grand_total_amount'],

            'serial_no' =>   $purchase_detail[0]['serial_no'],

            'purchase_info' => $purchase_detail,

            'slab_no' =>   $purchase_detail[0]['slab_no'],

            'prouduct_name' =>  $purchase_detail[0]['product_name'],

            'net_measure' =>   $purchase_detail[0]['net_measure'],

            'height' =>   $purchase_detail[0]['height'],

            'width'=>   $purchase_detail[0]['width'],
            'area'=>   $purchase_detail[0]['area'],

        );



        $chapterList = $CI->parser->parse('purchase/edit_packing_form', $data, true);

        return $chapterList;

    }



    //Search purchase

    public function purchase_search_list($cat_id, $company_id) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $category_list = $CI->Purchases->retrieve_category_list();

        $purchases_list = $CI->Purchases->purchase_search_list($cat_id, $company_id);

        $data = array(

            'title'          => display('manage_purchase'),

            'purchases_list' => $purchases_list,

            'category_list'  => $category_list

        );

        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



    //Purchase details data

    public function purchase_details_data($purchase_id) {



        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');



        $purchase_detail = $CI->Purchases->purchase_details_data($purchase_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }



            foreach ($purchase_detail as $k => $v) {

                $purchase_detail[$k]['convert_date'] = $CI->occational->dateConvert($purchase_detail[$k]['purchase_date']);

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();

     //print_r($purchase_detail); die;  

        $data = array(

            'title'            => display('purchase_details'),

            'purchase_id'      => $purchase_detail[0]['purchase_id'],

            'email_address'      => $purchase_detail[0]['email_address'],

            'mobile'      => $purchase_detail[0]['mobile'],

            'address'      => $purchase_detail[0]['address'],

            'message_invoice' => $purchase_detail[0]['message_invoice'],

            'purchase_details' => $purchase_detail[0]['purchase_details'],

            'remarks'  => $purchase_detail[0]['remarks'],

            'supplier_name'    => $purchase_detail[0]['supplier_name'],

            'final_date'       => $purchase_detail[0]['convert_date'],

            'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),

            'chalan_no'        => $purchase_detail[0]['chalan_no'],

            'total'            =>  number_format($purchase_detail[0]['grand_total_amount']+(!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0), 2),

            'discount'         => number_format((!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

            'paid_amount'      => number_format($purchase_detail[0]['paid_amount'],2),

            'due_amount'      => number_format($purchase_detail[0]['due_amount'],2),

            'purchase_all_data'=> $purchase_detail,

            'company_info'     => $company_info,

            'currency'         => $currency_details[0]['currency'],

            'position'         => $currency_details[0]['currency_position'],

            'Web_settings'     => $currency_details,

        );



        $chapterList = $CI->parser->parse('purchase/purchase_detail', $data, true);

        return $chapterList;

    }



    //Purchase details data

    public function ocean_import_tracking_details_data($purchase_id) {



        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');



        $purchase_detail = $CI->Purchases->ocean_import_tracking_details_data($purchase_id);

     

        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }



            foreach ($purchase_detail as $k => $v) {

                $purchase_detail[$k]['convert_date'] = $CI->occational->dateConvert($purchase_detail[$k]['invoice_date']);

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();

        $data = array(

        'title'            => display('purchase_details'),

        'ocean_import_tracking_id'      => $purchase_detail[0]['ocean_import_tracking_id'],

            'booking_no' => $purchase_detail[0]['booking_no'],

            'container_no'    => $purchase_detail[0]['container_no'],

            'seal_no'       => $purchase_detail[0]['seal_no'],
            'etd' => $purchase_detail[0]['etd'],
            'eta' => $purchase_detail[0]['eta'],
            'supplier_id' => $purchase_detail[0]['supplier_id'],
            'supplier_name' => $purchase_detail[0]['supplier_name'],
            'shipper' => $purchase_detail[0]['shipper'],
            'invoice_date' => $purchase_detail[0]['invoice_date'],
            'consignee' => $purchase_detail[0]['consignee'],
            'notify_party' => $purchase_detail[0]['notify_party'],
            'vessel' => $purchase_detail[0]['vessel'],
            'voyage_no' => $purchase_detail[0]['voyage_no'],
            'port_of_loading' => $purchase_detail[0]['port_of_loading'],
            'port_of_discharge' => $purchase_detail[0]['port_of_discharge'],
            'place_of_delivery' => $purchase_detail[0]['place_of_delivery'],
            'freight_forwarder' => $purchase_detail[0]['freight_forwarder'],
            'particular' => $purchase_detail[0]['particular'],
            'attachment' => $purchase_detail[0]['attachment'],
            'status' => $purchase_detail[0]['status'],
            'create_by' => $purchase_detail[0]['create_by'],

            // 'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),

        );



        $chapterList = $CI->parser->parse('purchase/ocean_import_invoice_html', $data, true);

        return $chapterList;

    }



    // purchase list date to date

    public function purchase_list_date_to_date($start, $end) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $purchases_list = $CI->Purchases->purchase_list_date_to_date($start, $end);

        if (!empty($purchases_list)) {

            $j = 0;

            foreach ($purchases_list as $k => $v) {

                $purchases_list[$k]['final_date'] = $CI->occational->dateConvert($purchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($purchases_list as $k => $v) {

                $i++;

                $purchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'purchases_list' => $purchases_list,

            'links'          => '',

            'currency'       => $currency_details[0]['currency'],

            'position'       => $currency_details[0]['currency_position'],

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



}



?>