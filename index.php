<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Manger-Bouger</title>
    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/style.css" rel="stylesheet">



</head>

<body>
<?php
    include 'src/navbar.php'
?>

<form class="form-inline" method="POST" action="produits.php">
    <h2 class="titre">Que souhaitez-vous manger ?</h2>
    <div class="form-group">
        <label for="nom"></label>
        <input type="text" class="form-control" value="" id="categorie" name="categorie">
           </div>
    <input type="submit" name="btnSubmit" value="Chercher" class="btn btn-default" href="produits.php"> </input>
</form>



<?php

if (isset($_POST['btnSubmit'])) {

    $requete = $_POST['categorie'];
    $requete_produit = $_POST['product'];

    for ($i = 1; $i < 3; $i++) {
        $url = 'https://fr.openfoodfacts.org/categorie/' . $requete . '/$i.json';
        $recup = file_get_contents($url);
        $json = json_decode($recup, true);
        $produits_categorie = $json['products'];
//    var_dump($produits_categorie);
        foreach ($produits_categorie as $produit_categorie) {
            $nom = $produit_categorie['product_name'];

            $image = '';
            if (isset($produit_categorie['image_front_thumb_url'])) {
                $image = $produit_categorie['image_front_thumb_url'];
            }
            $nutri_score = '';
            if (isset ($produit_categorie['nutrition_grade_fr'])) {
                $nutri_score = $produit_categorie['nutrition_grade_fr'];
            }
            $energie = 'pas de données';
            if (isset($produit_categorie['nutriments']['energy_value'])) {
                $energie = $produit_categorie['nutriments']['energy_value'];
            }

            echo $nom;
            echo $image . '<br/>';
            echo $energie . '<br/>';
            echo $nutri_score . '<br/>';
        }

    }

}
?>



<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="src/jquery.autocomplete.min.js"></script>
<script>
    $(document).ready(function() {
        $('#categorie').autocomplete({
            serviceUrl: 'autocomplete.php',
            dataType: 'json'
        });
    });</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>






