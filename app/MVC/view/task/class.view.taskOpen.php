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
class ViewTaskOpen extends ViewTemplate{
    
    
    public function getViewTaskOpen(){
        
        $aTask = $this->oController->getCurlIntervalsTask();
        foreach($aTask['task'] as $task){
            $aTaskByModule[$task['module']][] = $task;
        }
        
        include 'view.taskOpen.php';
    }
}
