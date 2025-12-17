<?php
if(!isset($_REQUEST['action'])) {
    $action = "afficher" ;
}
else {
    $action = $_REQUEST['action'] ;
}
switch($action){
    case 'afficher' : {
        $donnees = afficherEleves($_REQUEST['id']);
        include "vues/v_gestionCompte.php" ;
        break ;
    }
    
    case 'modifier' : {
        $id = $_REQUEST['id'];
        $ideleve = $_REQUEST['ideleve'];
        $donnees = afficherEleves($id);
        include "vues/v_gestionCompte.php" ;
        break ;
    }

    case 'validermodif' : {
        $idclasse= $_REQUEST['id'];
        $id = $_POST['ideleve'];
        $nom = $_POST['nomeleve'];
        $prenom = $_POST['prenomeleve'];
        $login = $_POST['logineleve'];
        modifierEleve($id,$nom,$prenom,$login);
        $donnees = afficherEleves($idclasse);
        include "vues/v_gestionCompte.php";
        break;
    }

    case 'supprimer' :{
        $resultat = supprimerEleves($_REQUEST['id']);
        $donnees = afficherEleves();
        include "vues/v_gestionCompte.php";
        if(isset($resultat)){
            echo'Eleve supprimer';
        }
        break;
    }
}
?>