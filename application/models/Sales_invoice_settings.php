<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Sales_invoice_settings extends CI_Model {



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

    public function sale_data() {

        //return $this->db->count_all("invoice");
        $this->db->where('sales_by',$this->session->userdata('user_id'));
        $query=$this->db->get('invoice');
        return $query->num_rows();

    } 
      
      }