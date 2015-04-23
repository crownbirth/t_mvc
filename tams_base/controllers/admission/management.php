<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * TAMS
 * Admission controller
 * 
 * @category   Controller
 * @package    Admission
 * @subpackage Management
 * @author     Suleodu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */
class Management extends CI_Controller {
    
    private $user_id;
    private $user_type;
    private $school_id;
    private $school_name;
    private $page_title;
    private $adm_type;
    
    /**
     * Folder Name
     * 
     * @access private
     * @var string
     */
    private $folder_name = 'admission';
    
    /**
     * Module Name
     * 
     * @access private
     * @var string
     */
    private $module_name = 'admission';
    
    
    /*
     * Class constructor
     * 
     * @access public 
     * @retun void
     */
    public function __construct() {

        parent::__construct();
       
        /*
         * Load models
         */
        $this->load->model("$this->folder_name/admission_model", 'adm_mdl');
        
        /*
         * Load language
         */
        $this->lang->load('module_admission');
        
        
        /*
         * Load helper
         */
        $this->load->helper(array('validation', 'url', 'form'));
        
        /*
         * Load Form Validation 
         */
        $this->load->library('form_validation');
        
        // Initialize class variables
        $this->user_id = $this->main->get('user_id');
        $this->user_type = $this->main->get('user_type');
        $this->school_id = $this->main->item('school_id');
        $this->school_name = $this->main->get_school_name();
        $this->page_title = "Admission Management";
        
        
    }// End func __construct
    
    
    function index(){
        $data['groups'] = $this->adm_mdl->get_group();
        $data['exams'] = $this->adm_mdl->get_exam();
        $data['grades'] = $this->adm_mdl->get_grade();
        $data['subjects'] = $this->adm_mdl->get_subject();
        $data['exam_subjects'] = $this->adm_mdl->get_exam_subject();
        $data['exam_grades'] = $this->adm_mdl->get_exam_grade();
        $data['admission'] = $this->adm_mdl->get_admission($this->school_id);
//        var_dump($data['admission']);
//        exit();
        
        $page_name = 'management';
        
        //build view pade for prospective registration 
        $page_content = $this->load->view($this->folder_name.'/management/'.$page_name, $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_group', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_exam', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_exam_subject', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_subject', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_grade', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_exam_grade', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_group', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_exam', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_subject', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_exam_subject', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_grade', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_exam_grade', $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/delete_modal', $data, true);
        
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );
    }
    
    /**
     * Create new exam group.	 
     */
    public function create_group() {
        
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'groupname'   => $form_fields['group_name'],
                    'required'   => $form_fields['group_req'],
                    'maxentries'    => $form_fields['group_max'],
                    'status'   => $form_fields['group_status']
                );
                
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_create($params, 'group');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Exam Group is', 'created', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_exam_group
    
    /**
     * Create new exam.	 
     */
    public function create_exam() {
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'groupid'   => $form_fields['exam_group'],
                    'examname'   => $form_fields['exam_name'],
                    'shortname'   => $form_fields['exam_sname'],
                    'validyears'   => $form_fields['exam_valid'],
                    'minsubject'    => $form_fields['exam_min'],
                    'scorebased'   => $form_fields['exam_score'],
                    'status'   => $form_fields['exam_status']
                );
                
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_create($params, 'exam');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Exams is', 'created', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_exam
    
    /**
     * Create new grade.	 
     */
    public function create_grade() {
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'gradename'   => $form_fields['grade_name']
                );
                
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_create($params, 'grade');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        $error_msg = $this->lang->line('adm_entry_exist');  
                        $this->main->set_notification_message(MSG_TYPE_WARNING, $error_msg);
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Grade', 'created', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_grade
    
    /**
     * Create new Exam grade.	 
     */
    public function create_exam_grade() {
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'examid'   => $form_fields['exam_id'],
                    'gradeid'   => $form_fields['exam_grade'],
                    'gradeweight' => $form_fields['grade_weight'],
                    'gradedesc'   => $form_fields['grade_desc'],
                    
                );
                
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_create($params, 'exam_grade');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        $error_msg = $this->lang->line('adm_entry_exist');  
                        $this->main->set_notification_message(MSG_TYPE_WARNING, $error_msg);
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Grade added to Exam', '', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_grade
    
    /**
     * Create new subject.	 
     */
    public function create_subject() {
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'subname'   => $form_fields['subject_name']
                );
                
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_create($params, 'subject');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        $error_msg = $this->lang->line('adm_entry_exist');  
                        $this->main->set_notification_message(MSG_TYPE_WARNING, $error_msg);
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                         $success_msg = sprintf($this->lang->line('adm_success'),'Subject is', 'created', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }        
       
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
        
    }// End of func create_subject
    
    /**
     * Create new exam subject.	 
     */
    public function create_exam_subject() {
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'examid' => $form_fields['exam_id'],
                    'subjectid'   => $form_fields['subj_id']
                );
                
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_create($params, 'exam_subject');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        $error_msg = $this->lang->line('adm_entry_exist');  
                        $this->main->set_notification_message(MSG_TYPE_WARNING, $error_msg);
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Subject added to Exam', 'created', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }        
       
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
        
    }// End of func create_exam_subject
    
    /**
     * Update  group.	 
     */
    public function update_group() {
        
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'groupname'   => $form_fields['edit_group_name'],
                    'required'   => $form_fields['edit_group_req'],
                    'maxentries'    => $form_fields['edit_group_max'],
                    'status'   => $form_fields['edit_group_status']
                );
                
                $id = $form_fields['edit_group_id'];
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_update($id, $params, 'group');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Exam Group is', 'updated', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_exam_group
    
    
    /**
     * Update new exam .	 
     */
    public function update_exam() {
        
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'groupid'   => $form_fields['exam_group'],
                    'examname'   => $form_fields['exam_name'],
                    'shortname'   => $form_fields['exam_sname'],
                    'validyears'   => $form_fields['exam_valid'],
                    'minsubject'    => $form_fields['exam_min'],
                    'scorebased'   => $form_fields['exam_score'],
                    'status'   => $form_fields['exam_status']
                );
                
                $id = $form_fields['edit_exam_id'];
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_update($id, $params, 'exam');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Exam is', 'updated', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_exam_group
    
    
    /**
     * Update new exam group.	 
     */
    public function update_subject() {
        
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'subname'   => $form_fields['subject_name']
                );
                
                $id = $form_fields['edit_subject_id'];
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_update($id, $params, 'subject');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        $error_msg = $this->lang->line('adm_entry_exist');  
                        $this->main->set_notification_message(MSG_TYPE_WARNING, $error_msg);
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Exam is', 'updated', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_exam_group
    
     /**
     * Update new Grade.	 
     */
    public function update_grade() {
        
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'gradename'   => $form_fields['grade_name']
                );
                
                $id = $form_fields['edit_grade_id'];
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_update($id, $params, 'grade');
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        $error_msg = $this->lang->line('adm_entry_exist');  
                        $this->main->set_notification_message(MSG_TYPE_WARNING, $error_msg);
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Grade is', 'updated', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_exam_group
    
    
    /**
     * Update new exam group.	 
     */
    public function update_exam_subject() {
        
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'examid' => $form_fields['exam_id'],
                    'subjectid'   => $form_fields['subj_id']
                );
                
                $id = $form_fields['edit_exam_subject_id'];
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_update($id, $params, 'exam_subject'); 
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        $error_msg = $this->lang->line('adm_entry_exist');  
                        $this->main->set_notification_message(MSG_TYPE_WARNING, $error_msg);
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Exam Subject ', 'updated', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_exam_group
    
    /**
     * Update new exam group.	 
     */
    public function update_exam_grade() {
        
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Set error to true. 
            // This should be changed only if there are no validation errors.
            $error = false;
                        
            // Get all field values.
            $form_fields = $this->input->post(NULL);
            
            // Validate form fields.
            //$error = $this->validate_fields($form_fields, $fields);
            
            // Send fields to model if there are no errors
            if(!$error) {
                $params = array(
                    'examid'   => $form_fields['exam_id'],
                    'gradeid'   => $form_fields['exam_grade'],
                    'gradeweight' => $form_fields['grade_weight'],
                    'gradedesc'   => $form_fields['grade_desc'],
                    
                );
                
                $id = $form_fields['edit_exam_grade_id'];
                // Call model method to perform insertion
                $status = $this->adm_mdl->exam_update($id, $params, 'exam_grade'); 
                
                // Process model response
                switch($status) {
                    
                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                        $error_msg = $this->lang->line('adm_entry_exist');  
                        $this->main->set_notification_message(MSG_TYPE_WARNING, $error_msg);
                        break;
                    
                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:
                        $error_msg = $this->lang->line('adm_error');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;
                    
                    // Entry created successfully.
                    case DEFAULT_SUCCESS:
                        $success_msg = sprintf($this->lang->line('adm_success'),'Exam Grade', 'updated', '');
                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                        break;
                    
                    default:
                        break;
                }
            }
            
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method');  
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
        }
        
        // Redirect to exam page, showing notifiction messages if there are.
        redirect(site_url('admission/management'));
    }// End of func create_exam_group
}