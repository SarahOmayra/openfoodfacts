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
</head>


<?php

//$produit=htmlentities('$_POST['produit']');

$url='https://world.openfoodfacts.org/cgi/search.pl?search_terms=banania&search_simple=1&action=process&json=1';
$recup=file_get_contents($url);
$json=json_decode($recup);

var_dump($json);
?>

<form class="form-inline" method="POST" action="">
    <div class="form-group">
        <label for="nom">Produit</label>
        <input type="text" class="form-control" value="" id="produit" name="produit">
    </div>
    <input type="submit" name="btnSubmit" value="Chercher" class="btn btn-default"> </input>
</form>


