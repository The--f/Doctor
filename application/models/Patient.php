<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Patient
 *
 * @author dell
 */
class Patient extends CI_Model
{
    var $nomP;
    var $prenomP;
    var $ageP;
    var $telP;
    var $emailP;

    //put your code here
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('form');
    }

    function insertPatient($nomP, $prenomP, $ageP, $telP, $emailP) {
//        $nomP = $this->Input->post('nomPatien');
//        $prenomP = $this->Input->post('prenomPatien');
//        $ageP = $this->Input->post('agePatien');
//        $telP = $this->Input->post('telPatien');
////        $emailP = $this->Input->post('emailPatien');
        $data = array('nomP'=>$nomP, 'prenomP'=>$prenomP,
                        'ageP'=>$ageP, 'telP'=>$telP,
                        'emailP'=>$emailP);
         $this->db->insert('Patients', $data);
    }

    /**
     * function SaveForm()
     *
     * insert form data
     * @param $form_data - array
     * @return Bool - TRUE or FALSE
     */
    function SaveForm($form_data) {
        $this->db->insert('Patients', $form_data);

        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

}


