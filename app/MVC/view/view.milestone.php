<select onchange="window.location = $(this).val();">
<?php
foreach($aMilestone['milestone'] as $milestone){
 ?><option value="/tasks.php?milestone=<?php echo $milestone['id'] ?>&xl=true"><?php echo $milestone['title'] ?> - <?php echo $milestone['project'] ?></option><?php
}
?></select>