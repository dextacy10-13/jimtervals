<?php
/**
 * Summary config.php
 *
 * Description. core definitions, such as Intervals API details
 *
 * @link @mr_james_myers - www.mrjamesmyers.co.uk
 * @since 02FEB2015
 *
 * @package JimTervals
 * @subpackage Core Configuration Files
 * @author James Myers
 */
define('INTERVALS_API_KEY', ''); // YOU NEED TO ENTER API KEY HERE
define('INTERVALS_API_URL', 'https://api.myintervals.com');
define('CA_CERT', 'C:\Wamp\www\jimtervals\cacert.pem'); // THIS IS CA Certificate from http://curl.haxx.se/docs/caextract.html 
include('utilsLoader.php');