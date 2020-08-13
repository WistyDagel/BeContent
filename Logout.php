<?php
include_once 'Helper.php';

session_start();
session_destroy();

Redirect('index.php');

?>