<?php
if(!isset($_REQUEST['action'])) {
    $action = "affichage" ;
}
else {
    $action = $_REQUEST['uc'] ;
}
switch($action){
    case 'connexion' : {  include "c_connexion.php" ; break ;} 
    case 'deconnexion' : {  include "includes/modele/deconnexion.php" ; break ;} 
}
?>