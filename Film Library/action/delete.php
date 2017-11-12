<?php
require_once('db.php');
//checks if delte button has clicked
if(isset($_POST['delete'])){
    //saving the slected movie id 'Did' in variable Did
    $Did = filter_var($_POST['Did'], FILTER_SANITIZE_NUMBER_INT);
    //prepare statement to secure data transfer
    $stmt = $conn->prepare('DELETE FROM bibliotek WHERE id = ?');
    // bind the movie id to selected movie id 'Did'
    $stmt->bind_param('i', $Did);
    //checks if prepared statements executes so gives a succeed message and a button to send the user to homepage
    if($stmt->execute()){
        echo "Movie data deleted succesfully
        <br>
        <button onclick=location.href='../index.php' type='button'>Home</button>";
    }
    // close statement
    $stmt->close();
}
// checks if cancel button has clicked so sends the user to home page
if(isset($_POST['cancel'])){
    header ('Location:../index.php');
}
