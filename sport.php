<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Site qui rend dépressif/ve</title>
        <!-- Bootstrap -->
        <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="src/style.css" rel="stylesheet">
        <script type="text/javascript" src="src/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="autocomplete.min.js"></script>


    </head>
    <body>
        <form class="form-inline" method="GET" action="sport.php">
            <label for="sport">Choisis ton sport</label>
            <input type="text" id="sport" />
            <button type="submit" class="btn btn-default">Gros</button>
        </form>
        <?php
            include 'requetesport.php';
        ?>

        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



    </body>
</html>