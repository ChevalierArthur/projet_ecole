<?php
if(!isset($_REQUEST['action'])) {
    $action = "affichage" ;
}
else {
    $action = $_REQUEST['action'] ;
}
switch($action){
    case 'affichage' : {
        $donnees = 
        include "vues/v_gestionCompte.php" ;
        break ;
    }
}
?>