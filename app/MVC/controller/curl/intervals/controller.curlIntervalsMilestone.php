<?php

class ControllerCurlIntervalsMilestone extends ControllerCurlIntervals{
    
    public function __construct(){
        
        $this->setApiType('json');
        $this->setCurlUrl($this->buildUrl());
        parent::__construct();
        
    }   
    
    public function buildUrl(){
        $url = "https://api.myintervals.com/milestone/?sortdir=ASC&limit=20&complete=false";
        return $url;
    }
    
    public function getCurlIntervalsMilestone(){
        return $this->getCurlIntervals();
    }
}
