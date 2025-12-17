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
        $donnees = afficherEleves();
        include "vues/v_gestionCompte.php" ;
        break ;
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