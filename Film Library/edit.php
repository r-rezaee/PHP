<?php
require_once('action/db.php');
require_once('action/update.php');
//checks if it has received the 'Did' (the id) from the form  
if(isset($_GET['Did'])) {
    // put the id in variable Did
    $Did = filter_var($_GET['Did'], FILTER_SANITIZE_NUMBER_INT);

    //prepare statements to secure trasfering the data
    $stmt = $conn->prepare('SELECT * FROM bibliotek WHERE id = ?');
    // bind the parameter id to 'Did'
    $stmt->bind_param('i', $Did);
    //execute prepared statement
    $stmt->execute();
    //saving the results in variable result
    $result = $stmt->get_result();
    //fetching the results and saving in variable row for using afterwards
    $row = $result->fetch_assoc();

}
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
                <h2>Update the movie data</h2>
                

            </div>
            <div class="col-sm-6">
                <fieldset>
                    <legend>Edit the Data</legend>
                    <form action="action/update.php" method="POST" class="form-group">
                        <input type="radio" name="val" value="1" <?php if(1 == $row['categoryID']){echo "checked";} ?>>Thriller</input><br>
                        <input type="radio" name="val" value="2" <?php if(2 == $row['categoryID']){echo "checked";} ?>>Romantic</input><br>
                        <input type="radio" name="val" value="3" <?php if(3 == $row['categoryID']){echo "checked";} ?>>Swedish</input><br>
                        <input type="radio" name="val" value="4" <?php if(4 == $row['categoryID']){echo "checked";} ?>>Animated</input><br>
                        <input type="radio" name="val" value="5" <?php if(5 == $row['categoryID']){echo "checked";} ?>>Comedy</input><br><br>

                        Title:   <input class="form-control" type="text" name="title" value="<?php echo $row['title'];?>"></input><br>
                        Director:<input class="form-control" type="text" name="director" value="<?php echo $row['director'];?>"></input><br>
                        Year:    <input class="form-control" type="text" name="year" value="<?php echo $row['year'];?>"></input><br>

                        <input class="btn btn-default" type="submit" name="update" value="Update">
                        <input class="btn btn-default" type='submit' name='cancel' value='Cancle'>
                        <input type="hidden" name="Did" value="<?php echo $Did; ?>" />
                    </form>
                </fieldset>
            </div>
        </div>
        <footer class="container-fluid text-center">
            <p>Movie DataBase By Reza</p>
        </footer>
    </body>
</html>








