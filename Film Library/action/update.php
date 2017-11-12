<?php
require_once('db.php');
//checks if update button is clicked
if(isset($_POST['update'])){
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $director = filter_var($_POST['director'], FILTER_SANITIZE_STRING);
    $year = filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
    $categoryID = filter_var($_POST['val'], FILTER_SANITIZE_NUMBER_INT);
    $Did = filter_var($_POST['Did'], FILTER_SANITIZE_NUMBER_INT);


    //prepare statement to secure transfering data
    $stmt = $conn->prepare('UPDATE bibliotek SET title=?, director=?, year=?, categoryID=? WHERE id=? ');
    //bind parameters
    $stmt->bind_param('ssiii', $title, $director, $year, $categoryID, $Did);
    //checks if statement executes
    if($stmt->execute()){
        //gives a message that it succeed and shows a button for going back to home page
        echo "Movie data updated succesfully
        <br>
        <button onclick=location.href='../index.php' type='button'>Home</button>";
    }else{
        echo "Failed to Update Data!";
    }

}
//checks if cancel button clicked so send the user to homepage
if(isset($_POST['cancel'])){
    header ('Location:../index.php');
}

?>