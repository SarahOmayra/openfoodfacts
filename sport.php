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
    <script type="text/javascript" src="src/jquery.autocomplete.min.js"></script>



   <script>
        $(document).ready(function() {
            $('#sport').autocomplete({
                serviceUrl: 'sport.php',
                dataType: 'json'
            });
        });
    </script>
</head>
<body>
    <form class="form-inline" method="GET" action="sport.php">
        <label for="sport">Choisis ton sport</label>
        <input type="text" id="sport" />
        <button type="submit" class="btn btn-default">Gros</button>
    </form>
<?php
    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);

        // Connexion à la base de données
        include 'header.php';
        $bdd = mysqli_connect(SERVER, USER, PASS, DB);

        // Requête SQL
        $req = "SELECT sport FROM energiesport WHERE sport LIKE '". $q ."%' LIMIT 0, 10";

        // Exécution de la requête SQL
        $res = mysqli_query($bdd, $req);

        // On parcourt les résultats de la requête SQL
        while($data = mysqli_fetch_assoc($res)) {
            // On ajoute les données dans un tableau
            $suggestions['suggestions'][] = $data['sport'];
        }

        // On renvoie le données au format JSON pour le plugin
        echo json_encode($suggestions);
    }
    ?>


</body>
</html>