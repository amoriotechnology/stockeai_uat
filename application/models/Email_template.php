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


    public function insert_email() {
        $pdf=0;
        $pdf = $this->input->post('pdf',TRUE);
        $greeting =$this->input->post('select1',TRUE).'_'.$this->input->post('select2',TRUE);
        
        $id=$_SESSION['user_id'];

        $this->db->select('*');

        $this->db->from('invoice_email');

        $this->db->where('uid', $id);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $this->db->set('pdf_attached', $pdf);
            $this->db->set('subject',$this->input->post('subject',TRUE));
            $this->db->set('greeting',  $greeting);
            $this->db->set('message', $this->input->post('message',TRUE));
            $this->db->where('uid', $id);
            $this->db->update('invoice_email');
        }else{
            $data = array(
            'pdf_attached'=>$this->input->post('pdf'),
            'subject'=>$this->input->post('subject'),
            'greeting'=> $greeting,
             'message'  => $this->session->userdata('message'),
             'uid'   => $id
         );

         $this->db->insert('nvoice_email', $data);
         echo $this->db->last_query();
        }

    }


}

