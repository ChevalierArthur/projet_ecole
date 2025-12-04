<?php
if (!isset($_REQUEST['uc'])) {
    $uc = "connexion" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}
switch($uc){
    case 'connexion' : {  include "c_connexion.php" ; break ;} 
}
?>