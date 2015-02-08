<?php
/**
 * Summary ControllerCurlIntervalsTask
 *
 * Description. Concrete class for getting and setting Task resource information.  
 * e.g the query string ?excludeclosed=1&limit=20 will get 20 tasks that arn't closed
 * to update a task pass the update paramter and use the Task Id not the local/friendly id
 * e.g the task #2656 has the id 6045636 so to updaye the title use the query string ?taskid=6045636&update=true&title=DDDUMMYTASK
 * 
 * @link @mr_james_myers - www.mrjamesmyers.co.uk
 * @since 02FEB2015
 *
 * @package JimTervals
 * @subpackage Core Configuration Files
 * @author James Myers
 */
class ControllerCurlIntervalsTask extends ControllerCurlIntervals{
    
    public $aParams;
    public $assigneeId;
    
    public function __construct(){
        $this->checkRequests();
        $this->setApiType('json');
        $this->setCurlUrl($this->buildUrl());
        parent::__construct();
        
    }
    
    public function checkRequests(){
        ( isset($_REQUEST['assigneeId']) && is_numeric($_REQUEST['assigneeId']) ? $this->aParams[] = 'assigneeId=' . intval($_REQUEST['asigneeId'])  : null  ); //your assignee id
        
        ( isset($_REQUEST['milestone']) && is_numeric($_REQUEST['milestone']) ? $this->aParams[] = 'milestoneid=' . intval($_REQUEST['milestone'])  : null );
        
        ( isset($_REQUEST['taskid']) && is_numeric($_REQUEST['taskid']) ? $this->aParams[] = 'localid=' . intval($_REQUEST['taskid'])  : null );
        
        ( isset($_REQUEST['clientid']) && is_numeric($_REQUEST['clientid']) ? $this->aParams[] = 'clientid=' . intval($_REQUEST['clientid'])  : null );
        
        ( isset($_REQUEST['excludeclosed']) && is_numeric($_REQUEST['excludeclosed']) ? $this->aParams[] = 'excludeclosed=' . intval($_REQUEST['excludeclosed'])  : null );
        
        ( isset($_REQUEST['limit']) && is_numeric($_REQUEST['limit']) ? $this->aParams[] = 'limit=' . intval($_REQUEST['limit'])  : null );
        
        ( isset($_REQUEST['search']) ? $this->aParams[] = 'search=' . $_REQUEST['search']  : null );
        
        ( isset($_REQUEST['update']) ? $this->setCurlPut(): null );
    }
    
    /**
     * constructs the url that will be curl'ed to the api
     * @return string url
     */    
    public function buildUrl(){
        $queryString = ( isset($_REQUEST['update']) ? intval($_REQUEST['taskid']) . '/' : '?' . ( implode('&',$this->aParams) ) );
        $url = INTERVALS_API_URL . '/task/' . $queryString ;        
        return $url;
    }    
    
    public function getCurlIntervalsTask(){
        return $this->getCurlIntervals();
    }
    public function setCurlPut(){
        //echo '<h4>',json_encode($this->getUpdateParams()),'</h4>';
        $this->setCurlOptPut(true);
        $this->setCurlPostVal(json_encode($this->getUpdateParams()));       
        
    }
    
    public function getUpdateParams(){
        return array('title'=>$_REQUEST['title']);
    }
}
