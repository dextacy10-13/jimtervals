<?php

class ControllerCurlIntervalsClient extends ControllerCurlIntervals{
    
    public $aParams;
    public $assigneeId;
    
    public function __construct(){
        
        
        ( isset($_REQUEST['assigneeId']) && is_numeric($_REQUEST['assigneeId']) ? $this->aParams[] = 'assigneeId=' . intval($_REQUEST['asigneeId'])  : null  ); //your assignee id
        
        ( isset($_REQUEST['milestone']) && is_numeric($_REQUEST['milestone']) ? $this->aParams[] = 'milestoneid=' . intval($_REQUEST['milestone'])  : null );
        
        ( isset($_REQUEST['taskid']) && is_numeric($_REQUEST['clientid']) ? $this->aParams[] = 'localid=' . intval($_REQUEST['clientid'])  : null );
        
        ( isset($_REQUEST['search']) ? $this->aParams[] = 'search=' . $_REQUEST['search']  : null );
        
        ( isset($_REQUEST['update']) ? $this->setCurlPut = true : null );
        
        $this->setApiType('json');
        $this->setCurlUrl($this->buildUrl());
        parent::__construct();
        
    }   
    
    public function buildUrl(){
        $url = 'https://api.myintervals.com/client/?'. ( implode('&amp;',$this->aParams) );
        return $url;
    }
    
    public function getCurlIntervalsClient(){
        return $this->getCurlIntervals();
    }
    
    public function setCurlPut(){
        $this->setCurlOptPut(true);
    }
}
