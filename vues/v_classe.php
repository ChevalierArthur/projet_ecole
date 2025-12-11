<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe</title>
</head>
<body>
    <?php foreach($classe as $classeinfo){ ?>
        <div class="classe-card" href="index.php?uc=classe&action=modifeleve&id=<?php $classeinfo['idclasse']; ?>">
            <h2><?php echo htmlspecialchars($classeinfo['libelleClasse']); ?></h2>
                Élèves :
                <?php foreach($eleve as $eleveinfo){ 
                    if($eleveinfo['idclasseeleve'] == $classeinfo['idclasse']){ ?>
                    <div class = "eleve-classe"><?php echo htmlspecialchars($eleveinfo['prenomeleve'] . ' ' . $eleveinfo['nomeleve']); ?></div>
                <?php } } ?>
        </div>
    <?php } ?>
</body>
</html>