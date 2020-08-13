<?php
include_once "MyHeader.php";

// Use this page to change the value of a page

// Prevent non-admins fom accessing the pages
include_once 'Helper.php';
if(!Auth()) {
    Redirect('index.php');
}

// Get pages from database
$dbConn = ConnGet();
$pages = MyPagesAllGet($dbConn);

// Check if 
if (isset($_POST)) {
    if (isset($_POST['edit'])) {
        Redirect('index.php', $_POST['id']);
    }
    if (isset($_POST['deactivate'])) {
        echo $_POST['id'];
        PageRemove($dbConn, $_POST['id']);
        Redirect('ManagePages.php');
    }
    if (isset($_POST['activate'])) {
        echo $_POST['id'];
        PageRestore($dbConn, $_POST['id']);
        Redirect('ManagePages.php');
    }
}

?>

<h2>Current Pages</h2>

<div class="flexContainer">
    <!-- Beginning of pages table and table headers -->
    <table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Header</th>
        <th>SubText</th>
        <th>ParentPage</th>
        <th>SortOrder</th>
        <th>IsActive</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    
    <?php
    
    // Generate table row for each page
    while ($page = mysqli_fetch_array($pages)) {
        // One form per table row
        echo '<form method="post"><tr>';
        // Hidden input to post table id
        echo '<input type="hidden" name="id" value="' . $page['id'] . '" />';
        echo '<td>' . $page['id'] . '</td>';
        echo '<td>' . $page['Title'] . '</td>';
        echo '<td>' . $page['Header'] . '</td>';
        echo '<td>' . $page['SubText'] . '</td>';
        echo '<td>' . $page['ParentPage'] . '</td>';
        echo '<td>' . $page['SortOrder'] . '</td>';
        echo '<td>' . $page['isActive'] . '</td>';
        // Submit buttons to post form
        echo '<td><input type="submit" name="edit" value="Edit" /></td>';
        echo '<td><input type="submit" name="deactivate" value="Deactivate" /></td>';
        echo '<td><input type="submit" name="activate" value="Activate" /></td>';
        echo '</tr></form>';
    }
    
    ?>
    
    <!-- Close tags -->
    </table>
</div>

<?php
include_once "MyHeader.php";
?>

