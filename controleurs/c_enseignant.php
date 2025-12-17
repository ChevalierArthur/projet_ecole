<?php
if (!isset($_REQUEST['action'])) {
    $action = "afficher";
} else {
    $action = $_REQUEST['action'];
}

switch($action) {

    case 'afficher': {
        $donnees = afficherEnseignant();
        include "vues/v_Enseignant.php";
        break;
    }

    case 'modifier': {
        $idenseignant = $_REQUEST['idenseignant'];
        $donnees = afficherEnseignant();
        include "vues/v_Enseignant.php";
        break;
    }

    case 'validermodif': {
        $idenseignant = $_POST['idenseignant'];
        $nomenseignant = $_POST['nomenseignant'];
        $prenomenseignant = $_POST['prenomenseignant'];
        $loginenseignant = $_POST['loginenseignant'];
        modifierEnseignant($idenseignant, $nomenseignant, $prenomenseignant, $loginenseignant);
        $donnees = afficherEnseignant();
        include "vues/v_Enseignant.php";
        break;
    }

    case 'supprimer': {
        $idenseignant = $_REQUEST['idenseignant'];
        supprimerEnseignant($idenseignant);
        $donnees = afficherEnseignant();
        include "vues/v_Enseignant.php";
        echo "Enseignant supprimé";
        break;
    }
}
?>
