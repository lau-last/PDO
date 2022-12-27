<?php
// Opening a connection to the dairy database
$objetPdo = new PDO('mysql:host=localhost;dbname=diary', 'root', '');
// Prepare the insert query (SQL)
$pdoStat = $objetPdo->prepare('SELECT * FROM contact ORDER BY first_name ASC');

$executeIsOk = $pdoStat->execute();

$contacts = $pdoStat->fetchAll();

require 'header.php';
require 'navbar.php';
?>

    <div class="container">
        <h1 class="mb-5">Liste des contacts</h1>

        <ul>
            <?php foreach ($contacts as $contact): ?>
                <li class="mb-5">
                    <?php echo '<strong>first-name</strong> : ' . $contact['first_name'] . '<br>' ?>
                    <?php echo '<strong>last-name</strong> : ' . $contact['last_name'] . '<br>' ?>
                    <?php echo '<strong>phone</strong> : ' . $contact['phone'] . '<br>' ?>
                    <?php echo '<strong>e-mail</strong> : ' . $contact['email'] . '<br>' ?>
                    <a href="delete.php?idContact=<?php echo $contact['id'] ?>">Delete</a>
                    <br>
                    <a href="form_modify.php?idContact=<?php echo $contact['id'] ?>">modify</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


<?php
require 'footer.php';
?>