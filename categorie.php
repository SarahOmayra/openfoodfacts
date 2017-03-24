<?php
include 'connect.php';
$bdd=mysqli_connect(SERVER,USER,PASS,DB);

$urlcategorie='https://fr.openfoodfacts.org/categories.json';
$recupcategorie=file_get_contents($urlcategorie);
$jsoncategorie=json_decode($recupcategorie,true);
$categories=$jsoncategorie['tags'];

var_dump($jsoncategorie);

foreach ($categories as $categorie){
        $namecategorie=$categorie['name'];
        $req = "INSERT INTO categories (nom) VALUES ('$namecategorie')";
        mysqli_query($bdd, $req);

}



