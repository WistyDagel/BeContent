<?php
include_once "MyHeader.php";
include_once 'Helper.php';

// Use this page to change the value of
// $_SESSION["isAdmin"] or such
$errorMsg = "";

if ($_POST) {
    // Get user data from database
    $dbConn = ConnGet();
    $data = UserGet($dbConn, $_POST['username'], $_POST['password']);

    if (mysqli_num_rows($data) > 0) { // Do something with the data
        // Create sessions and go to index.php
        $row = mysqli_fetch_array($data);
        $_SESSION['username'] = $row['UserId'];
        $_SESSION['isAdmin'] = $row['isAdmin'];
        RedirectToActivePage();
    } else { // Inform the user that is was not successful
        $errorMsg = "Username or password is incorrect";
    }
}

?>

<form method="post">
    <label for="username">Username: </label>
    <input type="text" name="username" id="username" required />
    <br/>
    <br/>
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" required />
    <br/>
    <br/>
    <input type="submit" />
    <p class="error"><?php echo $errorMsg; ?></p>
</form>

<?php
include_once "MyHeader.php";
?>

