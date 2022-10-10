<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Invoice_design extends CI_Model {



    private $table = "language";

    private $phrase = "phrase";



    public function __construct() {

        parent::__construct();

    }



    //Retrieve Setting Edit Data

    public function retrieve_setting_editdata() {
        $id=$_SESSION['user_id'];

        $this->db->select('*');

        $this->db->from('invoice_design');

        $this->db->where('uid', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }


       public function retrieve_data() {
           $id=$_SESSION['user_id'];

        $this->db->select('*');

        $this->db->from('invoice_design');

        $this->db->where('uid', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }




    //Update Categories

    public function update_setting($data) {

        $this->db->where('setting_id', 1);

        $this->db->update('web_setting', $data);

        return true;

    }




    public function update_invoice_setting($data) {

        $this->db->insert('invoice_settings', $data);

        return true;

    }

    //Update user setting

    public function update_user_setting($user_id,$data) {

        $this->db->where('user_id', $user_id);

        $this->db->update('users', $data);

        return true;

    }

    public function get_user_setting($user_id)
    {
         $this->db->where('user_id', $user_id);

        $query = $this->db->get('users');

        return $query->row_array();
    }

    public function app_settingsdata(){

        return $result = $this->db->select('*')

                        ->from('app_setting')

                        ->get()

                        ->result_array();

    }



    public function languages() {

        if ($this->db->table_exists($this->table)) {



            $fields = $this->db->field_data($this->table);



            $i = 1;

            foreach ($fields as $field) {

                if ($i++ > 2)

                    $result[$field->name] = ucfirst($field->name);

            }



            if (!empty($result))

                return $result;

        } else {

            return false;

        }

    }



    // currency list

    public function currency_list(){

        $this->db->select('*');

        $this->db->from('currency_tbl');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

        return false;

    }

    // Bank list

     public function bank_list() {

        $this->db->select('*');

        $this->db->from('bank_add');

        $query = $this->db->get();



        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



}

