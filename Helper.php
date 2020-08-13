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
            echo ' &nbsp; &nbsp; <a href="Index.php?PageId=' . $row['id'] .  '" >' . $row['Title'] . '</a>';
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

        echo ' &nbsp; &nbsp; <h2> ' . $row['Header'] .  ' </h2> <br />';
        echo ' &nbsp; &nbsp; <p> ' . $row['SubText'] .  '</p> <br />';

    } // End if
    else {
        echo "No Page data to display <br />";
    }

}

function Redirect($page) {
    header('Location: ' . $page);
}

function Auth() {
    return (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1);
}

function PageDisplayAdmin($PageData) {
    if ($PageData){
        $row = mysqli_fetch_array($PageData);

        // Creates a form for the admin to change the values
        echo '<input name="subText" value="' . $row['Header'] .  '">';
        echo '<input name="header" value="' . $row['SubText'] .  '">';
        echo '<button name="a" onclick="' . UpdatePage(ConnGet(), $row) .'">Submit</button>';

    } // End if
    else {
        echo "No Page data to display <br />";
    }
}

?>