<?php
include ('interface/interface.curl.php');
/**
 * Summary abstract ControllerCurl
 *
 * Description. Abstract class for regular Curl functionality.  Extend this file and use the Setters to determine how you want to Curl API's and/or URLS.
 *
 * @link @mr_james_myers - www.mrjamesmyers.co.uk
 * @since 02FEB2015
 *
 * @package JimTervals
 * @subpackage Core Configuration Files
 * @author James Myers
 */
abstract class ControllerCurl implements iCurl{
    
    public $curlUrl;
    public $curlOptPost;
    public $curlOptPut;
    public $postVal;
    public $curlReferer;
    
    public $curlOptReturnTransfer;
    public $curlOptUserPwd;
    public $curlOptHttpHeader;
    public $curlOptCaInfo;
    
    public $curlOptConnectTimeout;
    public $curlOptTimeout;
    
    public $curlResponse;
    
    public $ch;
    
    public function __construct(){      
		$this->doTheCurl();
    }

    /**
     * The brunt of the Curl Class.  This checks to see what has been set and does the Curl based on the the concret class extensions
     */    
    public function doTheCurl(){
        
        // create a new cURL resource
        $this->ch = curl_init();
        
        curl_setopt($this->ch, CURLOPT_URL, $this->curlUrl);
        
        curl_setopt($this->ch, CURLOPT_VERBOSE, 1);

        if($this->curlOptReturnTransfer)
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, $this->curlOptReturnTransfer);
        
        if($this->curlOptUserPwd)
            curl_setopt($this->ch, CURLOPT_USERPWD, $this->curlOptUserPwd);
        
        if($this->curlOptHttpHeader)
            curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->curlOptHttpHeader); //application/xml is also a valid header
        
        if($this->curlOptCaInfo)
            curl_setopt ($this->ch, CURLOPT_CAINFO, $this->curlOptCaInfo);
                
        if($this->curlOptConnectTimeout)
            curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $this->curlOptConnectTimeout);
        
        if($this->curlOptTimeout)
            curl_setopt($this->ch, CURLOPT_TIMEOUT, $this->curlOptTimeout);
        
        if($this->curlOptPost){			
            curl_setopt($this->ch, CURLOPT_POST, true);            
        }
        
        if($this->curlOptPut){           
            curl_setopt($this->ch, CURLOPT_PUT, true);
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);			
        }
		
		if($this->postVal){

            //write the put string to a temp file, since curl PUT has to read from a file
            $putData = tmpfile();
            fwrite($putData, $this->postVal);
            fseek($putData, 0);
            curl_setopt($this->ch, CURLOPT_INFILE, $putData);
           
            curl_setopt($this->ch, CURLOPT_INFILESIZE, strlen($this->postVal));
		}
		
		
		if($this->curlReferer)
			curl_setopt($this->ch, CURLOPT_REFERER, $this->curlReferer);

		ob_start();
		curl_exec($this->ch);
		$this->curlResponse = ob_get_contents();
		ob_end_clean();
		
		$httpcode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
		$info = curl_getinfo($this->ch);
 
		//check for curl errors
		if( curl_errno($this->ch) ){
			$this->curlError = curl_error($this->ch);
            echo '<h1>',$this->curlError,'</h1>';
			
		}
		// close cURL resource, and free up system resources
		curl_close($this->ch);		
		
        
    }
    /**
     * 
     * @return curl response JSON/XML object 
     */
    
    public function getCurlApi(){
        return $this->curlResponse;
    
    }
    /**
     * setters
     */
    
    public function setCurlUrl($curlUrl){$this->curlUrl = $curlUrl;}
    public function setCurlOptPost($curlOptPost){$this->curlOptPost = $curlOptPost;}
    public function setCurlOptPut($curlOptPut){$this->curlOptPut = $curlOptPut;}
    public function setCurlPostVal($postVal){$this->postVal = $postVal;}
    public function setCurlReferer($curlReferer){$this->curlReferer = $curlReferer;}
    
    public function setCurlOptReturnTransfer($curlOptReturnTransfer){$this->curlOptReturnTransfer = $curlOptReturnTransfer;}
    public function setCurlOptUserPwd($curlOptUserPwd){$this->curlOptUserPwd = $curlOptUserPwd;}
    public function setCurlOptHttpHeader($curlOptHttpHeader){$this->curlOptHttpHeader = $curlOptHttpHeader;}
    public function setCurlOptCatInfo($curlOptCaInfo){$this->curlOptCaInfo = $curlOptCaInfo;}
    
    public function setCurlOptConnectTimeOut($curlOptConnectTimeout){$this->curlOptConnectTimeout = $curlOptConnectTimeout;}
    public function setCurlOptTimeout($curlOptTimeout){$this->curlOptTimeout = $curlOptTimeout;}
    
}