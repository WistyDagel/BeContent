<?php
session_start(); // Must be first, prior to any HTML. Session will expire

include_once "dbConnector.php";
include_once "Helper.php";

?>

<?php 


// Check for Priv setting
if (!isset($_SESSION["isAdmin"])) {
    $_SESSION["isAdmin"] = 0; // Set default
}

// Check for style setting
$myStyle = "1";
if (isset($_SESSION["MyStyle"])) {
    $myStyle = $_SESSION["MyStyle"];
} else {
    // Set default style
    $_SESSION["MyStyle"] = $myStyle;
}

$myTitle = "Be Content";
$MyHeader = "Be Content with Your Content";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta content="text/html; charset=ISO-8859-1"  http-equiv="content-type">
  <title><?php echo $myTitle ?></title>

    <?php
    // Set style page
    switch ($myStyle) {
        case "1":
            echo '<link rel="stylesheet" href="/BeContent/LightTheme.css">';
            break;
        case "2":
            echo '<link rel="stylesheet" href="/BeContent/DarkTheme.css">';
            break;
        case "3":
            echo '<link rel="stylesheet" href="/BeContent/PastelTheme.css">';
            break;
        default:
            echo '<link rel="stylesheet" href="/BeContent/LightTheme.css">';
            break;
    }
    ?>

    <!-- 
  <link rel="stylesheet" type="text/css"  href="/MyStyle.php">
    -->
</head>
<body>

<h1><?php echo $MyHeader ?></h1>

<br />
    <!-- Get the menu items -->
<?php
$myDbConn = ConnGet();

// $recordset = MyPagesAllGet($myDbConn); 
$recordset = MyPagesGet($myDbConn, 0); 
// Display the main menu
MenuDisplay($recordset);
mysqli_free_result($recordset);

?>
    <!-- Add a link for the custom settings -->
    <a href="ThemeSettings.php">Theme Settings </a>

<?php

// Add a Admin link if. . .
// $_SESSION["isAdmin"] = 1; // Cheat - Do not do this in your code.
if (isset($_SESSION["username"])) {
    if (Auth()) {
        echo '  <a href="ManagePages.php">Manage Pages</a>';
    }
    echo '  <a href="Logout.php">Log Out</a>';
} else {
    echo '  <a href="Login.php">Log In</a>';
}


?>
<br />
<br />

