<?php
// Opening a connection to the dairy database
$objetPdo = new PDO('mysql:host=localhost;dbname=diary', 'root', '');
// Prepare the insert query (SQL)
$pdoStat = $objetPdo->prepare('INSERT INTO contact VALUES (NULL, :first_name, :last_name, :phone, :email)');
// Bind each marker to a value
$pdoStat->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
$pdoStat->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
$pdoStat->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
$pdoStat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
// Executing the prepared statement
$insertIsOk = $pdoStat->execute();

if($insertIsOk){
    $message = "Le contact a été ajouté dans la bdd";
}else{
    $message = "Echec de l'insertion";
}

require 'header.php';
require 'navbar.php';

echo "<div class='container'><h1>$message</h1></div>";

require 'footer.php';