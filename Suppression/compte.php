<?php
session_start();
var_dump($_POST);
$bdd = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email');
$req->execute(array(
    'email' => $_POST['email'],
));
$donne = $req->fetch();

var_dump($donne);
if ($donne == NULL) {
    echo "Nous sommes desoler ce service est indisponible !";
}
else {
    var_dump($_POST);
    $bdd = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
    $req = $bdd->prepare('DELETE FROM inscrit WHERE email = :email');
    $req->execute(array(
        'email' => $_SESSION['email']
    ));
    echo "Votre utilisateur a été suprimer avec succes ! ";
}
?>