<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * TAMS
 * Payment controller
 * 
 * @category   Controller
 * @package    Payment
 * @subpackage 
 * @author     Sule-odu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */
class Payment extends CI_Controller {
    
/**
 * Folder Name
 * 
 * @access private
 * @var string
 */
    
    private $folder_name = 'payment';
    
/**
 * Folder Name
 * 
 * @access private
 * @var string
 */
    private $page_title = 'Payment';
    

    /*
    * Class constructor
    * 
    * @access public 
    * @retun void
    */
    public function __construct() {

        parent::__construct();
        //
        
        /*
         * Load Form Helper 
         */
        $this->load->helper('form');
        
        /*
         * Load Form Validation 
         */
        $this->load->library('form_validation');
        
        /*
         * Load language
         */
        $this->lang->load('module_payment');
        
        /*
         * Load payment model 
         */
        $this->load->model('payment/payment_model','pay_mdl' );
        
        /*
         * Load College model 
         */
        //$this->load->model('college/college_model','clg_mdl' );
        
        
        
    }
    
    
    /**
     * choose who goes to what page
     * 
     * @return void check if the current visitor is a student or prospective 
     * if student or prospective student he/sheh will will be routed to 
     * payment page else he/she will be routed to payent setup page
     */
    public function index(){
        
        //Set eligible visitor to page 
        $visitor = array('student', 'prospective');
        
        $user_type = $this->main->get("user_type");
        
        if(in_array($user_type, $visitor)){
            
            $this->myschedule();
            
        }else{
            
            $this->setup();
        }
       
        
    }//End of func index
    
    
    /*
    * Function Setup: this function handle the setting up of 
    * the payment processes 
    * 
    * @access public
    * @retun void
    */    
    public function setup(){
        $this->main->check_auth(
                                array(
                                        'payment' => array('payment','payment.setup', 'payment.setup.view'),
                                        
                                    )
                                );
        //pre load paysetup dependencies from database 
        $data['merchant'] = $this->gets('pay_merchant');
        $data['payschd'] = $this->gets('pay_schedule');
        $data['exceptions'] = $this->gets('pay_exceptions');
        $data['session'] = $this->gets('session');
        $data['payhead'] = $this->gets('pay_head');
        $data['college'] = $this->gets('college');
        $data['departments'] = $this->gets('departments');
        $data['programmes'] = $this->gets('programmes');
        $data['instalments'] = $this->gets('pay_instalment');
        $data['max_prog_duration'] = $this->pay_mdl->gets('max_prog_duration');
        
        $page_name = 'payment_management';
        
        //build view page for payment setup 
        $page_content = $this->load->view($this->folder_name.'/'.$page_name,$data,true);
        
        //build view page modlas 
        $page_content .= $this->load->view($this->folder_name.'/partials/create_merchant',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_merchant',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/view_merchant',$data,true);
        
        $page_content .= $this->load->view($this->folder_name.'/partials/create_payhead',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_payhead',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/delete_payhead',$data,true);
        
        $page_content .= $this->load->view($this->folder_name.'/partials/create_instalment',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_instalment',$data,true);
        
        $page_content .= $this->load->view($this->folder_name.'/partials/view_payschedule',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_payschedule',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_payschedule',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/delete_payschedule',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/set_penalty',$data,true);
        
        $page_content .= $this->load->view($this->folder_name.'/partials/view_exception',$data,true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_payexception',$data,true);
        
        
        
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );
        
    }
    
    
    /**
     * @access public 
     * @param type $scheduleid The schdeulid to which you want to sent exception for 
     */
    public function setexception($scheduleid){
        
        $schedule = $this->pay_mdl->gets('pay_schedule',$scheduleid);
        var_dump($schedule);
        $data['schedule'] = $schedule;
        
        $page_name = "create_exception";
       
        
        //build view page for payment 
        $page_content = $this->load->view($this->folder_name.'/create_exception',$data, true);
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );
    }
    
    /*
    * Function Setup: this function handle the setting up of 
    * the payment processes 
    * 
    * @access public 
    * @retun void
    */
    public function payinfo(){
        
        
        
        $page_name = 'payment_info';
        
        //build view page for payment 
        $page_content = $this->load->view($this->folder_name.'/'.$page_name,'',true);
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );
    }
    
    
   
    
    /*
    * Function Pay: this function handle how student make thier payment 
    * and check thier pay history
    * 
    * @name pay
    * @access public 
    * @retun void
    */
    public function myschedule(){
        
       $this->main->check_auth(
                                array(
                                        'payment' => array('payment')
                                    )
                                );
        // Set User session parameters
        if(!$this->main->get('level')){
            
            $student_details = $this->pay_mdl->gets('student_details', $this->main->item('user_id'));
            
            $this->main->set('level',  $student_details['level'] );
            $this->main->set('colid',  $student_details['colid'] );
            $this->main->set('deptid',  $student_details['deptid'] );
            $this->main->set('progid',  $student_details['progid'] );
            
        }
        
         // Get pay schedule base on the session_parameters
        $session_param = array(
                                "level" => $this->main->get('level'),
                                "colid" => $this->main->get('colid'),
                                "deptid" => $this->main->get('deptid'),
                                "progid" => $this->main->get('progid')
                            );
        
       
        $to_pay = $this->pay_mdl->gets('my_schedule');
        
     
        /*
         * Loop throug all the schedule and get the most specific for the loged in user 
         */
        for($idx = 0; $idx < count($to_pay); $idx++){
            if(
                    ($to_pay[$idx]['eligible'] == 'all' && $to_pay[$idx]['eligtype'] == 'all' && in_array($session_param['level'], json_decode($to_pay[$idx]['eliglevel']))) 
                    || 
                    ($to_pay[$idx]['eligible'] == 'college' && ($to_pay[$idx]['eligtype'] == 'all' || in_array($session_param['colid'], json_decode($to_pay[$idx]['eliglevel']))) && in_array($session_param['level'], json_decode($to_pay[$idx]['eliglevel'])))
                    ||
                    ($to_pay[$idx]['eligible'] == 'department' && ($to_pay[$idx]['eligtype'] == 'all' || in_array($session_param['deptid'], json_decode($to_pay[$idx]['eliglevel']))) && in_array($session_param['level'], json_decode($to_pay[$idx]['eliglevel'])))
                    ||
                    ($to_pay[$idx]['eligible'] == 'programme' && ($to_pay[$idx]['eligtype'] == 'all' || in_array($session_param['progid'], json_decode($to_pay[$idx]['eliglevel']))) && in_array($session_param['level'], json_decode($to_pay[$idx]['eliglevel'])))
                ){
               
                $my_pending_payment[$idx] = $to_pay[$idx];
            }
        }
        $param['userid'] = $this->main->item('user_id');
        
        $data['my_pay_schedule'] = $my_pending_payment;
        
        $data['my_pay_history'] = $this->pay_mdl->gets('my_pay_history', $param);
           
        $page_name = 'payment';
        
        //build view page for payment 
        $page_content = $this->load->view($this->folder_name.'/'.$page_name, $data, true);
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );
        
    }
    
    
    
    /*
    * Function Pay: this function handle how student make thier payment 
    * and check thier pay history
    * 
    * @name pay
    * @access public 
    * @return void
    */  
    public function paynow($scheduleid){
        
        $hist_perc = array();
        $tot = 0;
        
        
        // Set User session parameters
        if(!$this->main->get('level')){
            
            $student_details = $this->pay_mdl->gets('student_details', $this->main->item('user_id'));
            
            $this->main->set('level',  $student_details['level'] );
            $this->main->set('colid',  $student_details['colid'] );
            $this->main->set('deptid',  $student_details['deptid'] );
            $this->main->set('progid',  $student_details['progid'] );
            
        }
        
        
        //set pay history parameter
        $pay_hist_param = array(
                                "scheduleid" => $scheduleid,
                                "userid" => $this->main->item('user_id'),
                                "status" => "'APPROVED'"
                            );
        $my_pay_hist =  $this->pay_mdl->gets('my_pay_history', $pay_hist_param );
        
        
        
        // get the total sum of last payment and percentage 
        if(!empty($my_pay_hist)){
            
            foreach($my_pay_hist as $key => $val){

                $hist_perc[$key] = $my_pay_hist[$key]['percentage'];

                $tot = $tot + $my_pay_hist[$key]['percentage'];
            }    
        }
        
        // Get pay schedule base on the session_parameters
        $session_param = array( 
                                "scheduleid" => $scheduleid,
                                "level" => $this->main->get('level'),
                                "colid" => $this->main->get('colid'),
                                "deptid" => $this->main->get('deptid'),
                                "progid" => $this->main->get('progid')
                            );
        
    
        $schedule = $this->pay_mdl->gets('pay_schedule', $session_param['scheduleid']);
        
        /*
         *  check if schedule have exceptions
         */
        if($schedule['exceptions'] == 'Yes'){
            
            $excep = $this->pay_mdl->gets('my_pay_exception', $session_param);
            
            if(is_array($excep) && !empty($excep)){
                
                foreach($excep  as $key => $value){
                 
                    if($excep[$key]['unittype'] == 'programme'){

                        $to_pay = array();
                        array_push($to_pay, $excep[$key]);

                        break;

                    }elseif($excep[$key]['unittype'] == 'department'){

                        $to_pay = array();
                        array_push($to_pay, $excep[$key]);

                        break;

                    }elseif($excep[$key]['unittype'] == 'college'){

                        $to_pay = array();
                        array_push($to_pay, $excep[$key]);

                        break; 
                    }   

                }
                
                $my_paying = array(
                                "schedule_id" => $to_pay[0]['scheduleid'],
                                "schedule_type" => $to_pay[0]['type'],
                                "exception_id" => $to_pay[0]['exceptionid'],
                                "session_name" => $to_pay[0]['sesname'],
                                "paying_amount" => $to_pay[0]['ex_amount'],
                                "school_id" => $to_pay[0]['schoolid'],
                                "session_id" => $this->main->item('cur_session'),
                                "adm_status" => $to_pay[0]['admstatus'],
                                "level" => $to_pay[0]['level'],
                                "payer_type" => $to_pay[0]['payertype'],
                                "total_percent_paid" => $tot
                             );
                $percentage_arr = explode(':', $to_pay[0]['percentage']);

                $a = $hist_perc;
                $b = $percentage_arr;

                foreach ($a as $key => $value) {
                    foreach($b as $k => $v){
                        if($value == $v){
                            unset($b[$k]);
                            break;
                        }
                    }
                }
               $my_paying['percentage'] = $b;
               
            }else{
                
                $to_pay = array();
                array_push($to_pay, $schedule);

                $my_paying = array(
                                    "schedule_id" => $to_pay[0]['scheduleid'],
                                    "schedule_type" => $to_pay[0]['type'],
                                    "exception_id" => NULL,
                                    "session_name" => $to_pay[0]['sesname'],
                                    "paying_amount" => $to_pay[0]['amount'],
                                    "school_id" => $to_pay[0]['schoolid'],
                                    "adm_status" => NULL,
                                    "level" => NULL,
                                    "payer_type" => NULL,
                                    "total_percent_paid" => $tot
                                 );
                $percentage_arr = explode(':', $to_pay[0]['percentage']);

                $a = $hist_perc;
                $b = $percentage_arr;

                foreach ($a as $key => $value) {
                    foreach($b as $k => $v){
                        if($value == $v){
                            unset($b[$k]);
                            break;
                        }
                    }
                }

                $my_paying['percentage'] = $b;
            }
        }else{
            
            $to_pay = array();
            array_push($to_pay, $schedule);
            
            $my_paying = array(
                                "schedule_id" => $to_pay[0]['scheduleid'],
                                "schedule_type" => $to_pay[0]['type'],
                                "exception_id" => NULL,
                                "session_name" => $to_pay[0]['sesname'],
                                "session_id" => $this->main->item('cur_session'),
                                "paying_amount" => $to_pay[0]['amount'],
                                "school_id" => $to_pay[0]['schoolid'],
                                "adm_status" => NULL,
                                "level" => NULL,
                                "payer_type" => NULL,
                                "total_percent_paid" => $tot
                             );
            $percentage_arr = explode(':', $to_pay[0]['percentage']);
            
            $a = $hist_perc;
            $b = $percentage_arr;

            foreach ($a as $key => $value) {
                foreach($b as $k => $v){
                    if($value == $v){
                        unset($b[$k]);
                        break;
                    }
                }
            }
            
            $my_paying['percentage'] = $b;
        }
        
        $data['my_paying'] = $my_paying;
        
        
        
        
        
        $page_name = 'paynow';
        
        //build view page for pay Now 
        $page_content = $this->load->view($this->folder_name.'/'.$page_name, $data, true);
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title ); 
        
        
        
    }
    
    
    
    /**
     * Generate invoice of the specified payment
     * @access public
     * @name $invoice
     * @return void 
     */
    public function invoice(){
        
        $page_name = 'invoice';
        
        $this->load->helper('num2word');
        
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            // Get Student details
            $data['student_details'] = $this->pay_mdl->gets('student_details', $this->main->item('user_id'));
            
            // Get all form field values.
            $form_fields = $this->input->post(NULL);
            $pay_param = array(
                        'percent' => $form_fields['percent'],
                        'schoolid' => $form_fields['schoolid'],
                        'scheduleid' => $form_fields['scheduleid'],
                        'scheduletype' => $form_fields['scheduletype'],
                        'sessionname' => $form_fields['sessionname'],
                        'sessionid' => $form_fields['sessionid'],
                        'amount' => $form_fields['amount'],
                        'amount2word'=> convert_number_to_words((double)$form_fields['amount'])
                        );
            $data['form_fields'] = $pay_param;
            
            //build view page for Payment Invoice  
            $page_content = $this->load->view($this->folder_name.'/'.$page_name, $data, true);
            $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title ); 
        }
        else{

           // Set error message for any request other than POST
           $error_msg = $this->lang->line('invalid_req_method');  
           $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg, TRUE);   
           
           $this->index();
        }
             
        
    }
    
    
   
    
    /**
     * @description This Controler function do all the oeration
     *              that has to do with insertion into the database.
     * @name $Sets.
     * 
     * @param type $what
     * 
     * @return type NULL
     */
    public function sets($what){
        $this->main->check_auth(
                                array(
                                        'payment' => array('payment','payment.setup.create'),
                                        
                                    )
                                );
        switch ($what) {
            case 'merchant':
                
                // Check if user have permission to perform this operation 
                if($this->main->has_perm('payment', 'payment.setup.create.merchant')){
                    
                    // Check for valid request method
                    if($this->input->server('REQUEST_METHOD') == 'POST') {
                        
                        $config = array(
                                    array(
                                          'field'   => 'marchname',
                                          'label'   => 'Marchant Name',
                                          'rules'   => 'required'
                                       ),
                                    array(
                                          'field'   => 'contact',
                                          'label'   => 'Contact Person',
                                          'rules'   => 'required'
                                       ),
                                    array(
                                          'field'   => 'phone',
                                          'label'   => 'Phone Number',
                                          'rules'   => 'required | numeric | integer | is_natural'
                                       ),   
                                    array(
                                          'field'   => 'email',
                                          'label'   => 'Email',
                                          'rules'   => 'required | valid_email'
                                       )
                                );

                        $this->form_validation->set_rules($config);
                        
                        if ($this->form_validation->run() == FALSE){
                            
                            // Set error message for form validation 
                            // Error and specify the field with error 
                            $error_valid_msg = validation_errors();  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                            
                        }
                        else{
                            
                            // Get all field values.
                            $form_fields = $this->input->post(NULL);
                            
                                $params = array(        
                                    'merchname' => $form_fields['marchname'],
                                    'schoolid' =>$this->main->item('school_id'),
                                    'contact' => $form_fields['contact'],
                                    'phone' => $form_fields['phone'],
                                    'email' => $form_fields['email'],
                                    'remark' => $form_fields['remark']   
                                );

                                // Call model method to perform insertion
                                $status = $this->pay_mdl->create('merchant', $params);

                                // Process model response
                                switch($status) {

                                    // Unique constraint violated.
                                    case DEFAULT_EXIST:
                                        $error_msg = sprintf($this->lang->line('pay_entry_exist'), 'Merchant '.$param['merchname']);  
                                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                        break;

                                    // There was a problem creating the entry.
                                    case DEFAULT_ERROR:
                                        $error_msg = $this->lang->line('pay_error');  
                                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                        break;

                                    // Entry created successfully.
                                    case DEFAULT_SUCCESS:
                                         $success_msg = sprintf($this->lang->line('pay_success'),'Merchant '.$params['merchname'], 'created');
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

                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('payment/setup'));
                    
                }
                else{
                    // Set error message for permission restriction 
                    $error_msg = $this->lang->line('access_denied');  
                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                    
                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('payment/setup'));

                }
                
            break;
                
                
            case 'payhead':
                
                if($this->main->has_perm('payment', 'payment.setup.create.payhead')) {
                    
                    // Check for valid request method
                    if($this->input->server('REQUEST_METHOD') == 'POST') {
                        
                        $config = array(
                            array(
                                  'field'   => 'type',
                                  'label'   => 'Pay Schedule Type',
                                  'rules'   => 'required'
                               )
                            );
                        
                        $this->form_validation->set_rules($config);
                        
                        if ($this->form_validation->run() == FALSE){
                            
                            // Set error message for form validation 
                            // Error and specify the field with error 
                            $error_valid_msg = validation_errors();  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                            
                        }else{
                            
                            // Get all field values.
                            $form_fields = $this->input->post(NULL);

                            // Validate form fields.

                            // Send fields to model if there are no errors

                            $params = array(
                                'type' => $form_fields['type'],
                                'schoolid' =>$this->main->item('school_id')
                            );


                            // Call model method to perform insertion
                            $status = $this->pay_mdl->create('payhead', $params);

                            // Process model response
                            switch($status) {

                                // Unique constraint violated.
                                case DEFAULT_EXIST:
                                    // Set warning message for duplicate entry
                                    $error_msg = sprintf($this->lang->line('pay_entry_exist'),$form_fields['type']);  
                                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                    break;

                                
                                // There was a problem creating the entry.
                                case DEFAULT_ERROR:
                                    
                                        $error_msg = $this->lang->line('pay_error');  
                                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                    break;

                                
                                // Entry created successfully.
                                case DEFAULT_SUCCESS:
                                        
                                        $success_msg = sprintf($this->lang->line('pay_success'), $form_fields['type'], "created");  
                                        $this->main->set_notification_message(MSG_TYPE_SUCCESS, $success_msg);
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
                
                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('payment/setup'));
                    
                }
                else{
                   
                    // Set error message for permission restriction 
                    $error_msg = $this->lang->line('access_denied');  
                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                    
                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('payment/setup'));
                }
                
                break;
            
                
            case 'schedule':
                    if($this->main->has_perm('payment', 'payment.setup.create.payshedule')){
                        
                        if($this->input->server('REQUEST_METHOD') == 'POST') {
                        
                        $config = array(
                            array(
                                  'field'   => 'session',
                                  'label'   => 'Session',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'payhead',
                                  'label'   => 'Pay Head',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'instalment',
                                  'label'   => 'Instalment',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'amount',
                                  'label'   => 'Amount',
                                  'rules'   => 'required |numeric'
                               ),
                            array(
                                  'field'   => 'pamount',
                                  'label'   => 'Penalty',
                                  'rules'   => 'required |numeric'
                               ),
                            array(
                                  'field'   => 'unittype[]',
                                  'label'   => 'Pay. Specification',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'level[]',
                                  'label'   => 'Level',
                                  'rules'   => 'required'
                               ),
                             array(
                                  'field'   => 'type',
                                  'label'   => 'Schedule Type',
                                  'rules'   => 'required'
                               )
                            
                         );

                        $this->form_validation->set_rules($config);
                        
                        if ($this->form_validation->run() == FALSE){
                            
                            // Set error message for form validation 
                            // Error and specify the field with error 
                            $error_valid_msg = validation_errors();  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                            
                        }else{
                            
                                // Get all field values.
                                $form_fields = $this->input->post(NULL);
                                
                                if($form_fields['unittype'] != 'all'){
                                    for($i = 0; $i < count($form_fields['unitname']); $i++ ){
                                        
                                        $unit_name_arry[$i] = $form_fields['unitname'][$i];
                                    }
                                    $unit_name = json_encode($unit_name_arry);
                                    
                                }
                                else{
                                    
                                   $unit_name = 'all'; 
                                }
                                
                                
                                for($i = 0; $i < count($form_fields['level']); $i++ ){
                                        
                                        $level_arry[$i] = $form_fields['level'][$i];
                                    }
                                    $level = json_encode($level_arry);
                                
                                
                                $params = array( 
                                    'schoolid' => $this->main->get('school_id'),
                                    'sesid' => $form_fields['session'],
                                    'payheadid' => $form_fields['payhead'],
                                    'scheduletype' => $form_fields['scheduletype'],
                                    'instid' => $form_fields['instalment'],
                                    'eligible' => $form_fields['unittype'],
                                    'eligtype' => $unit_name,
                                    'eliglevel' => $level,
                                    'amount' => $form_fields['amount'],
                                    'penalty' => $form_fields['pamount']
                                );


                                // Call model method to perform insertion
                                $status = $this->pay_mdl->create('pay_schedule' , $params );

                                // Process model response
                                switch($status) {

                                    // Unique constraint violated.
                                    case DEFAULT_EXIST:
                                        
                                        // Set warning message for duplicate entry
                                        $error_msg = sprintf($this->lang->line('entry_exist'),'');  
                                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                        break;

                                    
                                    // There was a problem creating the entry.
                                    case DEFAULT_ERROR:
                                        
                                        $error_msg = $this->lang->line('pay_error');  
                                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                        break;

                                    
                                    // Entry created successfully.
                                    case DEFAULT_SUCCESS:
                                        
                                         $success_msg = sprintf($this->lang->line('pay_success'),'Schedule', 'created');
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
                    
                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('payment/setup'));
                    
                    }else{
                        
                        // Set error message for permission restriction 
                        $error_msg = $this->lang->line('access_denied');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);

                        // Redirect to payment set, showing notifiction messages if there are.
                        redirect(site_url('payment/setup'));

                    }
                    
                    
                break;
                
                
            
            case 'exception':
                if($this->main->has_perm('payment', 'payment.setup.create.payexception')){
                  
                    if($this->input->server('REQUEST_METHOD') == 'POST') {
                    
                        $config = array(
                                        array(
                                              'field'   => 'payschedule',
                                              'label'   => 'Pay Schedule',
                                              'rules'   => 'required'
                                           ),
                                        array(
                                              'field'   => 'unittype',
                                              'label'   => 'Unit Type',
                                              'rules'   => 'required'
                                           ),
                                        array(
                                              'field'   => 'unitname',
                                              'label'   => 'Unit Name',
                                              'rules'   => 'required'
                                           ),   
                                        array(
                                              'field'   => 'level',
                                              'label'   => 'Level',
                                              'rules'   => 'required'
                                           )
                                     );

                        $this->form_validation->set_rules($config);
                    
                        if($this->form_validation->run() == FALSE){

                            // Set error message for form validation 
                            // Error and specify the field with error 
                            $error_valid_msg = validation_errors();  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);

                        }else{

                            // Get all field values.
                            $form_fields = $this->input->post(NULL);

                            $j = 0;
                            do{

                                for($i = 0; $i < count($form_fields['unitname']); $i++ ){

                                    $params = array(        
                                            'scheduleid' => $form_fields['payschedule'],
                                            'unittype' => $form_fields['unittype'],
                                            'unitid' => $form_fields['unitname'][$i],
                                            'instid' => $form_fields['instalment'],
                                            'level' => $form_fields['level'][$j],
                                            'payertype' => $form_fields['indigene_status'],
                                            'admstatus' => $form_fields['adm_status'],
                                            'amount' => $form_fields['amount']  

                                        );

                                    //var_dump($params);

                                    // Call model method to perform insertion
                                    $status = $this->pay_mdl->create('pay_exception' , $params );

                                    // Process model response
                                    switch($status) {

                                        // Unique constraint violated.
                                        case DEFAULT_EXIST:

                                            // Set warning message for duplicate entry
                                            $error_msg = sprintf($this->lang->line('pay_entry_exist'),'');  
                                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                            break;


                                        // There was a problem creating the entry.
                                        case DEFAULT_ERROR:

                                            break;


                                        // Entry created successfully.
                                        case DEFAULT_SUCCESS:

                                             $success_msg = sprintf($this->lang->line('pay_success'),'Exception', 'Added to pay Schedule');
                                            $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);

                                            break;


                                        default:
                                            break;
                                    }
                                }

                                $j++;

                            }while($j < count($form_fields['level']));       

                        }

                    }else{
                        // Set error message for any request other than POST
                        $error_msg = $this->lang->line('invalid_req_method');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                    }

                    // Redirect to payment setup, showing notifiction messages if there are.
                    redirect(site_url('payment/setup'));
                
                }
                else{
                    
                    // Set error message for permission restriction 
                    $error_msg = $this->lang->line('access_denied');  
                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                    
                    // Redirect to payment setup, showing notifiction messages if there are.
                    redirect(site_url('payment/setup'));
                    
                }
                
                
                break;
                
            
            case 'instalment':
                if($this->main->has_perm('payment', 'payment.setup.create.payinstalment')){
                   
                    if($this->input->server('REQUEST_METHOD') == 'POST'){
                  
                    $config = array(
                            array(
                                'field'   => 'unit',
                                'label'   => 'Unit',
                                'rules'   => 'required|integer'
                             ),
                            array(
                                  'field'   => 'percentage[]',
                                  'label'   => 'Percentage',
                                  'rules'   => 'required|numeric'
                               ),
                        );
                    
                    $this->form_validation->set_rules($config);
                    
                    // Get all field values.
                    $form_fields = $this->input->post(NULL);
                    
                    if($this->form_validation->run() == FALSE){
                        
                        // Set error message for form validation 
                        // Error and specify the field with error 
                        $error_valid_msg = validation_errors();  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                        
                    }
                    else{
                        
                        $total_set_percentage = array_sum($form_fields['percentage']);
                        
                        if($total_set_percentage != 100){
                            
                            $error_percentage_msg = $this->lang->line('pay_instal_percent_error');
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_percentage_msg);
                            
                        }
                        elseif($form_fields['unit'] < 1){
                            
                            $error_unit = $this->lang->line('pay_instal_unit');
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_percentage_msg);
                            
                        }else{
                            
                           $pstg =  implode(':', $form_fields['percentage']);
                           
                            $params = array(        
                                        'unit' => $form_fields['unit'],
                                        'percentage' => $pstg, 
                                        'schoolid' => $this->main->get('school_id'),
                                    );
                           
                            // Call model method to perform insertion
                            $status = $this->pay_mdl->create('pay_instalment' , $params );

                            // Process model response
                            switch($status) {

                                // Unique constraint violated.
                                case DEFAULT_EXIST:

                                    // Set warning message for duplicate entry
                                    $error_msg = sprintf($this->lang->line('pay_entry_exist'),'Pay Instalment '.$params['percentage']);  
                                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                    break;


                                // There was a problem creating the entry.
                                case DEFAULT_ERROR:

                                    break;


                                // Entry created successfully.
                                case DEFAULT_SUCCESS:

                                     $success_msg = sprintf($this->lang->line('pay_success'),'Instalment '.$params['percentage'], 'Added to pay Instalment');
                                    $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);

                                    break;


                                default:
                                    break;
                            }
                        }
                    }
                    
                }else{
                    
                    //Set error message for any request other than POST
                    $error_msg = $this->lang->line('invalid_req_method');  
                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                }
                
                // Redirect to payment set, showing notifiction messages if there are.
                redirect(site_url('payment/setup'));
                    
                }else{
                   
                    // Set error message for permission restriction 
                    $error_msg = $this->lang->line('access_denied');  
                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                    
                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('payment/setup'));
                }
                
                
                break;
                
            default:
                break;
        }
    }
    
    
    
     /**
     * This Controler function do all the operation that has to do with  fetching data from database.
     * @name gets().
     * 
     * @param type String $what,  array $param
     * 
     * @return type Object Array
     */
    
    public function gets($what, $param = NULL){
        $result = '';
        
        switch ($what) {
            
            case 'session':
                
                $result = $this->pay_mdl->gets('session');
                
                break;
            
            
            
            case 'pay_merchant':
                
                $result = $this->pay_mdl->gets('merchant');
                break;
            
            
            
            case 'pay_head':
                
                $result = $this->pay_mdl->gets('pay_head');
                break;
            
            
            
            case 'college':
                
                    $result = $this->pay_mdl->gets('college');
                break;
            
            
            
            case 'programmes':
                
                    $result = $this->pay_mdl->gets('programmes');
                break;
            
            
            case 'departments':
            
                    $result = $this->pay_mdl->gets('departments');
                break;
            
            
            
            case 'pay_schedule':
                
                if(isset($param) && $param != NULL){

                    $result = $this->pay_mdl->gets('pay_schedule', $param);
                    
                }else{
                    
                    $result = $this->pay_mdl->gets('pay_schedule');
                }
                    
                break;
            
            
            case 'pay_instalment':
                
                    $result = $this->pay_mdl->gets('pay_instalments');
                break;
            
            
            case 'pay_exceptions':
                
                    $result = $this->pay_mdl->gets('pay_exception');
                break;
            
            
            case 'student_details':
                    
                    $result = $this->pay_mdl->gets('student_details', $this->main->get('user_type_id'));
                
                break;
            
            
//            case 'what_to_pay':
//                    if(isset($param) && is_array($param)){
//                        
//                        $result = $this->pay_mdl->gets('what_to_pay', $param );
//                    }
//                    
//                break;
//            

            
//            case 'new_schedule':
//                
//                    if(isset($param) && is_array($param)){
//                        
//                        $result = $this->pay_mdl->gets('new_schedule', $param);
//                    }
//                break;
//            
            
//            case 'my_pay_exception':
//                
//                    if(isset($param) && is_array($param)){
//                        
//                        $result = $this->pay_mdl->gets('my_pay_exception', $param );
//                    }
//                    
//                break;
              
                
//            case 'my_pay_history': 
//                
//                    if(isset($param) && is_array($param)){
//                        
//                        $result = $this->pay_mdl->gets('my_pay_history', $param );
//                    }
//                    
//                break;
//            
                
//            case 'my_schedule':
//                   
//                    $result = $this->pay_mdl->gets('my_schedule');
//                break;
                
            default:
                break;
        }
        
        return $result;
    }
    
    
    
    /**
     * @description This Controler function handles the operation
     *              that has to do with  Updating data on database.
     * @name update().
     * 
     * @param type String $what,  array $param
     * 
     * @return type NULL
     */
    public function update($what, $id = NULL){
        
        switch ($what) {
            case 'merchant':
                
                    // Check for valid request method
                    if($this->input->server('REQUEST_METHOD') == 'POST') {
                        
                        $config = array(
                            array(
                                  'field'   => 'marchname',
                                  'label'   => 'Marchant Name',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'contact',
                                  'label'   => 'Contact Person',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'phone',
                                  'label'   => 'Phone Number',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'email',
                                  'label'   => 'Email',
                                  'rules'   => 'required | valid_email'
                               )
                         );

                        $this->form_validation->set_rules($config);
                        
                        if ($this->form_validation->run() == FALSE){
                            
                            // Set error message for form validation 
                            // Error and specify the field with error 
                            $error_valid_msg = validation_errors();  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                            
                        }else{
                            
                            // Get all field values.
                            $form_fields = $this->input->post(NULL);
                            
                                $params = array(        
                                    'merchname' => $form_fields['marchname'],
                                    'contact' => $form_fields['contact'],
                                    'schoolid' =>$this->main->item('school_id'),
                                    'phone' => $form_fields['phone'],
                                    'email' => $form_fields['email'],
                                    'remark' => $form_fields['remark'], 
                                    'mid' => $form_fields['mid']
                                );
                                
                                

                                // Call model method to perform update
                                $status = $this->pay_mdl->update('merchant', $params);

                                // Process model response
                                switch($status) {

                                    // Unique constraint violated.
                                    case DEFAULT_EXIST:
                                            $nochange_made_msg = sprintf($this->lang->line('pay_nochanges'),'Merchant '.$form_fields['marchname'] );  
                                            $this->main->set_notification_message(MSG_TYPE_ERROR, $nochange_made_msg);
                                        break;

                                    // There was a problem creating the entry.
                                    case DEFAULT_ERROR:
                                        
                                            $error_msg = $this->lang->line('pay_error');  
                                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                        break;

                                    // Entry created successfully.
                                    case DEFAULT_SUCCESS:
                                        
                                            $success_msg = sprintf($this->lang->line('pay_success'),'Merchant '.$params['merchname'], 'Updated');
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

                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('setup/payment/setup'));
                
            break;
                
                
            case 'payhead':
                
                // Check for valid request method
                    if($this->input->server('REQUEST_METHOD') == 'POST') {
                        
                        $config = array(
                                    array(
                                          'field'   => 'type',
                                          'label'   => 'Pay Schedule Type',
                                          'rules'   => 'required'
                                       )
                                    );
                        
                        $this->form_validation->set_rules($config);
                        
                        if ($this->form_validation->run() == FALSE){
                            
                            // Set error message for form validation 
                            // Error and specify the field with error 
                            $error_valid_msg = validation_errors();  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                            
                        }
                        else{
                            // Get all field values.
                            $form_fields = $this->input->post(NULL);
                            
                                $params = array(        
                                    'type' => $form_fields['type'],
                                    'payheadid' => $form_fields['id']
                                );
                            
                            // Call model method to perform update
                                $status = $this->pay_mdl->update('pay_head', $params);

                                // Process model response
                                switch($status) {

                                    // Unique constraint violated.
                                    case DEFAULT_EXIST:
                                            $nochange_made_msg = sprintf($this->lang->line('pay_entry_exist'),'Pay Head '.$form_fields['type'] );  
                                            $this->main->set_notification_message(MSG_TYPE_ERROR, $nochange_made_msg);
                                        break;

                                    // There was a problem creating the entry.
                                    case DEFAULT_ERROR:
                                        
                                            $error_msg = $this->lang->line('pay_error');  
                                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                        break;

                                    // Entry created successfully.
                                    case DEFAULT_SUCCESS:
                                        
                                            $success_msg = sprintf($this->lang->line('pay_success'),'Pay Head '.$params['type'], 'Updated');
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
                
                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('setup/payment/setup'));
                break;
            
                
            case 'schedule':
                
                    if($this->input->server('REQUEST_METHOD') == 'POST') {
                        $config = array(
                            array(
                                  'field'   => 'session',
                                  'label'   => 'Session',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'payhead',
                                  'label'   => 'Pay Head',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'instalment',
                                  'label'   => 'Instalment',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'amount',
                                  'label'   => 'Amount',
                                  'rules'   => 'required |numeric'
                               )
                         );

                        $this->form_validation->set_rules($config);
                        
                        if ($this->form_validation->run() == FALSE){
                            
                            // Set error message for form validation 
                            // Error and specify the field with error 
                            $error_valid_msg = validation_errors();  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                            
                        }else{
                            
                            // Get all field values.
                            $form_fields = $this->input->post(NULL);

                                $params = array(        
                                    'sesid' => $form_fields['session'],
                                    'payheadid' => $form_fields['payhead'],
                                    'instid' => $form_fields['instalment'],
                                    'amount' => $form_fields['amount'],
                                    'scheduleid' => $form_fields['id']
                                        
                                );


                                // Call model method to perform insertion
                                $status = $this->pay_mdl->update('pay_schedule' , $params );

                                // Process model response
                                switch($status) {

                                    // Unique constraint violated.
                                    case DEFAULT_EXIST:
                                        
                                        // Set warning message for duplicate entry
                                        $error_msg = sprintf($this->lang->line('entry_exist'),'');  
                                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                        break;

                                    
                                    // There was a problem creating the entry.
                                    case DEFAULT_ERROR:
                                        
                                        break;

                                    
                                    // Entry created successfully.
                                    case DEFAULT_SUCCESS:
                                        
                                         $success_msg = sprintf($this->lang->line('success'),'Schedule', 'created');
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
                    
                    // Redirect to payment set, showing notifiction messages if there are.
                    redirect(site_url('setup/payment/setup'));
                break;
                
                
            
            case 'exception':
                
                if($this->input->server('REQUEST_METHOD') == 'POST') {
                    
                        $config = array(
                            array(
                                  'field'   => 'payschedule',
                                  'label'   => 'Pay Schedule',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'unittype',
                                  'label'   => 'Unit Type',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'unitname',
                                  'label'   => 'Unit Name',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'level',
                                  'label'   => 'Level',
                                  'rules'   => 'required'
                               )
                         );

                    $this->form_validation->set_rules($config);
                    
                    if($this->form_validation->run() == FALSE){
                        
                        // Set error message for form validation 
                        // Error and specify the field with error 
                        $error_valid_msg = validation_errors();  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                        
                    }else{
                        
                        // Get all field values.
                        $form_fields = $this->input->post(NULL);

                        $j = 0;
                        do{

                            for($i = 0; $i < count($form_fields['unitname']); $i++ ){

                                $params = array(        
                                        'scheduleid' => $form_fields['payschedule'],
                                        'unittype' => $form_fields['unittype'],
                                        'unitid' => $form_fields['unitname'][$i],
                                        'instid' => $form_fields['instalment'],
                                        'level' => $form_fields['level'][$j],
                                        'payertype' => $form_fields['indigene_status'],
                                        'admstatus' => $form_fields['adm_status'],
                                        'amount' => $form_fields['amount']    
                                    );
                                
                                    //var_dump($params);

                                    // Call model method to perform insertion
                                $status = $this->pay_mdl->create('pay_exception' , $params );

                                // Process model response
                                switch($status) {

                                    // Unique constraint violated.
                                    case DEFAULT_EXIST:
                                        
                                        // Set warning message for duplicate entry
                                        $error_msg = sprintf($this->lang->line('entry_exist'),'');  
                                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                        break;

                                    
                                    // There was a problem creating the entry.
                                    case DEFAULT_ERROR:
                                        
                                        break;

                                    
                                    // Entry created successfully.
                                    case DEFAULT_SUCCESS:
                                        
                                         $success_msg = sprintf($this->lang->line('success'),'Exception', 'Added tp pay Schedule');
                                        $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);
                                        
                                        break;

                                    
                                    default:
                                        break;
                                }
                            }

                            $j++;

                        }while($j < count($form_fields['level']));       
                                
                    }
                
                }else{
                    // Set error message for any request other than POST
                        $error_msg = $this->lang->line('invalid_req_method');  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                }
                    
                // Redirect to payment set, showing notifiction messages if there are.
                redirect(site_url('setup/payment/setup'));
                
                break;
                
            
            case 'instalment':
                
                if($this->input->server('REQUEST_METHOD') == 'POST'){
                  
                    $config = array(
                            array(
                                'field'   => 'unit',
                                'label'   => 'Unit',
                                'rules'   => 'required|integer'
                             ),
                            array(
                                  'field'   => 'percentage[]',
                                  'label'   => 'Percentage',
                                  'rules'   => 'required|numeric'
                               ),
                        );
                    
                    $this->form_validation->set_rules($config);
                    
                    // Get all field values.
                    $form_fields = $this->input->post(NULL);
                    
                    if($this->form_validation->run() == FALSE){
                        
                        // Set error message for form validation 
                        // Error and specify the field with error 
                        $error_valid_msg = validation_errors();  
                        $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);
                        
                    }
                    else{
                        
                        $total_set_percentage = array_sum($form_fields['percentage']);
                        
                        if($total_set_percentage != 100){
                            
                            $error_percentage_msg = $this->lang->line('pay_instal_percent_error');
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_percentage_msg);
                            
                        }
                        elseif($form_fields['unit'] < 1){
                            
                            $error_unit = $this->lang->line('pay_instal_unit');
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_percentage_msg);
                            
                        }else{
                            
                           $pstg =  implode(' : ', $form_fields['percentage']);
                           
                            $params = array(        
                                        'unit' => $form_fields['unit'],
                                        'percentage' => $pstg,  
                                    );
                           
                            // Call model method to perform insertion
                            $status = $this->pay_mdl->create('pay_instalment' , $params );

                            // Process model response
                            switch($status) {

                                // Unique constraint violated.
                                case DEFAULT_EXIST:

                                    // Set warning message for duplicate entry
                                    $error_msg = sprintf($this->lang->line('pay_entry_exist'),'Pay Instalment '.$params['percentage']);  
                                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                                    break;


                                // There was a problem creating the entry.
                                case DEFAULT_ERROR:

                                    break;


                                // Entry created successfully.
                                case DEFAULT_SUCCESS:

                                     $success_msg = sprintf($this->lang->line('pay_success'),'Instalment '.$params['percentage'], 'Added to pay Instalment');
                                    $this->main->set_notification_message(MSG_TYPE_SUCCESS,$success_msg);

                                    break;


                                default:
                                    break;
                            }
                        }
                    }
                    
                }else{
                    
                    //Set error message for any request other than POST
                    $error_msg = $this->lang->line('invalid_req_method');  
                    $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                }
                
                // Redirect to payment set, showing notifiction messages if there are.
                redirect(site_url('setup/payment/setup'));
                
                break;
                
            default:
                break;
        }
    }
    
    
    
    /**
     * 
     * @description This function handles the Delete operation 
     * 
     * @name deletes.
     * 
     * @param string $what
     * @param array $param
     * 
     * @return NULL
     */
    public function delete($what, $param = NULL){
        
        switch ($what) {
            case $value:


                break;

            default:
                break;
        }
    }
    
    
    public function activate_penalty(){
        // Check for valid request method
        if($this->input->server('REQUEST_METHOD') == 'POST') {

            $config = array(
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Penalty Status',
                                  'rules'   => 'required'
                               )
                        );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE){

                /*
                 * Set error message for form validation 
                 * Error and specify the field with error  
                 */
                $error_valid_msg = validation_errors();  
                $this->main->set_notification_message(MSG_TYPE_ERROR, $error_valid_msg);

            }
            else{

                // Get all field values.
                $form_fields = $this->input->post(NULL);

                $params = array(        
                                'penalty_status' => $form_fields['status'],
                                'scheduleid' => $form_fields['schedule_id']
                            );



                // Call model method to perform update
                $status = $this->pay_mdl->update('schedule_penalty', $params);

                // Process model response
                switch($status) {

                    // Unique constraint violated.
                    case DEFAULT_EXIST:
                            $nochange_made_msg = sprintf($this->lang->line('pay_nochanges'),'Merchant '.$form_fields['marchname'] );  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $nochange_made_msg);
                        break;

                    // There was a problem creating the entry.
                    case DEFAULT_ERROR:

                            $error_msg = $this->lang->line('pay_error');  
                            $this->main->set_notification_message(MSG_TYPE_ERROR, $error_msg);
                        break;

                    // Entry created successfully.
                    case DEFAULT_SUCCESS:

                            $success_msg = sprintf($this->lang->line('pay_success'),'Penalty', 'Activated ');
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

        // Redirect to payment set, showing notifiction messages if there are.
        redirect(site_url('setup/payment/setup'));
    }
}