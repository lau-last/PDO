<?php
$objetPdo = new PDO('mysql:host=localhost;dbname=diary', 'root', '');
$pdoStat = $objetPdo->prepare('SELECT * FROM contact WHERE id = :id');
$pdoStat->bindValue(':id', $_GET['idContact'], PDO::PARAM_INT);
$executeIsOk = $pdoStat->execute();
$contact = $pdoStat->fetch();

require 'header.php';
require 'navbar.php';
?>

    <div class="container">
        <h1>Modify contact</h1>
        <form action="modify.php" method="post">
            <input type="text" name="idContact" class="form-control" value="<?php echo $contact['id'] ?>">
            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $contact['first_name']?>" >
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $contact['last_name']?>">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $contact['phone']?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $contact['email']?>">
            </div>
            <input type="submit" class="btn btn-primary mt-4" value="Enregistrer les modifications">
        </form>
    </div>

<?php
require 'footer.php';
