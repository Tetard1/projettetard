<?php
var_dump($_POST);
$bdd = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email AND id_inscrit =:id_inscrit');
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
    $req = $bdd->prepare('DELETE FROM inscrit WHERE id_inscrit = :id_inscrit');
    $req->execute(array(
        'id_inscrit' => $_POST['id_inscrit']
    ));
    echo "Votre utilisateur a été suprimer avec succes ! ";
}
?>