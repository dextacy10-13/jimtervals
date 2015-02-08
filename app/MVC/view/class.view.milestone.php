<?php
/**
 * Summary ViewTaskOpen
 *
 * Description. sorts 'Open' tasks by module and includes the view file that lists the tasks
 *
 * @link @mr_james_myers - www.mrjamesmyers.co.uk
 * @since 02FEB2015
 *
 * @package JimTervals
 * @subpackage View Classes
 * @author James Myers
 */
class ViewMilestone extends ViewTemplate{
    
    
    public function getViewMilestone(){
        
        $aMilestone = $this->oController->getCurlIntervalsMilestone();        
        
        include 'view.milestone.php';
    }
}
