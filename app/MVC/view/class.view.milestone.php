<?php
/**
 * Summary ViewMilestone
 *
 * Description. gets a drop down of the current Milestones so that you can generate a spreadsheet of tasks associated with that Spreadsheet
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
