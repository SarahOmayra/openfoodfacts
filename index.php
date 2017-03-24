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
<<<<<<< HEAD
           </div>
    <input type="submit" name="btnSubmit" value="Chercher" class="btn btn-default"> </input>
</form>

<?php

if (isset($_POST['btnSubmit'])) {

    $requete = $_POST['categorie'];
    $requete_produit = $_POST['product'];

    for ($i = 1; $i < 5; $i++) {
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
=======

    </div>
    <input type="submit" name="btnSubmit" value="Chercher" class="btn btn-default" href="produits.php"> </input>
</form>


>>>>>>> 8dd738ede7a1942a1fffb25de17030269b30236c



<<<<<<< HEAD

=======
</html>
>>>>>>> 8dd738ede7a1942a1fffb25de17030269b30236c
