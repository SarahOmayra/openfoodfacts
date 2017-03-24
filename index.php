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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
</head>

<body>


<form class="form-inline" method="POST" action="produits.php">
    <div class="form-group">
        <label for="nom">Catégorie d'aliments</label>
        <input type="text" class="form-control" value="" id="categorie" name="categorie">
           </div>
    <input type="submit" name="btnSubmit" value="Chercher" class="btn btn-default" href="produits.php"> </input>
</form>














