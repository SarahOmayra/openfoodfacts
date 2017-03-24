<?php
if(isset($_GET['query'])) {
    // Mot tapé par l'utilisateur
    $q = htmlentities($_GET['query']);

    // Connexion à la base de données
    include 'header.php';
    $bdd = mysqli_connect(SERVER, USER, PASS, DB);

    // Requête SQL
    $req = "SELECT sport FROM energiesport WHERE sport LIKE '". $q ."%' LIMIT 0, 10";

    // Exécution de la requête SQL
    $res = mysqli_query($bdd, $req);

    // On parcourt les résultats de la requête SQL
    while($data = mysqli_fetch_assoc($res)) {
        // On ajoute les données dans un tableau
        $suggestions['suggestions'] = $data['sport'];
    }

    // On renvoie le données au format JSON pour le plugin
    echo json_encode($suggestions);
}
?>
