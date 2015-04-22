<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TAMS
 * Exam Model
 * 
 * @category   Model
 * @package    Admission Management
 * @subpackage Admission
 * @author     Akinsola Tunmise <akinsolatunmise@gmail.com>, Suleodu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */

class Admission_model extends CI_Model {
	
    /**
     * Class constructor
     * 
     * @access public
     * @return void
     */
    public function __construct() {
            parent::__construct();
            $this->load->database();

    } // End func __construct
 
    /**
     * Create a new prospective student
     * 
     * @access public
     * @param array $param
     * @return int
     */
    public function create($param) {
        
        //Initiate transaction 
        $this->db->trans_start();
        
        $this->db->insert('users', $param['user']);

        $param['pros']['userid'] = $this->db->insert_id();
        
        $this->db->insert('prospective',$param['pros']);
        
        // End transaction
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            return DEFAULT_ERROR;
        }

        return DEFAULT_SUCCESS;
    } //End of func create
    
    /** 
     * Get subject(s)
     * 
     * @access public
     * @param int $id
     * @return void
     */
    public function verifyRegPayment($id){
        $query = $this->db->get_where('reg_payment', array('pstdid' => $id, 'status' => 'paid'));
        if($query->num_rows()> 0){
            return $query->result_array(); 
        }
        return FALSE;
    }
    
    /** 
     * Get active admission for the session
     * 
     * @access public
     * @param array $param
     * @return array
     */
    public function get_current_admission($param){
        
        $this->db->select('*');
        $this->db->from('adm_batch');
        $this->db->join('admissions', 'admissions.admid = adm_batch.admid');
        $this->db->where('adm_batch.status', $param['status']);
        $this->db->where('admissions.schoolid', $param['schoolid']);
        $query = $this->db->get();
        
        $result = $query->row_array();
        
        return $result;
        
    }
    
    /** 
     * submit all prospective information supply at registration 
     * 
     * @access public
     * @param array $param
     * @return integer
     */
    public function register($param, $form){
        
        switch ($form) {
            case '1':
                $record['user'] = array(
                            'fname' => $param['fname'],
                            'lname' => $param['lname'],
                            'mname' => $param['mname'],
                            'email' => $param['email'],
                            'phone' => $param['phone'],
                            'sex' => $param['sex'],
                            'dob' => $param['dob'],
                            'stid' => $param['soforig'],
                            'lgaid' => $param['lgaoforig'],
                            'address' => $param['address'],
                            'nationality' => $param['nationality'],
                            'marital' => $param['marital'],
                            'blood' => $param['blood'],
                            'religion' => $param['religion'],
                            
                        );
                
                $record['pros'] = array(
                                    'formsubmit' => $form,
                                    'disablility' => ($param['disable'] == 'yes') ? $param['disable_desc'] : $param['disable'],
                                    'hobby' => $param['hobby'],
                                );
                //Initiate transaction 
                $this->db->trans_start();
                
                $this->db->update('users', $record['user'], array('userid' => $param['userid']));
                $this->db->update('prospective', $record['pros'], array('userid' => $param['userid']));
                
                // End transaction
                $this->db->trans_complete();
                
                if($this->db->trans_status() === FALSE){
                    
                    $status = DEFAULT_ERROR;
                }else{
                    
                    $status = DEFAULT_SUCCESS;
                }
                break;
                
            case '2':
                $record['pros'] = array(
                            'spname' => $param['sp_flname'],
                            'spaddress' => $param['sp_address'],
                            'spphone' => $param['sp_phone'],
                            'spemail' => $param['sp_mail'],

                            'nkfname' => $param['nkfname'],
                            'nkoname' => $param['nkoanme'],
                            'nkphone' => $param['nkphone'],
                            'nkmail' => $param['nkmail'],
                            'nkaddress' => $param['nkaddress'],
                            'nkrelation' => $param['relationship'],
                            'formsubmit' => $form,
                        );
               
               
                if($this->db->update('prospective', $record['pros'], array('userid' => $param['userid']))){

                    $status = DEFAULT_SUCCESS;

                }else{

                   $status = DEFAULT_ERROR; 
                }
                
                break;
                
            case '3':
                   /**
                    * @todo Process result submition
                    */ 
                break;
            
             case '4':
                if($param['admtype'] == 'DE'){
                 
                    $record['de_result'] = array(
                                        'schoolname' => $param['inst_name'],
                                        'schooladdress' => $param['inst_address'],
                                        'certobtain' => $param['cert_obtain'],
                                        'gradyear' => $param['grad_year'],
                                        'grade' => $param['grade'],
                                        'userid' => $param['userid']
                                    );
                    $record['pros'] = array(
                                    'formsubmit' => $form,
                                );
               
                    //Initiate transaction 
                    $this->db->trans_start();

                    $this->db->insert('de_result', $record['de_result']);
                    $this->db->update('prospective', $record['pros'], array('userid' => $param['userid']));

                    // End transaction
                    $this->db->trans_complete();

                    if($this->db->trans_status() === FALSE){

                        $status = DEFAULT_SUCCESS;

                    }else{

                       $status = DEFAULT_ERROR; 
                    }

                }
                elseif($param['admtype'] == 'UTME'){
                    
                    
                }
                
                break;
             
            case '5':
                $record['pros'] = array(
                                    'prog1' => $param['prog1'],
                                    'prog2' => $param['prog2'],
                                    'formsubmit' => $form,
                                );
                
                if($this->db->update('prospective', $record['pros'], array('userid' => $param['userid']))){

                    $status = DEFAULT_SUCCESS;

                }else{

                   $status = DEFAULT_ERROR; 
                }   
                
                break;
            
            default:
                break;
        }
        
        return $status;
    }
    
    /** 
     * submit previous qualification  
     * 
     * @access private
     * @param array $param 
     * @param integer $id
     * @return array
     */
    private function insert_prev_qualification($param, $id){
        
       foreach($param as $pvq){
           
           if($pvq['cert'] != NULL && 
                $pvq['school'] != NULL && 
                $pvq['from'] != NULL && 
                $pvq['to'] != NULL){
               
                $this->db->set('userid', $id);
                $this->db->set('certificate', $pvq['cert']);
                $this->db->set('school', $pvq['school']);
                $this->db->set('from', $pvq['from']);
                $this->db->set('to', $pvq['to']);
                $this->db->insert('prev_qualification');
                
            }
            
       } 
       
    }
    
    
    /** 
     * submit olevel result  
     * 
     * @access private
     * @param array $param 
     * @param integer $id
     * @return void
     */
    private function insert_olevel_result($param, $id){
        
        foreach ($param['olevel'] as $olevel){
            
            if(isset($olevel['examtype']) && isset($olevel['examyr']) && isset($olevel['examnum'])){
                
                $this->db->set('userid', $id);
                $this->db->set('examtype', $olevel['examtype']);
                $this->db->set('examyear', $olevel['examyr']);
                $this->db->set('examnumber', $olevel['examnum']);
                $this->db->set('sitting', $olevel['sitting']);
                $this->db->insert('olevel');
                
                $resultid = $this->db->insert_id();
                
                for($idx = 0; $idx <= count($olevel['subject']); $idx++){
                    
                    if(isset($olevel['subject'][$idx]) && isset($olevel['grade'][$idx])){
                        
                        $this->db->set('olevelid', $resultid);
                        $this->db->set('subject', $olevel['subject'][$idx]);
                        $this->db->set('grade', $olevel['subject'][$idx]);
                        $this->db->insert('olevel_result');
                        
                    }
                }
            }
        }
    }//End of function insert_olevel_result
    
    /** 
     * Insert Utme record  
     * 
     * @access private
     * @param array $param 
     * @param integer $id
     * @return void
     */
    private function insert_utme($param, $id){
        
        if(isset($param['utme']['year']) && isset($param['utme']['regid'])){
            
            $this->db->set('userid', $id);
            $this->db->set('regid', $param['utme']['regid']);
            $this->db->set('year', $param['utme']['year']);
            $this->db->insert('utme');
            
            $utmeid = $this->db->insert_id();
            
            for($idx = 0; $idx <= count($param['utme']['subject']); $idx++){
                    
                if(isset($param['utme']['subject'][$idx]) && isset($param['utme']['score'][$idx])){

                    $this->db->set('utmeid', $resultid);
                    $this->db->set('subject', $param['utme']['subject'][$idx]);
                    $this->db->set('score', $param['utme']['score'][$idx]);
                    $this->db->insert('utme_result');

                }
            }
        }
    }
    
    
    public function get_adm_status($id){
        
        echo  $prep_query = sprintf("SELECT u.*, p.*, pr1.progname AS pro_chc1,pr2.progname AS pro_chc2, pr3.progname AS pro_offered "
                            . "FROM {$this->db->protect_identifiers('users', TRUE)} u, "
                            . "{$this->db->protect_identifiers('prospective', TRUE)} p, "
                            . "{$this->db->protect_identifiers('programmes', TRUE)} pr1, "
                            . "{$this->db->protect_identifiers('programmes', TRUE)} pr2, "
                            . "{$this->db->protect_identifiers('programmes', TRUE)} pr3 "
                            . "WHERE u.userid = p.userid "
                            . "AND p.prog1 = pr1.progid "
                            . "AND p.prog2 = pr2.progid "
                            . "AND p.offered = pr3.progid "
                            . "AND u.userid = %s",$id);
                            exit();
//        $query = $this->db->query($prep_query);   
//        
//        $result = $query->row_array();
//        
//        return $result;
    }
    
    
    /**
     * Get exam group(s)
     * 
     * @access public
     * @param int $id
     * @return void
     */
    public function get_group($id = NULL) {
        
        // Initialize where clause and result set
        $where = array();
        $result_set = QUERY_ARRAY_RESULT;
         
        // Create where clause and set the result set if id is set.
        if($id != NULL) {
            $where = array(
                array('field' => 'groupid', 'value' => $id)
            );
            $result_set = QUERY_ARRAY_ROW;
        }
        
        // Call get_data from utl_model
        return $this->util_model->get_data('exam_groups', 
                                            array(), 
                                            $where ,
                                            array(),
                                            array(),
                                            array(),
                                            $result_set
                                        );
        
    }// End func get_group
    
    
    
    /**
     * Get exam(s)
     * 
     * @access public
     * @param int $id
     * @return void
     */
    public function get_exam($id = NULL) {
        
        // Initialize where clause
        $where = array();
        $result_set = QUERY_ARRAY_RESULT;
        
        // Create where clause if id is set.
        if($id != NULL) {
            $where = array(
                array('field' => 'examid', 'value' => $id)
            );
            $result_set = QUERY_ARRAY_ROW;
        }
        
        // Call get_data from utl_model
        return $this->util_model->get_data('exams', 
                                            array(), 
                                            $where ,
                                            array(),
                                            array(),
                                            array(),
                                            $result_set
                                        );
        
    }// End func get_exam
    
    
    /**
     * Get grade(s)
     * 
     * @access public
     * @param int $id
     * @return void
     */
    public function get_grade($id = NULL) {
        
        // Initialize where clause
        $where = array();
        $result_set = QUERY_ARRAY_RESULT;
        
        // Create where clause if id is set.
        if($id != NULL) {
            $where = array(
                array('field' => 'gradeid', 'value' => $id)
            );
            
            $result_set = QUERY_ARRAY_ROW;
        }
        
        
        // Call get_data from utl_model
        return $this->util_model->get_data('grades', 
                                            array(), 
                                            $where ,
                                            array(),
                                            array(),
                                            array(),
                                            $result_set
                                        );
        
    }// End func get_grade
    
    
    /**
     * Get subject(s)
     * 
     * @access public
     * @param int $id
     * @return void
     */
    public function get_subject($id = NULL) {
        
        // Initialize where clause
        $where = array();
        $result_set = QUERY_ARRAY_RESULT;
        
        // Create where clause if id is set.
        if($id != NULL) {
            $where = array(
                array('field' => 'subid', 'value' => $id)
            );
            
            $result_set = QUERY_ARRAY_ROW;
        }
        
        
        // Call get_data from utl_model
        return $this->util_model->get_data('subjects', 
                                            array(), 
                                            $where ,
                                            array(),
                                            array(),
                                            array(),
                                            $result_set
                                        );
        
    }// End func get_subject
    
} // End class addmission_model


// End file addmission_model.php
