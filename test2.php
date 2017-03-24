<?php
/**
 * Created by PhpStorm.
 * User: wilder7
 * Date: 24/03/17
 * Time: 00:24
 */

$url='https://fr.openfoodfacts.org/api/v0/banania.json';
$recup=file_get_contents($url);
$json=json_decode($recup,true);

var_dump($json);

