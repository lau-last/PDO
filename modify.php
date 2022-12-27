<?php
$objetPdo = new PDO('mysql:host=localhost;dbname=diary', 'root', '');

$pdoStat = $objetPdo->prepare(
    'UPDATE contact set first_name = :first_name, last_name = :last_name, phone = :phone, email = :email WHERE id = :id LIMIT 1');

$pdoStat->bindValue(':id', $_POST['idContact'], PDO::PARAM_INT);
$pdoStat->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
$pdoStat->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
$pdoStat->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
$pdoStat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

$executeIsOk = $pdoStat->execute();

if($executeIsOk){
    $message = "Le contact a été modifié dans la bdd";

}else{
    $message = "Echec de la modification";
}

require 'header.php';
require 'navbar.php';

echo "<div class='container'><h1>$message</h1></div>";

require 'footer.php';
