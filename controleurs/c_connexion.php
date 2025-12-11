<?php
if(!isset($_REQUEST['action'])) {
    $action = "affichage" ;
}
else {
    $action = $_REQUEST['uc'] ;
}
switch($action){
    case 'affichage' : {
        include "vues/v_connexion.php" ;
        break ;
    }
    case 'connexion' : 
        {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        verificationConnexion($login,$mdp);  
        header('Location: index.php');
        break ;} 
    
}
?>