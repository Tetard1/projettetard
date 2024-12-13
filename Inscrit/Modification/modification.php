<?php
session_start();
var_dump($_POST);
$bdd = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email AND passe = :passe');
$req->execute(array(
    'email' => $_POST['email'],
    'passe' => $_POST['passe2'],
));

$donne = $req->fetch();
var_dump($donne);
if ($donne == NULL) {
    echo "Nous sommes pas en possibilité de changer votre mot de passe !
    Nous ne trouvons pas votre email !";
}
else {
    var_dump($_POST);
    $bdd = new PDO('mysql:host=localhost;dbname=tli3;charset=utf8', 'root', '');
    $req = $bdd->prepare('UPDATE inscrit SET passe = :passe WHERE email = :email');

    $req->execute(array(
        'email' => $_POST['email'],
        'passe' => $_POST['passe'],
    ));
    echo "Votre mot de passe a été changer avec succes ! ";
}

?>
