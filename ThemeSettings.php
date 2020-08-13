<?php
include_once "MyHeader.php";

$changedTheme = "test";
// Use this page to change the value of
// $_COOKIE["MyStyle"] or such
if ($_POST) {
    echo $changedTheme;
    $changedTheme = $_POST['ChangeTheme'];
    $_SESSION['MyStyle'] = $changedTheme;
}
?>

<div class='container'>
    <h3>Please select from our themes below:</h3>
    <div class='flexContainer'>
        <form method="post">
            <a class='light' type="submit" name="ChangeTheme" value="1" >Light Theme</a>
            <a class='dark' type="submit" name="ChangeTheme" value="2" >Dark Theme</a>
            <a class='whatever' type="submit" name="ChangeTheme" value="3" >Whatever Theme</a>
        </form>
    </div>
</div>

<?php
include_once "MyHeader.php";
?>