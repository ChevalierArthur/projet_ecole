<?php
if(!isset($_SESSION['id'])){
    header('Location: index.php');
}
if (!isset($_REQUEST['action'])) {
    $action = "affichage" ;
}
else {
    $action = $_REQUEST['action'] ;
}
switch($action){
    case 'affichage' : {
        if($_SESSION['role'] == 'enseignant'){
            [$classe,$eleve] = afficherclasses($_SESSION['id']);
        }
        else{
            [$classe,$eleve] = afficherclasses(null);
        }

        include "vues/v_classe.php" ;
        break ;
    }
    case 'modif' : {
        if($_SESSION['role'] == 'enseignant'){
            [$classe,$eleve] = afficherclasses($_SESSION['id']);
        }
        else{
            [$classe,$eleve] = afficherclasses(null);
        }

        include "vues/v_classe.php" ;
        break ;
    }
    case 'modifierClasse' : {
        $idclasse = $_REQUEST['id'];
        $libelleClasse = $_POST['libelleClasse'];
        modifierClasse($idclasse, $libelleClasse);
        header('Location: index.php?uc=classe');
        break ;
    }
    case 'supprimer' : {
        $idclasse = $_REQUEST['id'];
        supprimerClasse($idclasse);
        header('Location: index.php?uc=classe');
        break ;
    }
    case 'ajouter' : {
        $libelleClasse = $_POST['libelleClasse'];
        $niveaux = $_POST['niveaux'];
        ajouterClasse($libelleClasse, $niveaux);
        header('Location: index.php?uc=classe');
        break ;
    }
}
?>