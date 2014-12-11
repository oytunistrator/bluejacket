<?php
require_once 'Framework/Core/Boot.php';
$boot = new Boot;
$boot->config("Application/config/");
$boot->init();
?>
