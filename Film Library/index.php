<?php
require_once('action/db.php');
require_once('action/create.php');
//making a variable to count the tabel rows
$no = 1;
//selecting and joining table columns
$sql = "SELECT * 
FROM bibliotek
INNER JOIN categories
ON bibliotek.categoryID = categories.categoryID
";
//prepare statment to secure the transfering data
$stmt = $conn->prepare($sql);
//executes data
$stmt->execute();
//saving results in a variable for using afterward
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Film DataBase</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        
    </head>
    <body>
        <div class="jumbotron">
            <div class="container text-center">
                <h1>Film DataBase</h1>
            </div>
        </div>

        <div class="container">

            <div class="col-sm-10">
                <h2>All Recorded Movies in DataBase</h2>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th># </th>
                        <th>Title: </th>
                        <th>Director: </th>
                        <th>Year: </th>
                        <th>Category: </th>
                        <th colspan="2">Edit: </th>
                    </tr>
                    <?php //fetching results from prepared statement
                        while($row = $result->fetch_assoc()){
                                
                            echo 
                                "<tr> 
                                    <td>" . $no++ . "</td>
                                    <td>" . $row['title'] . "</td>
                                    <td>" . $row['director'] . "</td>
                                    <td>" . $row['year'] . "</td>
                                    <td>" . $row['text'] . "</td> 
                                    <td><a href='remove.php?Did=".$row['id']."'>delete</a>" . "</td>
                                    <td><a href='edit.php?Did=".$row['id']."'>Update</a>" . "</td> 
                                </tr>"; 
                        }
                    ?>
                    
                </table>
            </div>


            <div class="col-sm-6">
                <fieldset>
                    <legend>Add A New Movie To DataBase</legend>
                    <form action="action/create.php" method="POST" class="form-group">


                        <input type="radio" name="val" value="1">Thriller</input><br>
                        <input type="radio" name="val"value="2">Romantic</input><br>
                        <input type="radio" name="val" value="3">Swedish</input><br>
                        <input type="radio" name="val" value="4">Animated</input><br>
                        <input type="radio" name="val" value="5">Comedy</input><br><br>
                        Title:   <input class="form-control" type="text" name="title"></input><br>
                        Director:<input class="form-control" type="text" name="director"></input><br>
                        Year:    <input class="form-control" type="text" name="year"></input><br>

                        <input class="btn btn-default" type="submit" name="submit" value="Store"></input>
                    </form>
                </fieldset>
            </div>
        </div>
        <footer class="container-fluid text-center">
            <p>Movie DataBase By Reza</p>
        </footer>
    </body>
</html>