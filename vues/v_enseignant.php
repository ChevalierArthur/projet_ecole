<table>
<?php
foreach ($donnees as $enseignant) {

    if (!isset($enseignant['identifiant'])) {
        continue;
    }

    $idenseignant = $enseignant['idUser'];
    $nomenseignant = $enseignant['nom'];
    $prenomenseignant = $enseignant['prenom'];
    $loginenseignant = $enseignant['identifiant'];

    echo "<tr>";

    if (isset($_REQUEST['action']) &&
        $_REQUEST['action'] == 'modifier' &&
        isset($_REQUEST['idenseignant']) &&
        $_REQUEST['idenseignant'] == $idenseignant) {

        echo "
        <form action=\"index.php?uc=Enseignant&action=validermodif&idenseignant={$idenseignant}\" method=\"post\">
            <input type=\"hidden\" name=\"idenseignant\" value=\"{$idenseignant}\">
            <td><input type=\"text\" name=\"nomenseignant\" value=\"{$nomenseignant}\"></td>
            <td><input type=\"text\" name=\"prenomenseignant\" value=\"{$prenomenseignant}\"></td>
            <td><input type=\"text\" name=\"loginenseignant\" value=\"{$loginenseignant}\"></td>
            <td><input type=\"submit\" value=\"Valider\"></td>
        </form>
        ";
    } else {
        echo "
        <td>{$nomenseignant}</td>
        <td>{$prenomenseignant}</td>
        <td>{$loginenseignant}</td>
        <td>
            <form action=\"index.php?uc=Enseignant&action=modifier&idenseignant={$idenseignant}\" method=\"post\">
                <input type=\"hidden\" name=\"idenseignant\" value=\"{$idenseignant}\">
                <input type=\"submit\" value=\"Modifier\">
            </form>
        </td>
        <td>
            <form action=\"index.php?uc=Enseignant&action=supprimer&idenseignant={$idenseignant}\" method=\"post\">
                <input type=\"hidden\" name=\"idenseignant\" value=\"{$idenseignant}\">
                <input type=\"submit\" value=\"Supprimer\">
            </form>
        </td>
        ";
    }

    echo "</tr>";
}
?>
</table>
