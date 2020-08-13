<?php
include_once "dbConnector.php";
?>

<?php
// //////////////////////////////////////////////////
function MenuDisplay($dataset) {

// &nbsp; &nbsp;<a href="ContactUs.php">

    if ($dataset){
        // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
        while($row = mysqli_fetch_array($dataset)){
            echo '<a href="Index.php?PageId=' . $row['id'] .  '" >' . $row['Title'] . '</a>';
        }
    } // End if
    else {
        echo "No menu items<br />";
        echo mysqli_error($myDbConn);
    }

}
// /////////////////
function PageDisplay($PageData) {

    if ($PageData){
        // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
        $row = mysqli_fetch_array($PageData);

        echo ' <h2> ' . $row['Header'] .  ' </h2> <br />';
        echo ' <p> ' . $row['SubText'] .  '</p> <br />';

    } // End if
    else {
        echo "No Page data to display <br />";
    }

}

// Redirect to $page
// Parameter $page should be something like 'index.php'
function Redirect($page) {
    header('Location: ' . $page);
}
function Redirect2($page, $pageId) {
    header('Location: ' . $page . '?PageId=' . $pageId);
}

// Check if the current client is aurthorized and return the result
function Auth() {
    return (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1);
}

function PageDisplayAdmin($PageData) {
    if ($PageData){
        // Creates a form for the admin to change the values
        $row = mysqli_fetch_array($PageData);

        echo '<form method="post">';
        echo '<input type="text" name="subText" value="' . $row['Header'] .  '">';
        echo '<input type="text" name="header" value="' . $row['SubText'] .  '">';
        echo '<input type="submit" value="Push Edit">';
        echo '</form>';
        echo '<br/><br/>';
        echo '<br/><br/>';

    } // End if
    else {
        echo "No Page data to display <br />";
    }
}

?>