<table border="1">
    <tr>
        <th></th><th>Task</th><th>IT Test</th><th>OnlineTest</th><th>Passed</th><th>Failed</th><th>Merged</th><th>Dev</th><th>IT Tester</th><th>Online Tester</th><th>Notes</th>
    </tr>
<?php
$i = 1;
foreach($aTask['task'] as $task){ 
    list($summary,$testProcedure) = array_pad( explode( '[task]',$task['summary'] ,2),2,null);
    ?>    
    <tr><th><?php echo $i ?></th><th>Task<?php echo $task['localid']?> :<?php echo $task['title'] ?>  </th><th><input type="checkbox"/></th><th><input type="checkbox"/></th><th><input type="checkbox"/></th><th><input type="checkbox"/></th><th>&nbsp;</th><th><?php echo $task['assignees']?></th><th>CHANGEME</th><th>CHANGEME</th><th>CHANGEME</th></tr>
    <tr><td>&nbsp;</td><td><?php echo ( $testProcedure ? $testProcedure : $task['summary'] ) ?></td></tr>
    <?php
    ++$i;
}
?>
</table>