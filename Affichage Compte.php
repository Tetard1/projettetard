<?php
session_start();
$affichage = new PDO ('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
$affichageconnexion = $affichage->prepare('SELECT nom, prenom, email, Date_inscription FROM inscrit order by Date_inscription desc');
$affichageconnexion->execute();

$donne = $affichageconnexion->fetchAll();
var_dump($donne);
var_dump(count($donne));

foreach ($donne as $donnes) {

    echo $donnes['nom'] . " | " . $donnes['prenom'] . " | " . $donnes['email'] . " | " . $donnes['Date_inscription']."<br>";

}


echo "voici la liste des inscrits";

?>