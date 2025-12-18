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
?>
</table>
