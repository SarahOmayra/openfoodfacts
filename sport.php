<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manger-Bouger</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="src/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/style.css" rel="stylesheet">



</head>

<body>

<?php
include 'src/navbar.php';
$id='';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
echo '<form class="form-inline" method="POST" action="sport.php?id=' . $id . '">';
?>

    <h2 class="titre">Choisissez votre sport</h2>
    <div class="form-group">
        <label for="sport"></label>
        <input type="text" class="form-control" value="" id="sport" name="sport">
    </div>
    <input type="submit" value="Calcul" class="btn btn-primary btn-lg"/></input>
</form>


<?php

define("SERVER","localhost");
define("USER","root");
define("PASS","azerty1234");
define("DB","sports");

$bdd = mysqli_connect(SERVER, USER, PASS, DB);
    $codebarre=$id;
    $url = 'https://fr.openfoodfacts.org/api/v0/product/'.$codebarre.'.json';
    $recup = file_get_contents($url);
    $json = json_decode($recup, true);
   // var_dump($json);
    $product = $json['product'];


    switch ($product['nutrition_grade_fr']){
        case 'a':
            $product['nutrition_grade_fr']='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-a.svg"/>';
            break;
        case 'b' :
            $product['nutrition_grade_fr']='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-b.svg"/>';
            break;
        case 'c' :
            $product['nutrition_grade_fr']='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-c.svg"/>';
            break;
        case 'd' :
            $product['nutrition_grade_fr']='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-d.svg"/>';
            break;
        case 'e' :
            $product['nutrition_grade_fr']='<img class="nutriscore" src="https://static.openfoodfacts.org/images/misc/nutriscore-e.svg"/>';
            break;

    }


    echo '
                
                                             
                       <div class="col-xs-12 col-lg-2"> 
                            <div class="thumbnail text-center taille">
                                                                    
                                 <div class="caption aliments">
                                      <h2>' . $product['product_name'] . '</h2>
                                      <img src = "' . $product['image_front_thumb_url'] . '"/>';
                                      if (isset($product['nutrition_grade_fr'])) {
                                                echo '<p>Calories :'. $product['nutriments']['energy_value'] . '<br/> ' . $product['nutrition_grade_fr'] . '</p>';
                                            }
                                                else {
                                                    echo '<p>Calories :'. $product['nutriments']['energy_value']. '</p>';
                                                }
?>
                                        
                                 </div>
                            </div>
                        </div>';
<?php


//$calorieproduit=$product['nutriments']['energy_value'];

    if (isset($_POST['sport'])) {
        $req="SELECT energie FROM energiesport WHERE sport='".$_POST['sport']."'";
        $res = mysqli_query($bdd, $req);
        $calorieproduit=$product['nutriments']['energy_value'];
       // var_dump($product);

        while($data = mysqli_fetch_assoc($res)) {
            $calorie = $data['energie'];
            $heure = floor($calorieproduit / $calorie);
            $minute = ((($calorieproduit / $calorie)-$heure) * 60);
        }
        echo '<div class="resultat"><h3>Vous devez bouger pendant '.$heure.'h et '.round($minute).' min !</h3><iframe src="//giphy.com/embed/MwOuiiTfWfWgM" width="400" height="380" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="http://giphy.com/gifs/MwOuiiTfWfWgM">via GIPHY</a></p></div>';
    }





?>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="src/jquery.autocomplete.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sport').autocomplete({
            serviceUrl: 'autocompletesport.php',
            dataType: 'json'
        });
    });</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>
