<?php
if (!isset($_REQUEST['uc']) || !isset($_SESSION['id'])) {
    $uc = "connexion" ;
}
else {
    $uc = $_REQUEST['uc'] ;
}
switch($uc){
    case 'connexion' : {  include "c_connexion.php" ; break ;} 
}
?>