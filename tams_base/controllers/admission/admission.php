 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * TAMS
 * Admission controller
 * 
 * @category   Controller
 * @package    Admission
 * @subpackage Admission
 * @author     Tunmise Akinsola <akinsolatunmise@gmail.com>, Suleodu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */
class Admission extends CI_Controller {

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
    
    private $user_id;
    private $user_type;
    private $school_id;
    private $school_name;
    private $page_title;
    private $adm_type;
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
        
        
        
    }// End func __construct
    
    /**
     * Index page for the admission module.	 
     */
    public function index() {
        
        if($this->user_type == 'admin'){
            
            redirect('admission/management');
        }else{
            redirect('admission/view_register');
        }
    }// End of func index

    
    /**
     * Prospective Registration.
     * Renamed to apply from register	 
     */
    public function apply(){
        //set page title 
        $this->page_title = 'Prospective Registration';
        
        //set session parameter 
        $session = $this->main->get('user_id');
        
        // check registration payment table to verify that 
        // the loging student has actualy make payment to proceed to registration
        $form_payment = $this->mdl->verifyRegPayment($session);
        
        if($session){
            if($form_payment){
                
                $data = $this->user_model->get_user_data();
                $data['state'] = $this->mdl->getState();
                $data['lga'] = $this->mdl->getLga();

                //Set Page name
                $page_name = 'prospective_registration';

                // check if prospective registration form is trigered 
                if($this->input->server('REQUEST_METHOD') == 'POST'){ 

                    $this->mdl->register();
                }

                //build view pade for prospective registration 
                $page_content = $this->load->view($this->folder_name.'/'.$page_name, $data, true);
                $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );
            
            }else {
                 //rediredt to Prospective dashbord if  no Registration payment 
                redirect(site_url('prospective/dashboard'));
            }
            
        }
    } // End of func register
    
    /**
     * 
     * Prospective registration page.	 
     * 
     * Removed and renamed to register from application
     * 
     * @author Tunmise Akinsola <akinsolatunmise@gmail.com>
     */
    public function application() {             
        
        // Load form helper.
        $this->load->helper('form');
        
        $page_name = 'application'; 
        $data['session'] = $this->main->get_session(); 
        
        $page_content = $this->load->view($this->folder_name.'/prospective/'.$page_name, $data, true);
        $this->page->build($page_content, $this->folder_name, $page_name, 'Application'); 
        
    }// End of func application
    
    /**
     * Removed and renamed to create_account from index
     * Process application
     */
    public function create_account() {
        
        //Set parameter to get the active admission session
        $param = array(
            'status' => "open",
            'schoolid' => $this->school_id
        );
        
        $page_name = 'create_account'; 
        
        $adm = $this->adm_mdl->get_current_admission($param);
        $data['admission'] = $adm;
        $data['school_name'] = $this->school_name;      
        $data['msg'] = '';
//        var_dump($adm);
//        exit();
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Run validation on form field data
            if($this->form_validation->run('pros_application') === TRUE) {

                // Get all field values.
                $form_fields = $this->input->post();

                // Check email and phone uniqueness
                $unique_email = $this->util_model->is_user_unique($form_fields['email'], 'email');
                $unique_phone = $this->util_model->is_user_unique($form_fields['phone'], 'phone');
                $unique_jamb = ($form_fields['jambregid'])? $this->util_model->is_user_unique($form_fields['jambregid'], 'usertypeid'): true;

                // Format post data from db operation
                $params = array(
                    'user' => array(
                        'usertypeid' => ($form_fields['jambregid']) ? $form_fields['jambregid']: '',
                        'fname'   => $form_fields['fname'],
                        'lname'   => $form_fields['lname'],
                        'mname'   => $form_fields['mname'],
                        'email'   => $form_fields['email'],
                        'phone'   => $form_fields['phone'],
                        'password' => $this->main->encrypt($form_fields['password']),
                        'schoolid' => $this->school_id,
                        'usertype' => "applicant"
                    ),                
                    'pros' => array(
                        'admtype' => $form_fields['admtype'],
                        'jambregid' => ($form_fields['jambregid'])? $form_fields['jambregid']: '',
                        
                    )
                );

                if($unique_email && $unique_phone && $unique_jamb) {
                    $status = $this->adm_mdl->create($params);

                    switch($status) {
                        case DEFAULT_ERROR:
                            $error_msg = $this->lang->line('account_faled'); 
                            $data['msg'] = '<div class="alert alert-danger">'.$error_msg. '</div>';
                            
                            break;

                        case DEFAULT_SUCCESS:
                            /**
                             * @todo Send notification email
                             */
                            
                            $success_msg = $this->lang->line('account_created');
                            $data['msg'] = '<div class="alert alert-success">'.$success_msg. '</div>';
                           
                           
                            break;
                    }
                }else {
                    
                    // Set error message for duplicate email
                    $violation = (!$unique_email)? 'email ': '';
                    $violation .= (!$unique_jamb )? 'Jamb Registration No' : '';
                    $violation .= (!$unique_jamb && !$unique_email)? 'Jamb Registration No and email' : '';
                    $violation .= (!$unique_phone && !$unique_email)? ' and phone': '';
                    
                    $error_msg = sprintf($this->lang->line('duplicate_value'), $violation);  
                    $data['msg'] = '<div class="alert alert-warning">'.$error_msg. '</div>';
                    
                }                   
            }else{
                $data['msg'] = '<div class="alert alert-warning">'.validation_errors(). '</div>';
            }
        }else{
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method'); 
           //$data['msg'] = '<span class="alert">'.$error_msg. '</span>';
           
        }
        
        $this->load->view($this->folder_name.'/prospective/'.$page_name, $data);  
        // Redirect to application page, showing notifiction messages if there are.
        //redirect(site_url('admission/create_account'));        
        
    }// End of func create_account
    
    /**
     * Process registration form submission 
     * 
     * @param int $form
     */
    public function registration_submit($form){
        
         if($this->input->server('REQUEST_METHOD') == 'POST') {
          
            switch ($form) {
                case '1':
                    /**
                     * @todo set form validation
                     */
                    
                    // Get all field values.
                    $form_fields = $this->input->post(NULL);
                    $form_fields['userid'] = $this->user_id;
                    $form_fields['formnum'] = $form;
                    
                    $config['upload_path'] = FCPATH .'/img/user';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '100';
                    $config['max_width']  = '1024';
                    $config['max_height']  = '768';
                    $config['overwrite']  = TRUE;
                    $config['file_name'] = "user_{$this->user_id}";
                   
                    $this->load->library('upload', $config);
                    
                    if($this->upload->do_upload()){
                        
                        $data = array('upload_data' => $this->upload->data());
                        
                        $status = $this->adm_mdl->register($form_fields, $form_fields['formnum']);
                        
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
                                $success_msg = sprintf($this->lang->line('adm_success'),'Prospective personal information', 'created', 'complete the Next of kin/Sponsor Details form and click save changes ');
                                $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                                break;

                            default:
                                break;

                        }
                        
                    }else{
                        // Set error message for unsussesful image upload
                        $upload_err = $this->upload->display_errors();
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $upload_err);
                        
                    }
                    
                    break;

                    
                case '2':
                    $form_fields = $this->input->post(NULL);
                    $form_fields['userid'] = $this->user_id;
                    $form_fields['formnum'] = $form;
                    
                    $status = $this->adm_mdl->register($form_fields, $form_fields['formnum']);
                    
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
                                $success_msg = sprintf($this->lang->line('adm_success'),'Prospective Next of Kin/Sponsor\'s information form', 'submitted ', 'Complete the Education Background information form and click save changes ');
                                $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                                break;

                            default:
                                break;

                        }
                    
                    break;
                
                case '3':
                    
                    $form_fields = $this->input->post(NULL);
                    
                    $form_fields['userid'] = $this->user_id;
                    $status = $this->adm_mdl->register($form_fields, $form);
                    
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
                            $success_msg = sprintf($this->lang->line('adm_success'),'Prospective UTME/DE information form', 'submitted ', 'Complete the Education Background information form and click save changes ');
                            $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                            break;

                        default:
                            break;

                        
                        }
                        
                    break;
                
                case '4':
                    $form_fields = $this->input->post(NULL);
                    $form_fields['userid'] = $this->user_id;
                    $form_fields['formnum'] = $form;
                    
                    
                    $status = $this->adm_mdl->register($form_fields, $form_fields['formnum']);
                    
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
                            $success_msg = sprintf($this->lang->line('adm_success'),'Prospective UTME/DE information form', 'submitted ', 'Complete the Education Background information form and click save changes ');
                            $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                            break;

                        default:
                            break;

                        }
                        
                    break;
                
                case '5':
                    $form_fields = $this->input->post(NULL);
                    $form_fields['userid'] = $this->user_id;
                    $form_fields['formnum'] = $form;
                    
                    $status = $this->adm_mdl->register($form_fields, $form_fields['formnum']);
                    
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
                                $success_msg = sprintf($this->lang->line('adm_success'),'Prospective Programme Choice information form', 'submitted ', 'Prospective Registration Completed');
                                $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                                break;

                            default:
                                break;

                        }
                    break;
                
                default:
                    break;
                
            }
            
        }else{  
            // Set error message for any request other than POST
            $error_msg = $this->lang->line('invalid_req_method'); 
            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
           
        }
        redirect('admission/register');
    }
   
    
    /**
     * Load the registration Form
     * 
     */
    public function register() { 
        
        $data['prospective'] = $this->adm_mdl->get_prospective($this->user_id);
        $data['users'] = $this->adm_mdl->get_user($this->user_id);
        $data['state'] = $this->adm_mdl->get_state();
        $data['programmes'] = $this->adm_mdl->get_programmes();
        $data['lga'] = $this->adm_mdl->get_lga();       
        $data['exam_group'] = $this->adm_mdl->get_exam_group();
        $data['exam_type_period'] = $this->adm_mdl->get_exam_type_period();
        $data['exam_subject'] = $this->adm_mdl->get_exam_subject();        
        $data['subject'] = $this->adm_mdl->get_subject();
        $data['exam_grade'] = $this->adm_mdl->get_exam_grade();
        $data['grade'] = $this->adm_mdl->get_grade();
                 
        
        
        $data['this_year'] = date('Y');
        $page_name = "";
        
        
        //Set Page name
        switch ($data['prospective']['rs']['formsubmit']) {
            case 0:
                $page_name = 'personal_info';
                break;
            case 1:
                $page_name = 'sponsor_info';
                break;
            case 2:
                $page_name = 'education_info';
                break;
            case 3:
                $page_name = 'utme_de_result';    
                break;
            case 4:
                $page_name = 'programme_choice';    
                break;
            case 5:
                
                redirect(base_url("admission/view_register/{$this->user_id}"));
                break;
            default:
                break;
        }
        
        $this->page_title = 'Prospective Registration';
        
        //build view pade for prospective registration 
        $page_content = $this->load->view($this->folder_name.'/prospective/'.$page_name, $data, true);
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );    
    }// End of func register
    
    
    /**
     * View Form 
     * 
     */
    public function view_reg_from($id = NULL){
        $this->load->helper('getuserpics');
        $userid = (isset($id))? $id :  $this->user_id;
        $data['url'] = get_user_pics($userid);
        $data['record'] = $this->adm_mdl->get_admission_record($userid);
        $data['olevel1'] = $this->adm_mdl->get_olevel($userid, 'first');
        $data['olevel2'] = $this->adm_mdl->get_olevel($userid, 'second');
        $data['utme'] = $this->adm_mdl->get_utme($userid);
        
        
        
        $this->page_title = 'Registration form Details';
        $page_name = 'view_form';
        //build view pade for prospective registration 
        $page_content = $this->load->view($this->folder_name.'/prospective/'.$page_name, $data, true);
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );  
        
    }
    
    
    /**
     * Load Admisssion Status 
     * 
     */
    public function admission_status() {
        
        $page_name = "admission_status";
        
        $this->page_title = 'Admission Status'; 
        
        $this->load->helper('getuserpics');
        
        $data['url'] = get_user_pics($this->user_id);
        
        $user_details = $this->util_model->get_data('users u',
                                                            array("pr1.progname as prg_chc1",
                                                                    "pr2.progname as prg_chc2",
                                                                    "u.fname", "u.lname","u.mname",
                                                                    "u.dob","u.phone","u.email",
                                                                    "u.dob", "p.admstatus","p.offered", "u.sex", "p.formsubmit"),
                                                            array(
                                                                array('field' => "u.userid", 'value' => $this->user_id)
                                                            ),
                                                            array(),
                                                            array(
                                                                array('table' => 'prospective p', 'on'=> 'p.userid = u.userid'),
                                                                array('table' => 'programmes pr1', 'on'=> 'p.prog1 = pr1.progid'),
                                                                array('table' => 'programmes pr2', 'on'=> 'p.prog2 = pr2.progid'),
                                                            ),
                                                            array(),
                                                            QUERY_ARRAY_ROW);
                                                    
        if($user_details['rs']['formsubmit'] < 5){
            redirect('admission/register');
        }
        
        $data['user_details'] = $user_details['rs'];
        
       
        
        if( isset($user_details['rs']['admstatus']) && isset($user_details['rs']['offered'])){
            
            $adm_status = $this->util_model->get_data('prospective p',
                                                            array("pr.progname as prg_offered", "admstatus"),
                                                            array(
                                                                array('field' => "p.userid", 'value' => $this->user_id)
                                                            ),
                                                            array(),
                                                            array(
                                                                array('table' => 'programmes pr', 'on' => 'p.offered = pr.progid'),
                                                            ),
                                                            array(),
                                                            QUERY_ARRAY_ROW);
            
            $data['user_details']['offered'] = $adm_status['rs']['prg_offered'];
            $data['user_details']['admstatus'] = ($adm_status['rs']['admstatus'])? $adm_status['rs']['admstatus'] : "";
           
            
        }
        
        
        
        //build view pade for prospective registration 
        $page_content = $this->load->view($this->folder_name.'/prospective/'.$page_name, $data, true);
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );   
            
    }// End of func register
}

/* End of file admission.php */

/* Location: ./application/controllers/admission.php */