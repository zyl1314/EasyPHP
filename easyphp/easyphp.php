<?php

require(APP_PATH . 'config/config.php');
require(APP_PATH . 'easyphp/core.php');

$core = new Core($allow);
$core->run(); 