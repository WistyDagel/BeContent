<?php
include_once "MyHeader.php";
include_once "Helper.php";
?>

<?php
// Move to Index
$PageId = "0";
// Get the page parameter
if (array_key_exists("PageId", $_GET) == true) {
    $PageId = $_GET["PageId"];
}

?>

<div class='container'>

<?php
$myDbConn = ConnGet();
// Get given page
$PageData = PageContentGet($myDbConn, $PageId);
// Display page data 
// If admin is logged in, the page will be a form for the admin to submit
// in order to change the content of the page.
if (Auth()) {
    
    PageDisplayAdmin($PageData);
    
    
    if (isset($_POST['subText']) && isset($_POST['header'])) {
        $row = mysqli_fetch_array($PageData);

        // echo $_POST['subText'];
        // echo $_POST['header'];
        
        UpdatePage($myDbConn, $_POST['subText'], $_POST['header'], $PageId);
        Redirect2('index.php', $PageId);
    }
} else {
    PageDisplay($PageData);
}
mysqli_free_result($PageData);

// Display sub page links

$SubPages = MyPagesGet($myDbConn, $PageId); 
if (($PageId != "0") && ($SubPages) && ($SubPages->num_rows > 0)) {
    // Display the main menu
    MenuDisplay($SubPages);
    mysqli_free_result($SubPages);
}
else
{
    echo "<br /> Welcome. . . Click a menu link";
}

?>
</div>

<!-- // Get given page
// $PageData = PageContentGet($myDbConn, $PageId);

// if ($_SESSION["isAdmin"] == 1) {
//     PageDisplayAdmin($PageData);
// } else {
//     PageDisplay($PageData);
// }
// mysqli_free_result($PageData); -->


<?php
// Always close db connection
if ($myDbConn) {
    mysqli_close($myDbConn);
}

include_once "MyFooter.php";
?>

