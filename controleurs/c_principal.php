<?php
if (!isset($_REQUEST['uc']) || !isset($_SESSION['id'])) {
    $uc = "connexion" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}
switch($uc){
    case 'connexion' : {  include "c_connexion.php" ; break ;} 
    case 'deconnexion' : {  include "c_deconnexion.php" ; break ;} 
    case 'classe' : {  include "c_classe.php" ; break ;}
    case 'gestion': {include "c_gestion.php"; break;}
}
?>