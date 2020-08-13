<?php
include_once "MyHeader.php";
include_once "Helper.php";

//Retrieves the current value of the ChangeTheme based on the user selection
if ($_POST) {
    $changedTheme = $_POST['ChangeTheme'];
    // echo $changedTheme;
    $_SESSION['MyStyle'] = $changedTheme;
    //Refreshes the page so the theme can change
    Redirect("ThemeSettings.php");
}
?>

<!-- Contains the radio buttons for the user to change themes -->
<div class='container'>
    <h3>Please select from our themes below:</h3>
    <div class='flexContainer'>
        <form method="post">
            <!-- <a class='light' type="submit" name="ChangeTheme" value="1" >Light Theme</a>
            <a class='dark' type="submit" name="ChangeTheme" value="2" >Dark Theme</a>
            <a class='whatever' type="submit" name="ChangeTheme" value="3" >Whatever Theme</a> -->
            <input type="radio" name="ChangeTheme" value="1" <?php if ($_SESSION["MyStyle"] == '1') echo 'checked' ?>/>
            <label for="1">Light Theme</label>
            <input type="radio" name="ChangeTheme" value="2" <?php if ($_SESSION["MyStyle"] == '2') echo 'checked' ?>/>
            <label for="2">Dark Theme</label>
            <input type="radio" name="ChangeTheme" value="3" <?php if ($_SESSION["MyStyle"] == '3') echo 'checked' ?>/>
            <label for="3">Pastel Theme</label>
            <input type="submit" value="Save" />
        </form>
    </div>
</div>

<?php
include_once "MyHeader.php";
?>