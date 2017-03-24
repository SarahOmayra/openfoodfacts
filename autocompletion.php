<?php

include 'header.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);
$req = "SELECT sport FROM energiesport";
$res = mysqli_query($bdd, $req);

while($data = mysqli_fetch_assoc($res)){
    foreach ($data as $key=>$value){
        echo $data[$key];
        echo '<br />';
    }
}