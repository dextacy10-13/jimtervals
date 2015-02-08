<?php
include('app/config.php');

$oViewTaskOpen = new ViewTaskOpen(new ControllerCurlIntervalsTask());
$oViewTaskOpen->getViewTaskOpen();