<?php

// Create constants
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_SERVER', 'localhost');
DEFINE ('DB_NAME', 'BeContentDB');
DEFINE ('DB_PORT', 3308);

// ///////////////////////////////////////////////////
// Get db connection
function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, DB_PORT)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}
// ///////////////////////////////////////////////////
// Get Select records based on the Parent Id
function MyPagesGet($dbConn, $Parent = 0) {
    $query = "SELECT id, Title, Header, SubText
              FROM WebElements
              WHERE isActive = 1
              AND ParentPage = ?
              ORDER BY ParentPage ASC, SortOrder ASC;";

    $stmt = $dbConn->prepare($query);
    $stmt->bind_param("s", $Parent);
    $stmt->execute();
    return $stmt->get_result();
}
// ///////////////////////////////////////////////////
// Get all the page records
function MyPagesAllGet($dbConn) {
    $query = "SELECT *
              FROM WebElements
              ORDER BY ParentPage ASC, SortOrder ASC;";

    return @mysqli_query($dbConn, $query);
}
// ///////////////////////////////////////////////////
// Get Select page
function PageContentGet($dbConn, $Id) {
    $return = null;

    $query = "SELECT id, Title, Header, SubText
              FROM WebElements
              WHERE isActive = 1
              AND id = ?";
    $stmt = $dbConn->prepare($query);
    $stmt->bind_param("s", $Id);
    $stmt->execute();
    $return = $stmt->get_result();

    if ((!$return) || ($return->num_rows < 1)){
        // return a default page
        $query = "SELECT id, Title, Header, SubText
                  FROM WebElements
                  WHERE isActive = 1
                  ORDER BY SortOrder ASC LIMIT 1;";

        $return = @mysqli_query($dbConn, $query);
    }

    return $return;
}

// ///////////////////////////////////////////////////
// Get all the page records
function PageRemove($dbConn, $Id) {
    // Set page isActive to false
    $query = "UPDATE WebElements
              SET isActive = 0
              WHERE id = ?";

    $stmt = $dbConn->prepare($query);
    $stmt->bind_param("s", $Id);
    $stmt->execute();
    return $stmt->get_result();
}

function PageRestore($dbConn, $Id) {
    // Set page isActive to true
    $query = "UPDATE WebElements
              SET isActive = 1
              WHERE id = ?";

    $stmt = $dbConn->prepare($query);
    $stmt->bind_param("s", $Id);
    $stmt->execute();
    return $stmt->get_result();
}

// Get a user based on id and password
function UserGet($dbConn, $userId, $pswd) {
    $query = "SELECT *
              FROM Users u
              WHERE u.UserId = ?
              AND u.Pswd = ?
              AND u.isActive = 1;";

    $stmt = $dbConn->prepare($query);
    $stmt->bind_param("ss", $userId, $pswd);
    $stmt->execute();
    return $stmt->get_result();
}

// Update a page header and subtext based on id
function UpdatePage($dbConn, $header, $subText, $id) {
    $query = "UPDATE WebElements
              SET Header = ?, SubText = ?
              WHERE id = ?;";
    
    $stmt = $dbConn->prepare($query);
    $stmt->bind_param("sss", $header, $subText, $id);
    $stmt->execute();
    return $stmt->get_result();
}


?>


