<?php
include_once 'MyHeader.php';
include_once 'Helper.php';

session_start();
session_destroy();

Redirect('index.php');

?>