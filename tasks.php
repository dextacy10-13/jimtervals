<?php
include('app/config.php');

$oViewTaskSpreadsheet = new ViewTaskSpreadsheet(new ControllerCurlIntervalsTask());
$oViewTaskSpreadsheet->getViewTaskSpreadsheet();