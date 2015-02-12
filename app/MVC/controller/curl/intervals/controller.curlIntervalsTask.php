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
    
    /**
     * check requests and do some validation and determine whether we are getting or setting 
     * if getting we build query string values $this->aParams[] which relate to filters here http://www.myintervals.com/api/resource.php?r=task
     * need to complete the list
     * @return <type>
     */
    public function checkRequests(){
    
        $aStrResourceKeys = array('title','search','sortfield','sortdir');        
        $aIntResourceKeys = array(
            'localid','personid','includetimerid','assigneeid','followerid','statusid','clientid','projectid','moduleid','milestoneid',
            'hasduedate','ownerid','priorityid','tasklistfilterid','overdue','excludeclosed','hastaskrelation','offset','limit'
        );
        $aDateResourceKeys = array('dateopen','datedue');
        
        foreach($aStrResourceKeys as $strResourceKey){
            ( isset($_REQUEST[$strResourceKey]) ? $this->aParams[] = $strResourceKey . '=' . Sanitize::sanitizeString($_REQUEST[$strResourceKey])  : null );
        }    
        
        foreach($aIntResourceKeys as $intResourceKey){
            ( isset($_REQUEST[$intResourceKey]) && is_numeric($_REQUEST[$intResourceKey]) ? $this->aParams[] = $intResourceKey . '=' . intval($_REQUEST[$intResourceKey])  : null  );
        }

        ( isset($_REQUEST['update']) ? $this->setCurlPut(): null );
    }
    
    /**
     * constructs the url that will be curl'ed to the api
     * @return string url
     */    
    public function buildUrl(){
        $queryString = ( isset($_REQUEST['update']) ? intval($_REQUEST['localid']) . '/' : '?' . ( implode('&',$this->aParams) ) );
        $url = INTERVALS_API_URL . '/task/' . $queryString ;        
        return $url;
    } 
    
    /**
     * gets the return data from the api
     * @return array 
     */ 
    public function getCurlIntervalsTask(){
        return $this->getCurlIntervals();
    }
    
    /**
     * if wanting to set/update a reource in the api then call this to pass PUT your data in JSON format
     * @return string url
     */ 
    public function setCurlPut(){        
        $this->setCurlOptPut(true);
        $this->setCurlPostVal(json_encode($this->getUpdateParams()));       
        
    }

    /**
     * create an aray of key => pair values that you want to use to update your Intervals reource
     * @return <type>
     */
    
    public function getUpdateParams(){
        return array('title'=>$_REQUEST['title']);
    }
}
