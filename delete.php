<?php
$objetPdo = new PDO('mysql:host=localhost;dbname=diary', 'root', '');
$pdoStat = $objetPdo->prepare('DELETE FROM contact WHERE id = :id LIMIT 1');
$pdoStat->bindValue(':id', $_GET['idContact'], PDO::PARAM_INT);
$executeIsOk = $pdoStat->execute();
if($executeIsOk){
    $message = "Le contact a été supprimé";
}
else{
    $message = "Echec de la suppression du contact";
}
require 'header.php';
require 'navbar.php';
require 'footer.php';


echo "<div class='container'><h1>$message</h1></div>";