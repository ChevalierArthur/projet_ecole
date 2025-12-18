<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe</title>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
<?php if ($_SESSION['role'] == 'admin') { ?>
    <button onclick="showEleveForm()">Ajouter un élève</button>

    <div id="eleveForm" style="display:none; position:fixed; top:30%; left:50%;
        transform:translate(-50%, -50%); padding:20px; z-index:1000;">
        
        <h3>Ajouter un élève</h3>

        <form action="index.php?uc=gestion&action=ajouter" method="post">
            <input type="text" name="nomeleve" placeholder="Nom" required><br><br>
            <input type="text" name="prenomeleve" placeholder="Prénom" required><br><br>
            <input type="text" name="loginEleve" placeholder="Login" required><br><br>
            <input type="password" name="mdpEleve" placeholder="Mot de passe" required><br><br>
            <input type="hidden" name="idclasse" value="<?= $_REQUEST['id'] ?>">
            <input type="submit" value="Ajouter">
            <button type="button" onclick="hideEleveForm()">Annuler</button>
        </form>
    </div>

    <div id="overlayEleve" style="display:none; position:fixed; top:0; left:0;
        width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:500;"
        onclick="hideEleveForm()"></div>

    <script>
        function showEleveForm(){
            document.getElementById('eleveForm').style.display = 'block';
            document.getElementById('overlayEleve').style.display = 'block';
        }
        function hideEleveForm(){
            document.getElementById('eleveForm').style.display = 'none';
            document.getElementById('overlayEleve').style.display = 'none';
        }
    </script>
<?php } ?>


<table>
<?php
foreach ($donnees as $eleve) {

    if (!isset($eleve['ideleve'])) {
        continue;
    }

    $id = $eleve['ideleve'];
    $nom = $eleve['nomeleve'];
    $prenom = $eleve['prenomeleve'];
    $login = $eleve['loginEleve'];

    echo "<tr>";

    if (
        isset($_REQUEST['action']) &&
        $_REQUEST['action'] == 'modifier' &&
        isset($_REQUEST['ideleve']) &&
        $_REQUEST['ideleve'] == $id
    ) {

        echo '  
        <form action="index.php?uc=gestion&action=validermodif&id=' . $_REQUEST['id'] . '&ideleve=' . $id . '" method="post">
            <input type="hidden" name="ideleve" value="' . $id . '">
            <input type="hidden" name="idclasse" value="' . $_REQUEST['id'] . '">
            <td><input type="text" name="nomeleve" value="' . $nom . '"></td>
            <td><input type="text" name="prenomeleve" value="' . $prenom . '"></td>
            <td><input type="text" name="logineleve" value="' . $login . '"></td>
            <td><input type="submit" value="Valider"></td>
        </form>';

    } else {

        echo "
        <td>$nom</td>
        <td>$prenom</td>
        <td>$login</td>

        <td>
            <form action=\"index.php?uc=gestion&action=modifier&id={$_REQUEST['id']}&ideleve={$id}\" method=\"post\">
                <input type=\"hidden\" name=\"ideleve\" value=\"{$id}\">
                <input type=\"hidden\" name=\"idclasse\" value=\"{$_REQUEST['id']}\">
                <input type=\"submit\" value=\"Modifier\">
            </form>
        </td>

        <td>
            <form action=\"index.php?uc=gestion&action=supprimer&id=$id\" method=\"post\">
                <input type=\"hidden\" name=\"id\" value=\"$id\">
                <input type=\"submit\" value=\"Supprimer\">
            </form>
        </td>
        ";
    }

    echo "</tr>";
}

?>
</body>
</table>
