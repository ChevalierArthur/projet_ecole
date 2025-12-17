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
        $eleves = getElevesByClasse($_REQUEST['idclasse']);
        $evaluations = getEvaluationsByClasse($_REQUEST['idclasse']);
        $notes = getNotesByClasse($_REQUEST['idclasse']);
        include "vues/v_note.php" ;
        break ;
    }
}
?>