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
}
?>