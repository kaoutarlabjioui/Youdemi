<?php

require_once dirname(__DIR__) . "\\vendor\\autoload.php";
include '../core/router.php';

session_start();

new router();
?>






