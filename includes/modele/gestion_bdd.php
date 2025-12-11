<?php
function verificationConnexion($login,$mdp){
    require "connexion.php";
    $req = $bdd->prepare('SELECT * FROM tb_enseignant WHERE identifiant = ? AND Motdepasse = ?');
    $req->execute([$login, $mdp]);
    $resultat = $req->fetch();
    if($resultat > 0)
        {
        $_SESSION['id'] = $resultat['idUser'];
        $_SESSION['role'] = 'enseignant';
        }
    else{
        $req = $bdd->prepare('SELECT * FROM tb_eleve WHERE loginEleve = ? AND mdpEleve = ?');
    $req->execute([$login, $mdp]);
    $resultat = $req->fetch();
    if($resultat > 0){
        $_SESSION['id'] = $resultat['idEleve'];
        $_SESSION['role'] = 'eleve';
    }
    else{
        $req = $bdd->prepare('SELECT * FROM tb_admin WHERE login = ? AND mdp = ?');
    $req->execute([$login, $mdp]);
    $resultat = $req->fetch();
    if($resultat > 0)
        {
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['role'] = 'admin';
        }
    }
    }
}
?>