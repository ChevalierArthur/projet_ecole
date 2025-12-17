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
</table>
