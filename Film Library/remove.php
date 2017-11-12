<?php
require_once('action/db.php');
require_once('action/delete.php');

//checks if it gets selected movie id 'Did'
if(isset($_GET['Did'])) {
    //saves the selected movie id in variabel Did
    //$Did = $_GET['Did'];
    $Did = filter_var($_GET['Did'], FILTER_SANITIZE_NUMBER_INT);


    //prepare statement to secure data transfer
    $stmt = $conn->prepare('SELECT * FROM bibliotek WHERE id = ?');
    //binds the selected movie id to movie id in database
    $stmt->bind_param('i', $Did);
    //executes the statement
    $stmt->execute();
    //saves the results of statement in variable result
    $result = $stmt->get_result();
    //fetches the data from results and saves it to variable row for using afterwards
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
                <h2>Are you sure you want to delete this data? It can't be undone!</h2>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Title: </th>
                        <th>Director: </th>
                        <th>Year: </th>
                    </tr>
                    <tr>
                        <td><?php echo $row['title'];?></td>
                        <td><?php echo $row['director'];?></td>
                        <td><?php echo $row['year'];?></td>
                    </tr>
                </table>

                <form action='action/delete.php' method='POST'>
                    <input class="btn btn-default" type="hidden" name="Did" value="<?php echo $Did; ?>" />
                    <input class="btn btn-default" type='submit' name='delete' value='Delete'>
                    <input class="btn btn-default" type='submit' name='cancel' value='Cancle'>
                </form>

            </div>
        </div>
        <footer class="text-center navbar-fixed-bottom">
            <p>Movie DataBase By Reza</p>
        </footer>
    </body>
</html>