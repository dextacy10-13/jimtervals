<table>
  <?php
  foreach(array_keys($aTaskByModule) as $key){ 
    foreach($aTaskByModule[$key] as $task){ ?>
        <tr style="color:#<?php echo $task['color']?>"><th>Task <?php echo $task['localid']?> - <?php echo $task['id']?>:<input type="text" value="<?php echo $task['module'] ?> - <?php echo $task['title'] ?>" id="inputTitle-<?php echo $task['id']?>" name="inputTitle-<?php echo $task['id']?>" /><a onclick="intervalsTask.saveTitle(<?php echo $task['id']?>)" >Save Title</a></th></tr>
    <?php
    }
  }?>
  </table>