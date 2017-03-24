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


</head>
<body>

<?php

$codebarre=$_GET['id'];
$url = 'https://fr.openfoodfacts.org/api/v0/product/'.$codebarre.'.json';
$recup = file_get_contents($url);
$json = json_decode($recup, true);
$product = $json['product'];

echo $product['product_name'];
echo $product['image_front_thumb_url'];
echo $product['nutrition_grade_fr'];
echo $product['nutriments']['energy_value'];




include 'connect.php';
$bdd=mysqli_connect(SERVER,USER,PASS,DB);

?>
    <form method="POST" action="sport.php">
        <label for="sport">Choisis ton sport</label>
        <select class="form-control" name="sport" id="sport">
            <?php
            $sport = mysqli_query($bdd,"SELECT * FROM energiesport");
            while ($data=mysqli_fetch_assoc($sport)) {
                $choix = $data['sport'];
                echo '<option value="'.$data['idenergiesport'].'">'.$choix.'</option>';
            }
            ?>
        </select>
        <input type="submit" value="Calcul" class="btn btn-primary btn-lg"/>
    </form>


<?php

$calorieproduit=$product['nutriments']['energy_value'];
if (isset($_POST['sport'])){
    $res=mysqli_query($bdd,"SELECT calorie FROM energiesport where idenergiesport=".$_POST['sport']);
    while ($data=mysqli_fetch_assoc($res)) {
        $calorie=$data['calorie'];
        $heure=floor($calorieproduit/$calorie);
        $minute= ((($calorieproduit/$calorie)-$heure)*60);
    }
}




?>






</body>
</html>