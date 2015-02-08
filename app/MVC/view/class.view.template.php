 <?php
/**
 * Summary ViewTemplate
 *
 * Description. simple class that includes the header and footer view file that should be extended
 *
 * @link @mr_james_myers - www.mrjamesmyers.co.uk
 * @since 02FEB2015
 *
 * @package JimTervals
 * @subpackage View Classes
 * @author James Myers
 */
abstract class ViewTemplate {
    
    public $oController;
    
    public function __construct($oController = null){
        $this->oController = $oController;
        $this->renderHeader();        
    }    
    public function __destruct(){
       $this->renderFooter();
    }
    
    public function renderHeader(){
        include 'view.header.php';
    }
    
    public function renderFooter(){
        include 'view.footer.php';
    }
}
