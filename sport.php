<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site qui rend dépressif/ve</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/style.css" rel="stylesheet">



</head>

<body>
<?php
include 'src/navbar.php'
?>

<form class="form-inline" method="POST" action="sport.php">
    <h2 class="titre">Choisissez votre sport</h2>
    <div class="form-group">
        <label for="sport"></label>
        <input type="text" class="form-control" value="" id="categorie" name="categorie">
    </div>
    <input type="submit" value="Calcul" class="btn btn-primary btn-lg"/></input>
</form>

<body>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=sports', 'root', 'gTQD2m11');
if (empty($_POST)){
    $codebarre=$_GET['id'];
    $url = 'https://fr.openfoodfacts.org/api/v0/product/'.$codebarre.'.json';
    $recup = file_get_contents($url);
    $json = json_decode($recup, true);
    $product = $json['product'];

    echo '
                
                                             
                       <div class="col-xs-12 col-lg-2"> 
                            <div class="thumbnail text-center taille">
                                                                    
                                 <div class="caption aliments">
                                      <h2>' . $product['product_name'] . '</h2>
                                      <img src = "' . $product['image_front_thumb_url'] . '"/>
                                      <p>Calories :' . $product['nutriments']['energy_value'] . '<br/> Score nutritionnel :' . $product['nutrition_grade_fr'] . '</p>
                                 </div>
                            </div>
                        </div>';


}
//$calorieproduit=$product['nutriments']['energy_value'];

    if (isset($_POST['categorie'])) {
        $sport=$_POST['categorie'];
        $req="SELECT energie FROM energiesport where sport=".$_POST['categorie'];
        $res = $bdd -> query($req);
        var_dump($res);
        while($data = $res -> fetch(PDO::FETCH_ASSOC)) {
            $calorie = $data['energie'];
            $heure = floor($calorieproduit / $calorie);
            $minute = ((($calorieproduit / $calorie) - $heure) * 60);
        }
    }





?>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="src/jquery.autocomplete.min.js"></script>
<script>
    $(document).ready(function() {
        $('#categorie').autocomplete({
            serviceUrl: 'autocompletesport.php',
            dataType: 'json'
        });
    });</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</body>
</html>
