<?php
var_dump($_POST);
$bdd = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email AND passe = :passe');
$req->execute(array(
    'email' => $_POST['email'],
    'passe' => $_POST['passe'],
));

$donne = $req->fetch();
var_dump($donne);
if ($donne == NULL) {
    echo "vous n'avez pas de compte! veuillez en crée un ! ";
}
else
    echo "vous êtes connecter ! ";

?>
