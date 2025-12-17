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
        isset($_REQUEST['id']) &&
        $_REQUEST['id'] == $id
    ) {

        echo '
        <form action="index.php?uc=gestion&action=validermodif&id=' . $id . '" method="post">
            <input type="hidden" name="id" value="' . $id . '">
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
            <form action=\"index.php?uc=gestion&action=modifier&id=$id\" method=\"post\">
                <input type=\"hidden\" name=\"id\" value=\"$id\">
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
</table>
