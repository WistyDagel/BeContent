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
    $row = mysqli_fetch_array($PageData);
    PageDisplayAdmin($PageData, $PageId, $row['Header'], $row['SubText']);
    
    if (isset($_GET['subText']) && isset($_GET['header'])) {
        UpdatePage($myDbConn, $PageData);
    }
} else {
    PageDisplay($PageData);
}
mysqli_free_result($PageData);

// Display sub page links

$SubPages = MyPagesGet($myDbConn, $PageId); 
if (($PageId != "0") && ($SubPages) && ($SubPages->num_rows > 0)) {
    echo "Sub page links: ";
    // Display the main menu
    MenuDisplay($SubPages);
    mysqli_free_result($SubPages);
}
else
{
    echo "<br /> Welcome. . . Click a menu link";
}

// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}
?>

<?php

include_once "MyFooter.php";
?>

