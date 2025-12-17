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
function afficherclasses($idprof){
    require "connexion.php";
    if(!isset($idprof)){
        $req = $bdd->prepare('SELECT idclasse , libelleClasse FROM tb_classe');
        $req->execute();
        $classe = $req->fetch();
        $req = $bdd->prepare('SELECT nomeleve , prenomeleve, idclasseeleve FROM tb_eleve');
        $req->execute();
        $eleve = $req->fetch();
        $classeinfo = [$classe];
        $eleveinfo = [$eleve];
    }
    else
        {
        $req = $bdd->prepare('SELECT c.idclasse , libelleClasse FROM tb_classe c inner join tb_enseignant e on e.idclasse = c.idclasse where e.idUser = ?');
        $req->execute($idprof);
        $classe = $req->fetch();
        $req = $bdd->prepare('SELECT nomeleve , prenomeleve, idclasseeleve FROM tb_eleve where idclasseeleve in (select idclasse from tb_enseigner where iduser = ?)');
        $req->execute($idprof);
        $eleve = $req->fetch();
        $classeinfo = [$classe];
        $eleveinfo = [$eleve];
        }
    return [$classeinfo, $eleveinfo];
}

function afficherelevesclasse($idclasse){
    require "connexion.php";
    $req = $bdd->prepare('SELECT nomeleve , prenomeleve FROM tb_eleve where idclasseeleve = ?');
    $req->execute([$idclasse]);
    $eleve = $req->fetchAll();
    return $eleve;
}

function afficherEleves($id){
    require "connexion.php";
    $req = $bdd->prepare('select ideleve, nomeleve, prenomeleve, loginEleve from tb_eleve where idclasseeleve = ?');
    $req->execute([$id]);
    $eleve = $req->fetchAll();
    return $eleve;
}

function afficherEnseignant(){
    require "connexion.php";
    $req = $bdd->prepare('select nom, prenom, identifiant from tb_enseignant');
    $req->execute();
    $enseignant = $req->fetchAll();
    return $enseignant;
}

function supprimerEleves($id){
    require "connexion.php";
    $req = $bdd->prepare('delete from tb_eleve where ideleve = ?');
    $req->execute([$id]);
    return "réussi";
}
?>