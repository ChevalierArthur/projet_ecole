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
        $req = $bdd->prepare('SELECT idclasse , libelleClasse, niveaux FROM tb_classe');
        $req->execute();
        $classe = $req->fetchAll();
        $req = $bdd->prepare('SELECT nomeleve , prenomeleve, idclasseeleve FROM tb_eleve');
        $req->execute();
        $eleve = $req->fetchAll();

        $classeinfo = $classe;
        $eleveinfo = $eleve;
    }
    else
    {
        $req = $bdd->prepare('SELECT c.idclasse , libelleClasse, niveaux FROM tb_classe c inner join tb_enseigner e on e.idclasse = c.idclasse where e.idUser = ?');
        $req->execute([$idprof]);
        $classe = $req->fetchAll();
        $req = $bdd->prepare('SELECT nomeleve , prenomeleve, idclasseeleve FROM tb_eleve where idclasseeleve in (select idclasse from tb_enseigner where iduser = ?)');
        $req->execute([$idprof]);
        $eleve = $req->fetchAll();

        $classeinfo = $classe;
        $eleveinfo = $eleve;
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
    $req = $bdd->prepare('select idUser, nom, prenom, identifiant from tb_enseignant');
    $req->execute();
    $enseignant = $req->fetchAll();
    return $enseignant;
}

function supprimerEleves($id){
    require "connexion.php";
    $req = $bdd->prepare('delete from tb_eleve where ideleve = ?');
    $req->execute([$id]);
    return;
}
function modifierClasse($idclasse, $libelleClasse){
    require "connexion.php";
    $req = $bdd->prepare('update tb_classe set libelleClasse = ? where idclasse = ?');
    $req->execute([$libelleClasse, $idclasse]);
    return;
}
function supprimerClasse($idclasse){
    require "connexion.php";
    $req = $bdd->prepare('delete from tb_classe where idclasse = ?');
    $req->execute([$idclasse]);
    return ;
}
function getEleveByclasse($idclasse){
    require "connexion.php";
    $req = $bdd->prepare('select ideleve, nomeleve, prenomeleve from tb_eleve where idclasseeleve = ?');
    $req->execute([$idclasse]);
    $eleve = $req->fetchAll();
    return $eleve;
}

function modifierEleve($id,$nom,$prenom,$logineleve){
    require "connexion.php";
    $req = $bdd->prepare('update tb_eleve set nomeleve = ?, prenomeleve = ?, loginEleve = ? where idEleve = ?');
    $req->execute([$nom,$prenom,$logineleve,$id]);
}

function modifierEnseignant($idenseignant, $nom, $prenom, $loginenseignant){
    require "connexion.php";
    $req = $bdd->prepare('UPDATE tb_enseignant SET nom = ?, prenom = ?, identifiant = ? WHERE idUser = ?');
    $req->execute([$nom, $prenom, $loginenseignant, $idenseignant]);
}

function supprimerEnseignant($idenseignant){
    require "connexion.php";
    $req = $bdd->prepare('DELETE FROM tb_enseignant WHERE idUser = ?');
    $req->execute([$idenseignant]);
    return;
}

function ajouterEleve($nom, $prenom, $login, $mdp, $idclasse){
    require "connexion.php";
    $req = $bdd->prepare(
        'INSERT INTO tb_eleve (nomeleve, prenomeleve, loginEleve, mdpEleve, idclasseeleve)
        VALUES (?, ?, ?, ?, ?)'
    );
    $req->execute([$nom, $prenom, $login, $mdp, $idclasse]);
}

?>