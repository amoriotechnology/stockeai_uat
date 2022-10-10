<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Email_template extends CI_Model {



    private $table = "language";

    private $phrase = "phrase";



    public function __construct() {

        parent::__construct();

    }



    //Retrieve Setting Edit Data

     public function retrieve_data() {
        $id=$_SESSION['user_id'];

        $this->db->select('*');

        $this->db->from('invoice_email');

        $this->db->where('uid', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }




}

