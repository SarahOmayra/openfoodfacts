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

<form class="form-inline produit" method="POST" action="produits.php">
        <div class="form-group">
        <label for="nom" class="nom"></label>
        <input type="text" class="form-control" value="" id="categorie" name="categorie" placeholder="Catégorie">

    </div>
    <input type="submit" name="btnSubmit" value="Chercher" class="btn btn-default" href="produits.php"> </input>
</form>

<?php



if (isset($_POST['btnSubmit'])){

    $requete=$_POST['categorie'];


    for ($i=1;$i<5;$i++) {
        $url = 'https://fr.openfoodfacts.org/categorie/' . $requete . './$i.json';
        $recup = file_get_contents($url);
        $json = json_decode($recup, true);
        $produits_categorie = $json['products'];
//        var_dump($produits_categorie);
        foreach ($produits_categorie as $produit_categorie) {
            $id = $produit_categorie['code'];
            $nom = $produit_categorie['product_name'];
            $image = '';
            if (isset($produit_categorie['image_front_thumb_url'])) {
                $image = $produit_categorie['image_front_thumb_url'];
            }
            $nutri_score = '';
            if (isset($produit_categorie['nutrition_grade_fr'])) {
                $nutri_score = $produit_categorie['nutrition_grade_fr'];

                switch ($nutri_score){
                    case 'a':
                        $nutri_score='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-a.svg"/>';
                        break;
                    case 'b' :
                        $nutri_score='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-b.svg"/>';
                        break;
                    case 'c' :
                        $nutri_score='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-c.svg"/>';
                        break;
                    case 'd' :
                        $nutri_score='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-d.svg"/>';
                        break;
                    case 'e' :
                        $nutri_score='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-e.svg"/>';
                        break;

                }
            }
            $energie = 'pas de données';
            if (isset($produit_categorie['nutriments']['energy_value'])) {
                $energie = $produit_categorie['nutriments']['energy_value'];
            }


            echo '
                
                                             
                       <div class="col-xs-12 col-lg-2"> 
                            <div class="thumbnail text-center taille">
                                                                    
                                 <div class="caption aliments">
                                      <h2>' . $nom . '</h2>
                                      <img src = "' . $image . '"/>
                                      <p>Calories :' . $energie . '<br/>'. $nutri_score . '</p>
                                      <a class="btn btn-warning" href="sport.php?id='.$id.'">Choisir</a>
                                 </div>
                            </div>
                        </div>';
        }
    }



}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</body>


</html>

