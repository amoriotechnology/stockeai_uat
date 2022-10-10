<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Tax extends CI_Model {



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

    public function taxlist() {

        //return $this->db->count_all("invoice");
      
        $query=$this->db->get('tax_information');
        if ($query->num_rows() > 0) {
       
            return $query->result_array();
        }

    } 
    
      
}

