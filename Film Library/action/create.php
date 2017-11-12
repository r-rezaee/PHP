<?php
require_once('db.php');

//checks if submit button has clicked
if (isset($_POST['submit'])){
    
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $director = filter_var($_POST['director'], FILTER_SANITIZE_STRING);
    $year = filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
    $categoryID = filter_var($_POST['val'], FILTER_SANITIZE_NUMBER_INT);

    // prepare and bind
    $stmt = $conn->prepare ('INSERT INTO bibliotek (title, director, year, categoryID) VALUES (?, ?, ?, ?)');
    //$stmt->bind_param('ssii', $title, $director, $year, $categoryID);

    //bind parameters
    $stmt->bind_param('ssii', $title, $director, $year, $categoryID);


    //checks if publish has been successful
    if ($stmt->execute()) {
	    echo "New movie added succesfully";
        header ('Location: ../index.php');
    }else {
	    echo "Failed.";
    }
}



?>