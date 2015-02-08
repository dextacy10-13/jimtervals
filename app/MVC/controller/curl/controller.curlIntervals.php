<?php
/**
 * Summary abstract ControllerCurlIntervals
 *
 * Description. Abstract class for Curl'ing Intervals API.  Extend this file and use the Setters to determine how you want to Curl API's and/or URLS.
 * Generally you extend this file and use the concrete class to decide the resource that you want to Curl e.g milestone or task etc
 * Determine whether you want to use XML or JSON to poll the Intervals API
 *
 * @link @mr_james_myers - www.mrjamesmyers.co.uk
 * @since 02FEB2015
 *
 * @package JimTervals
 * @subpackage Core Configuration Files
 * @author James Myers
 */
abstract class ControllerCurlIntervals extends ControllerCurl{

    public $apiType;
   
    public function __construct(){        
        $this->setCurlOpts();
        parent::__construct();
    }   
    
    public function setApiType($apiType){
        $this->apiType = $apiType;
    }
    
    public function setCurlOpts(){    
  
        $this->setCurlOptUserPwd( INTERVALS_API_KEY . ':X');
        $this->setCurlOptHttpHeader( $this->getCurlOptHttpHeader($this->apiType) );
    
        if(CA_CERT)
            $this->setCurlOptCatInfo(CA_CERT);
        
        $this->setCurlOptConnectTimeOut(60);
        $this->setCurlOptTimeout(60);		
        
    }
    
    public function getCurlIntervals(){
    
        return $this->getCurlApiType($this->apiType);
    
    }
    
    public function getCurlApiType($type){
        switch($type){
            case 'json' :
                return json_decode($this->getCurlApi(),true);
                break;
            case 'xml' :
                //fall through
            default :
                return $this->getCurlApi();
            break;
        }
    }
    
    public function getCurlOptHttpHeader($type){
        switch($type){
            
            case 'xml':
                $httpHeader = array('Accept: application/xml','Content-Type: application/xml');
                break;
            case 'json':
                //fall through so default to JSON
            default :
                $httpHeader = array('Accept: application/json','Content-Type: application/json');
                break;
            
        }
        return $httpHeader;
    }
}