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

?>

<h2>Current Pages</h2>

<!-- Form to send POST data -->
<form method="post">
    <!-- Beginning of pages table and table headers -->
    <div class="flexContainer">
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
        </tr>
        
        <?php
        
        // Generate table row for each page
        while ($page = mysqli_fetch_array($pages)) {
            echo '<tr>';
            echo '<td>' . $page['id'] . '</td>';
            echo '<td>' . $page['Title'] . '</td>';
            echo '<td>' . $page['Header'] . '</td>';
            echo '<td>' . $page['SubText'] . '</td>';
            echo '<td>' . $page['ParentPage'] . '</td>';
            echo '<td>' . $page['SortOrder'] . '</td>';
            echo '<td>' . $page['isActive'] . '</td>';
            echo '<td><input type="submit" name="edit" value="Edit" /></td>';
            echo '<td><input type="submit" name="delete" value="Delete" /></td>';
            echo '</tr>';
        }
        
        ?>
        
        <!-- Close tags -->
        </table>
    </div>

</form>

<?php
include_once "MyHeader.php";
?>

