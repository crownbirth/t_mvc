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
        
        
        
    }// End func __construct
    
    
    function index(){
        $data['groups'] = $this->adm_mdl->get_group();
        $data['exams'] = $this->adm_mdl->get_exam();
        $data['grades'] = $this->adm_mdl->get_grade();
        $data['subjects'] = $this->adm_mdl->get_subject();
        
        $page_name = 'management';
        
        //build view pade for prospective registration 
        $page_content = $this->load->view($this->folder_name.'/management/'.$page_name, $data, true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_group', "", true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_exam', "", true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_subject', "", true);
        $page_content .= $this->load->view($this->folder_name.'/partials/edit_grade', "", true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_group', "", true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_exam', "", true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_subject', "", true);
        $page_content .= $this->load->view($this->folder_name.'/partials/create_grade', "", true);
        $page_content .= $this->load->view($this->folder_name.'/partials/delete_modal', "", true);
        
        $this->page->build($page_content, $this->folder_name, $page_name, $this->page_title );
    }
}