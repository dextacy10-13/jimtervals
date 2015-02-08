<?php
include('app/config.php');

$oViewMilestone = new ViewMilestone(new ControllerCurlIntervalsMilestone());
$oViewMilestone->getViewMilestone();