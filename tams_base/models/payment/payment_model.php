<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * TAMS
 * Payment Model
 * 
 * @category   Model
 * @package    Payment
 * @subpackage 
 * @author     Sule-odu Adedayo <suleodu.adedayo@gmail.com>
 * @copyright  Copyright © 2014 TAMS.
 * @version    1.0.0
 * @since      File available since Release 1.0.0
 */

class Payment_model extends CI_Model{
    
    
    /**
     * Class constructor for payment Model
     * 
     * @access public
     * @return void
     */
    public function __construct() {
        
        parent::__construct();
        $this->load->database();
        
       
    }//end of constructor 
    
    
    /**
     * Create a new Payment Options
     * 
     * @access public
     * @param array $params, string $type
     * @return void
     */
    public function create($type, $params){
        
        switch ($type) {
            
            case 'merchant':
                
                // Check if an entry exists with thesame posted marchant details
                $array = array(
                                'merchname' => $params['merchname'],
                                'contact' => $params['contact'],
                                'schoolid' =>$params['schoolid'],
                                'phone' => $params['phone'],
                                'email' => $params['email'],
                                'remark' => $params['remark']
                            );
                
                $this->db->like($array);
                $query = $this->db->get('pay_merchant');
                
                // Set status 
                if($query->num_rows() > 0) {
                    
                    $status = DEFAULT_EXIST;
                    
                }elseif($this->db->insert('pay_merchant', $params)) {
                    
                    $status = DEFAULT_SUCCESS;
                    
                }else{

                    DEFAULT_ERROR;
                }
                
                break;
                
                
            case 'pay_schedule':
                
                    // Check for an entry exists with the same 'schedule'
                    $array = array(
                            'schoolid' => $params['schoolid'],
                            'sesid'=> $params['sesid'],
                            'payheadid' => $params['payheadid'],
                            'instid' => $params['instid'],
                            'eligible' => $params['eligible'],
                            'eligtype' => $params['eligtype'],
                            'eliglevel' => $params['eliglevel'],
                            'amount' => $params['amount'],
                            'penalty' => $params['penalty']
                        );

                    $this->db->like($array);
                    $query = $this->db->get('pay_schedule');

                    // if Entry exist in the database
                    if($query->num_rows() > 0) { 

                        $status = DEFAULT_EXIST; 

                    }
                    elseif($this->db->insert('pay_schedule', $params)) {

                        $status = DEFAULT_SUCCESS;
                        
                    }
                    else{

                        $status = DEFAULT_ERROR;

                    }
                
                break;
                
                
            case 'payhead':
                
                    // Check to an entry exists with the same 'merchname' 
                    $array = array(
                        'schoolid' => $params['schoolid'],
                        'type' => $params['type']
                    );
                
                
                    $this->db->like($array);
                    $query = $this->db->get('pay_head');

                    // Set status 
                    if($query->num_rows() > 0) {

                        $status = DEFAULT_EXIST;

                    }elseif($this->db->insert('pay_head', $array)) {

                        $status = DEFAULT_SUCCESS;

                    }else{

                        DEFAULT_ERROR;
                    }
                
                break;
                
                
            case 'pay_instalment':
                
                    // Check to an entry exists with the same 'merchname' 
                    $this->db->like('percentage', $params['percentage']);
                    $this->db->like('unit', $params['unit']);
                    $this->db->like('schoolid', $param['schoolid']);
                    $query = $this->db->get('pay_instalment');
                    
                    // Set status 
                    if($query->num_rows() > 0) { 
                        
                        $status = DEFAULT_EXIST;

                    }elseif($this->db->insert('pay_instalment', $params)) {

                        $status = DEFAULT_SUCCESS;

                    }else{

                        $status = DEFAULT_ERROR;
                    }
                    
                break;
            
                
            case 'pay_exception':
                    // Check for an entry exists with the same 'exception'
                    $array = array(
                            'scheduleid'=> $params['scheduleid'],
                            'unittype' => $params['unittype'], 
                            'unitid' => $params['unitid'], 
                            'instid' => $params['instid'], 
                            'level' => $params['level'], 
                            'payertype' => $params['payertype'], 
                            'admstatus' => $params['admstatus'],
                            'amount' => $params['amount']
                            
                        );
                
                    $this->db->like($array);
                    $query = $this->db->get('pay_exception');

                    //If exception already exist in the database 
                    if($query->num_rows() > 0) {
                        
                        $status = DEFAULT_EXIST;

                    }
                    elseif($this->db->insert('pay_exception', $params)) {
                        
                        $this->db->where('scheduleid', $array['scheduleid']);
                        $this->db->update('pay_schedule', array('exceptions' => 'Yes'));
                        
                        $status = DEFAULT_SUCCESS;
                        
                    }else{
                        
                        $status = DEFAULT_ERROR;
                        
                    }
                    
                break;
                
              
            case 'pay_transaction':
                
                $array = array(
                                'userid' => $params['user_id'],
                                'scheduleid' => $params['schedule_id'],
                                'sesid' =>$params['sesid'],
                                'exceptionid' => $params['exception_id'],
                                'can_name' => $params['can_name'],
                                'reference' => $params['reference'],
                                'penalty' => $params['penalty'],
                                'year' => $params['year'],
                                'ordid' => $params['oder_id'],
                                'date_time' => $params['date_time'],
                                'status' => $params['status'],
                                'date_time' => $params['date_time'],
                                'sessionid' => $params['session_id'],
                                'gatewayurl' => $params['gateway'],
                                'percentage' => $params['percentage'], 
                                'pay_desc' => $params['pay_desc']
                                
                            );
                
                if($this->db->insert('pay_transactions', $array)){
                    
                 $status = DEFAULT_SUCCESS;
                    
                }else{

                    DEFAULT_ERROR;
                }
                
                break;
            
            
            default:
                break;
        }
        
        return $status;
        
    }// End of func create
    
    
    /**
     * Update an payment setups
     * 
     * @access public
     * @param int $id, array $params, string $type
     * @return void
     */
    public function update($type, $params, $id=NULL) {
 
        switch ($type) {
            
            case 'merchant':
                
                // Check if an entry exists with thesame posted marchant details
                $array = array(
                                'merchname' => $params['merchname'],
                                'contact' => $params['contact'],
                                'phone' => $params['phone'],
                                'email' => $params['email'],
                                'remark' => $params['remark']
                            );
                
                $this->db->like($array);
                $this->db->like(array('mid' => $params['mid']));
                $query = $this->db->get('pay_merchant');
                
                // if found marchante with the posted parameters  
                if($query->num_rows() > 0) {
                    
                    $status = DEFAULT_EXIST;
                    
                }elseif($this->db->update('pay_merchant', $array, array('mid' => $params['mid']))) {
                    
                        $status = DEFAULT_SUCCESS;
                }else{
                    
                    $status = DEFAULT_ERROR;
                }
                           
                break;
                
                
            case 'pay_schedule':
                
                // Check if an entry exists with thesame posted marchant details
                $array = array(
                                'sesid' => $params['sesid'],
                                'payheadid' => $params['payheadid'],
                                'instid' => $params['instid'],
                                'amount' => $params['amount']
                            );
                
                $this->db->like($array);
                $this->db->like(array('scheduleid' => $params['scheduleid']));
                $query = $this->db->get('pay_schedule');
                
                // if found marchante with the posted parameters  
                if($query->num_rows() > 0) {
                    
                    $status = DEFAULT_EXIST;
                    
                }elseif($this->db->update('pay_schedule', $params, array('scheduleid' => $params['scheduleid']))) {
                    
                        $status = DEFAULT_SUCCESS;
                }else{
                    
                    $status = DEFAULT_ERROR;
                }
                
                
                break;
                
                
            case 'pay_head':
                
                
                $query = $this->db->get_where('pay_head', $params);
                
                // if found marchante with the posted parameters  
                if($query->num_rows() > 0) {
                    
                    $status = DEFAULT_EXIST;
                    
                }
                elseif($this->db->update('pay_head', $params)) {
                    
                    $status = DEFAULT_SUCCESS;
                }
                else{
                    
                    $status = DEFAULT_ERROR;
                }
                
                break; 
             
                
            case 'schedule_penalty':
                
                if($this->db->update('pay_schedule', $params, array('scheduleid' => $params['scheduleid']))) {
                    
                        $status = DEFAULT_SUCCESS;
                }else{
                    
                    $status = DEFAULT_ERROR;
                }
                           
                break; 
                
                
            case 'pay_transaction':
                    //format data to conform to the table structure
                    $trans_param = array(
                                'status' => $params['status'],
                                'amt' => $params['amt'],
                                'resp_code' =>($params['resp_code'])? $params['resp_code']:'' ,
                                'resp_desc' => ($params['resp_desc']) ? $params['resp_desc'] : '',
                                'auth_code' => ($params['auth_code']) ? $params['auth_code'] : '',
                                'pan' => ($params['pan'])? $params['pan'] : '',
                                'xml'=> ($params['xml']) ? $params['xml'] : '',
                                'name' => ($params['name']) ? $params['name'] : ''
                            );
                
                    if($this->db->update('pay_transactions', $params, array('ordid' => $params['ordid']))) {
                    
                        $status = DEFAULT_SUCCESS;
                    }else{

                        $status = DEFAULT_ERROR;
                    }
                
                break;
                
                
            default:
                
                break;
        }

        return $status;
        
    }// End func update
   
    
    
    
    /**
     * Delete  payment setups
     * 
     * @access public
     * @param int $id, string $type
     * @return void
     */
    public function delete($table, $param) {
        
        $status = DEFAULT_ERROR;
        $ret;
        
        switch ($table) {
            
            case 'payhead':
                if($this->db->delete('pay_head', array('payheadid' => $param['id'])))
                    $status = DEFAULT_SUCCESS;
                break;
                
            case 'payschedule':
                if($this->db->delete('pay_schedule', array('id' => $id)))
                    $status = DEFAULT_SUCCESS;
                break;    
            default:
                
                break;
        }

        return $status;
    }// End func delete

    
    
 
    /**
     * Gets
     * 
     * @access public
     * @param string, int||array()
     * @return array()
     */
    public function gets($type, $param = NULL){
        $result = "";
        
        switch ($type) {
            
            case 'session':
                
                $query = $this->db->get('session');
                $result = $query->result_array();
                
                break;
            
            
            case 'merchant':
                $query = $this->db->get('pay_merchant');
                $result = $query->result_array();
                break;
            
            
            case 'college':
                $query = $this->db->get('colleges');
                $result = $query->result_array();
                break;
            
            
            case 'departments':
                
                if(isset($param) && $param != NULL){
                    
                    $this->db->where('deptid', $param);
                    $query = $this->db->get('departments');
                    $result = $query->result_array();
                    
                }else{
                    
                    $query = $this->db->get('departments');
                    $result = $query->result_array();
                    
                }
                break;
            
            
            case 'programmes':
                
                if(isset($param) && $param != NULL){
                    
                    $this->db->where('progid', $param);
                    $query = $this->db->get('programmes');
                    $result = $query->result_array();
                    
                }else{
                    
                    $query = $this->db->get('programmes');
                    $result = $query->result_array();
                }
                
                break;
                
                
            case 'pay_head' :
                
                
                $query = $this->db->get('pay_head');
                $result = $query->result_array();
                
                break;
            
            
            case 'pay_schedule':
                
                if(isset($param) && $param != NULL){
                    $prep_query  =  sprintf("SELECT sh.*, sh.scheduleid, s.sesname, ph.type, inst.percentage, sh.amount "
                                            . "FROM tams_pay_schedule sh, tams_session s, tams_pay_head ph, tams_pay_instalment inst "
                                            . "WHERE sh.sesid = s.sesid "
                                            . "AND sh.payheadid = ph.payheadid "
                                            . "AND sh.instid = inst.instid "
                                            . "AND usertype = '%s' "
                                            . "AND sh.scheduleid = %s "
                                            . "ORDER BY sh.scheduleid DESC ", 
                                            $param['usertype'], 
                                            $param['scheduleid']);
                                    $query = $this->db->query($prep_query);
                                    $result = $query->row_array();
                
                }else{
                    
                    $query = $this->db->query(
                               "SELECT sh.*, sh.scheduleid, s.sesname, ph.type, inst.percentage, sh.amount
                                FROM tams_pay_schedule sh, tams_session s, 
                                tams_pay_head ph, tams_pay_instalment inst
                                WHERE sh.sesid = s.sesid
                                AND sh.payheadid = ph.payheadid
                                AND sh.instid = inst.instid ORDER BY sh.scheduleid DESC"
                            );
                    $result = $query->result_array();
                
                }
                
                break;
                
            
            case 'my_schedule':
                
                    $prep_query = "SELECT SUM(tr.percentage) AS total_paid, ph.type, s.sesname, tr.userid, sh.* "
                                . "FROM tams_pay_schedule sh "
                                . "LEFT JOIN tams_pay_transactions tr ON tr.scheduleid = sh.scheduleid "
                                . "AND tr.status = 'APPROVED' "
                                . "LEFT JOIN tams_pay_head ph ON  ph.payheadid = sh.payheadid "
                                . "LEFT JOIN tams_session s ON s.sesid = sh.sesid "
                                . "GROUP BY sh.scheduleid "
                                . "HAVING total_paid < 100  "
                                . "OR total_Paid IS NULL ";
                    $query = $this->db->query($prep_query);
                    
                    $result = $query->result_array();
                    
                break;
            
            
            
            case 'max_prog_duration':
                
                    $this->db->select_max('duration', 'duration');
                    $query = $this->db->get('programmes');
                    $result = $query->row_array();
                    
                break;
            
            
            case 'pay_instalments':
                    
                    if(isset($param) && $param != NULL){
                        
                       $query = $this->db->get_where('pay_instalment', array('instid' => $param));
                       $result = $query->row_array();  
                       
                    }else{
                        
                        $query = $this->db->get('pay_instalment');
                        $result = $query->result_array();
                    }
                    
                    
                break;
                
                
            case 'student_details':
                
                    if(isset($param) && $param != NULL){
                       
                        $this->db->select('*');
                        $this->db->from('users');
                        $this->db->join('students','students.userid = users.userid');
                        $this->db->join('programmes','programmes.progid = students.progid');
                        $this->db->join('departments', 'departments.deptid = programmes.deptid');
                        $this->db->join('colleges', 'colleges.colid = departments.colid');
                        $this->db->where('users.userid', $param);
                        $query = $this->db->get();
                        $result = $query->row_array();
                    }
                    
                break;
                
            
            case 'pay_exception':
                
                if(isset($param) && $param != NULL){
                    
                    $query = $this->db->query("SELECT ex.*, ex.amount AS ex_amount, sh.* , p.type, s.sesname, inst.percentage, (
                                            CASE ex.unittype
                                                WHEN 'college'
                                                THEN (
                                                    SELECT colname
                                                    FROM tams_colleges
                                                    WHERE colid = ex.unitid
                                                    )
                                                WHEN 'department'
                                                THEN (
                                                    SELECT deptname
                                                    FROM tams_departments
                                                    WHERE deptid = ex.unitid
                                                    )
                                                WHEN 'programme'
                                                THEN (
                                                    SELECT progname
                                                    FROM tams_programmes
                                                    WHERE progid = ex.unitid
                                                    )
                                                ELSE 
                                                ''
                                            END
                                            ) AS me
                                            FROM tams_pay_exception ex, tams_pay_schedule sh, tams_session s, tams_pay_head p, tams_pay_instalment inst
                                            WHERE ex.scheduleid = sh.scheduleid
                                            AND sh.payheadid = p.payheadid
                                            AND sh.sesid = s.sesid
                                            AND sh.instid = inst.instid 
                                            AND ex.scheduleid = {$param}"
                                                                   );
                    $result = $query->result_array();
                }else{
                    
                    $query = $this->db->query("SELECT ex.*,ex.amount AS ex_amount, sh.*, p.type, s.sesname, inst.percentage, (
                                            CASE ex.unittype
                                                WHEN 'college'
                                                THEN (
                                                    SELECT colname
                                                    FROM tams_colleges
                                                    WHERE colid = ex.unitid
                                                    )
                                                WHEN 'department'
                                                THEN (
                                                    SELECT deptname
                                                    FROM tams_departments
                                                    WHERE deptid = ex.unitid
                                                    )
                                                WHEN 'programme'
                                                THEN (
                                                    SELECT progname
                                                    FROM tams_programmes
                                                    WHERE progid = ex.unitid
                                                    )
                                                ELSE 
                                                ''
                                            END
                                            ) AS me
                                            FROM tams_pay_exception ex, tams_pay_schedule sh, tams_session s, tams_pay_head p, tams_pay_instalment inst
                                            WHERE ex.scheduleid = sh.scheduleid
                                            AND sh.payheadid = p.payheadid
                                            AND sh.sesid = s.sesid
                                            AND sh.instid = inst.instid "
                                                                   );
                    $result = $query->result_array();
                }
                   
                    
                break;
                
                
            case 'my_pay_exception':

                    if(isset($param) && is_array($param)){

                        $prep_query = sprintf("SELECT ex.*, ex.amount AS ex_amount , sh.*, s.sesname, ph.type, inst.percentage "
                                                . "FROM tams_pay_exception ex, tams_pay_instalment inst, "
                                                . "tams_pay_schedule sh, tams_session s, tams_pay_head ph "
                                                . "WHERE ex.instid = inst.instid "
                                                . "AND ph.payheadid = sh.payheadid "
                                                . "AND sh.sesid = s.sesid "
                                                . "AND ex.scheduleid = %s "
                                                . "AND ex.scheduleid = sh.scheduleid  "
                                                . "AND "
                                                . "("
                                                . "(unittype = 'programme' AND unitid = %s ) "
                                                . "OR (unittype = 'department' AND unitid = %s ) "
                                                . "OR (unittype = 'college' AND unitid = %s ) "
                                                . ")"
                                                . "AND level = %s "
                                                . "ORDER BY unittype DESC ",
                                                $param['scheduleid'], $param['progid'], 
                                                $param['deptid'],$param['colid'],
                                                $param['level']
                                                );

                       $query = $this->db->query($prep_query);
                       $result = $query->result_array();
                    }

                    break;
                    

            case 'my_pay_history':
                
                if(isset($param) && is_array($param)){
                    if(isset($param['status'])){
                        $prep_query = sprintf("SELECT tr.*, se.sesname, ph.type "
                                        . "FROM tams_pay_transactions tr, tams_session se, "
                                        . "tams_pay_schedule ps, tams_pay_head ph "
                                        . "WHERE tr.scheduleid = ps.scheduleid "
                                        . "AND ps.payheadid = ph.payheadid "
                                        . "AND ps.sesid = se.sesid "
                                        . "AND tr.scheduleid = %s "
                                        . "AND tr.status = %s "
                                        . "AND tr.userid = %s ",
                                        $param['scheduleid'],
                                        $param['status'],
                                        $param['userid']);
                    }else{
                        $prep_query = sprintf("SELECT tr.*, se.sesname, ph.type "
                                        . "FROM tams_pay_transactions tr, tams_session se, "
                                        . "tams_pay_schedule ps, tams_pay_head ph "
                                        . "WHERE tr.scheduleid = ps.scheduleid "
                                        . "AND ps.payheadid = ph.payheadid "
                                        . "AND ps.sesid = se.sesid "
                                        . "AND tr.userid = %s ",
                                        $param['userid']);
                    }
                    
                    $query = $this->db->query($prep_query);
                    $result = $query->result_array();
                    
                }else{
                    
                    $result = DEFAULT_ERROR;
                }

                break;
                

            case 'new_schedule':
                
                 if(isset($param) && is_array($param)){
                     
                    $prep_query = sprintf("SELECT SUM(tr.percentage) AS total_paid, ph.type,s.sesname, tr.usertypeid, sh.* "
                                        . "FROM tams_pay_schedule sh "
                                        . "JOIN tams_pay_transactions tr "
                                        . "ON tr.scheduleid = sh.scheduleid "
                                        . "AND tr.userid = %s "
                                        . "AND tr.status = 'APPROVED' "
                                        . "LEFT JOIN tams_pay_head ph "
                                        . "ON ph.payheadid = sh.payheadid "
                                        . "LEFT JOIN tams_session s "
                                        . "ON s.sesid = sh.sesid "
                                        . "GROUP BY tr.usertypeid "
                                        . "HAVING total_paid < 100 ",
                                        $param['userid']);
                    $query = $this->db->query($prep_query);
                    $result = $query->result_array();
                    }
                break;
                
            case 'pay_transaction':
                
                $query = $this->db->get_where('pay_transactions', array('ordid' => $param['ordid']));
                $result = $query->result_array();
                 
                break;
                
            default:
                    break;

            } 
            
        return $result;  
    } // End of function gets
    
    
    public function sch1($usertype){
        $this->db->select('*');
        $this->db->from('pay_schedule');
        $this->db->where('pay_schedule.usertype', $usertype);
        $query = $this->db->get();
        
        $result = $query->result_array();
        
        return $result;
    }
}

