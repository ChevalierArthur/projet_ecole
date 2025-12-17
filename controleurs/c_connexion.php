<?php
if(!isset($_REQUEST['action'])) {
    $action = "affichage" ;
}
else {
    $action = $_REQUEST['action'] ;
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
        if(($_SESSION['role'] == 'admin') || ($_SESSION['role'] == 'enseignant') ){
        header('Location: index.php?uc=classe');
        }
        else{
        header('Location: index.php');
    }
        break ;} 
    
}
?>