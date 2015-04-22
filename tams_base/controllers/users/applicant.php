<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH.'controllers/users/users.php';
    
/**
 * Prospective controller
 * 
 * @category   Controller
 * @package    Users
 * @subpackage Prospective
 * @author     Sule-odu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */

class Applicant extends Users{
    
    /*
     * Class constructor
     * 
     * @access public 
     * @retun void
     */        
    public function __construct(){
        
        parent::__construct();
       

    }
    
    /**
    * Index page for the prospective.	 
    */
    public function index() { 
        
        $this->check_user_type();
        
        $data = array(
            'tiles' => $this->dashboard_tiles()
        );
        
        $page_name = 'dashboard';
        $page_content = $this->load->view($this->folder_name.'/'.$page_name, $data, true);
        $this->page->build($page_content, $this->folder_name, $page_content, 'Dashboard', false);       
    }// End of func index
    
    
}