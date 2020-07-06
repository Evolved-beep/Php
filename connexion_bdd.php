<?php 

function connexionbase()
{
    $host = "localhost"; 
    $login = "root"; // Utilisateur 
    $password = ""; // Mot de passe de l'utilisateur
    $base = "jarditou"; // Base avec laquelle nous allons travailler

try {
    $db = new PDO('mysql:host='.$host.';charset=utf8;dbname='.$base,$login,$password);
    return $db;
}
catch(Exception $e) {
    echo 'Erreur :'. $e->getMessage().'<br>';
    echo 'N° : '. $e->getCode().'<br>';
    die('Connexion au serveur impossible.');
}
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de détail</title>
    <?php
    require"connexion_bdd.php"; //Inclusion de notre bibliothéque de fonction

    $db = connexionbase(); // Appel de la fonction de connexion 