<?php
include_once 'Helper.php';

// Allows logout to destroy sessions
session_start();

// Unset sessions to do with loggin in and authorization
unset($_SESSION['username']);
unset($_SESSION['isAdmin']);

// Redirect (this is not a webpage)
Redirect('index.php');

?>