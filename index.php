<?php
include_once "MyHeader.php";
?>

<?php
// Move to Index
$PageId = "0";
// Get the page parameter
if (array_key_exists("PageId", $_GET) == true) {
    $PageId = $_GET["PageId"];
}

?>

<?php

// Get given page
$PageData = PageContentGet($myDbConn, $PageId);
// Display page data 
// If admin is logged in, the page will be a form for the admin to submit
// in order to change the content of the page.
if ($_SESSION["isAdmin"] == 1) {
    PageDisplayAdmin($PageData);
} else {
    PageDisplay($PageData);
}
mysqli_free_result($PageData);


<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "MyFooter.php";
?>

