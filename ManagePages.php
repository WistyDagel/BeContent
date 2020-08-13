<?php
include_once "MyHeader.php";

include_once 'Helper.php';
if(!Auth()) {
    Redirect('index.php');
}

// Use this page to change the value of a page

?>

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
    <tr>
        <td>A</td>
        <td>B</td>
        <td>C</td>
        <td>D</td>
        <td>E</td>
        <td>F</td>
        <td>G</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
</table>

Add code (form) to modify the database values for a page.
<br />
<br />
My sugestion: Create a Table that lists all the pages (records) in the database. Each record will have an Edit and Delete link.
<br />
Each link takes the person to a page where they can edit the content

<?php
include_once "MyHeader.php";
?>

