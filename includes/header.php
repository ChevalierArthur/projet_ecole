<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<?php if(isset($_SESSION['id'])) { ?>
<body><div class="container">
    <header>
        <?php if($_SESSION['role'] == 'admin') { ?>
            <a href="index.php?uc=classe">Classe</a>
            <?php } ?>
            <a href="index.php?uc=gestion&action=afficher">affichage gestion</a>
            <form action="index.php?uc=deconnexion" method="post">
                <input class="btn-deconnexion" type="submit" value="Se déconnecter">
            </form>
        </div>
    </header>
<?php
}
?>
<body><div class="container">
    <header>
    </header>