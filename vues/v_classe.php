<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe</title>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
    
    <?php 
    foreach($classe as $classeinfo){ 
        $count = 0;
        foreach($eleve as $eleveinfo){ 
            if($eleveinfo['idclasseeleve'] == $classeinfo['idclasse']){
                $count++;
            }
        }
    ?>
    
        <div class="classe-card" onclick="window.location='index.php?uc=gestion&action=afficher&id=<?php echo $classeinfo['idclasse']; ?>'">
            
            <div class="card-header">
                <h2><?php echo $classeinfo['libelleClasse']; ?></h2>
                <span class="eleve-count"><?php echo $count; ?> élève<?php if($count > 1) { echo 's'; } ?></span>
            </div>
            
            <div class="card-content">
                <div class="section-title">Liste des élèves :</div>
                
                <?php 
                if($count > 0){
                    foreach($eleve as $eleveinfo){ 
                        if($eleveinfo['idclasseeleve'] == $classeinfo['idclasse']){ 
                ?>
                    <div class="eleve-classe">
                        <?php echo $eleveinfo['prenomeleve'] . ' ' . $eleveinfo['nomeleve']; ?>
                    </div>
                <?php 
                        }
                    }
                } else {
                ?>
                    <div class="no-eleve">Aucun élève dans cette classe</div>
                <?php 
                }
                ?>
                
                <div class="card-actions">
                    <button class="btn-modifier" onclick="window.location='index.php?uc=classe&action=modifeleve&id=<?php echo $classeinfo['idclasse']; ?>'; event.stopPropagation();">
                        Modifier
                    </button>
                    <button class="btn-supprimer" onclick="if(confirm('Supprimer cette classe ?')){ window.location='index.php?uc=classe&action=supprimer&id=<?php echo $classeinfo['idclasse']; ?>'; } event.stopPropagation();">
                        Supprimer
                    </button>
                </div>
            </div>
            
        </div>
        
    <?php } ?>
    
</body>
</html>