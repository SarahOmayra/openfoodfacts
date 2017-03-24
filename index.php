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
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">


</head>

<body>
<?php
    include 'src/navbar.php'
?>

<form class="form-inline" method="POST" action="produits.php">
    <h2 class="titre">Rechercher votre catégorie</h2>
    <div class="form-group">
        <label for="nom" class="nom"></label>
        <input type="text" class="form-control" value="" id="categorie" name="categorie" placeholder="Catégorie">

    </div>
    <input type="submit" name="btnSubmit" value="Chercher" class="btn btn-default" href="produits.php"> </input>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        var liste = [
            "pizzas",
            "pomme",
            "chocolats",
            "produits laitiers"
        ];
        $( "#categorie" ).autocomplete({
            source: liste
        });
    } );
</script>


</body>


</html>
