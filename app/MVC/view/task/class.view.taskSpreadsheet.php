<?php
/**
 * Summary ViewTaskSpreadsheet
 *
 * Description. gets a list of tasks for a particular milsetone and generates a spreadshet
 *
 * @link @mr_james_myers - www.mrjamesmyers.co.uk
 * @since 02FEB2015
 *
 * @package JimTervals
 * @subpackage View Classes
 * @author James Myers
 */
class ViewTaskSpreadsheet extends ViewTemplate{
    
    
    public function getViewTaskSpreadsheet(){
        
        $aTask = $this->oController->getCurlIntervalsTask();        
        $file = 'Site-test-release-' . $aTask['task'][0]['milestone'] . '-generated.xls';
        ob_start();
            include 'view.taskSpreadsheet.php';       
            $content = ob_get_contents();
        ob_end_clean();
        header("Expires: 0");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");  header("Content-type: application/vnd.ms-excel;charset:UTF-8");
        header('Content-length: '.strlen($content));
        header('Content-disposition: attachment; filename='.basename($file));
        echo $content;
        exit;
    }
}
