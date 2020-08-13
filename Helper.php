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

function PageDisplayAdmin($PageData, $PageId, $header, $subText) {
    if ($PageData){
        // Creates a form for the admin to change the values
        echo '<input id="subText" value="' . $header .  '">';
        echo '<input id="header" value="' . $subText .  '">';
        echo '<a href="index.php?PageId='.$PageId.'&header='.$header.'&subText='.$subText.'">Submit</a>';

    } // End if
    else {
        echo "No Page data to display <br />";
    }
}

?>