<?php

       //ocean import tracking Edit Data

       public function ocean_export_tracking_edit_data($purchase_id) {

        $CI = & get_instance();

       $CI->load->model('Invoices');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

        $bank_list       = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Invoices->retrieve_ocean_export_tracking_editdata($purchase_id);

       


        $supplier_id = $purchase_detail[0]['supplier_id'];

        $supplier_name = $purchase_detail[0]['supplier_name'];

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

            'title'         => 'Edit Ocean Import Tracking Invoice',

            'ocean_export_tracking_id'   => $purchase_detail[0]['ocean_export_tracking_id'],

            'booking_no'     => $purchase_detail[0]['booking_no'],

            'supplier_name' => $supplier_name,

            'supplier_id'   => $supplier_id,

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

        );



        $chapterList = $CI->parser->parse('invoice/edit_ocean_export_tracking_form', $data, true);

        return $chapterList;

    }

?>