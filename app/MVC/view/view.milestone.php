<select onchange="($(this).val()!=0? window.location = $(this).val():null);">
<option value="0">select a milestone</option>
<?php
foreach($aMilestone['milestone'] as $milestone){
 ?><option value="/tasks.php?milestone=<?php echo $milestone['id'] ?>&xl=true"><?php echo $milestone['title'] ?> - <?php echo $milestone['project'] ?></option><?php
}
?></select>