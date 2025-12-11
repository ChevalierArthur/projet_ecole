<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <div class="connexion">
        <form action="index.php?uc=connexion&action=Connexion" method="post">
            <h2 class="titre">Se connecter</h2>
            <label for="login">Login :</label>
            <input class="input" type="text" id="login" name="login" required placeholder="Identifiant"><br><br>
            <label for="mdp">Mot de passe :</label>
            <input type="password" class="input" id="mdp" name="mdp" required placeholder="Mot de passe"><br><br>
            <input class='btn-principal'type="submit" value="Se connecter"><br><br>
            <button class='btn-secondaire' onclick="location.href='index.php?uc=auth&action=Inscription'">S'inscrire</button></form>
        </div>
</div>
</body>
</html>