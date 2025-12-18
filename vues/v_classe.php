<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe</title>
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
    <?php if($_SESSION['role'] == 'admin') { ?>
    <button onclick="showForm()">Ajouter une classe</button>

    <div id="alertForm" style="display:none; position:fixed; top:30%; left:50%; transform:translate(-50%, -50%);
        padding:20px; z-index:1000; ">
        <form action="index.php?uc=classe&action=ajouter" method="post">
            <input type="text" name="libelleClasse" placeholder="Nom de la classe" required><br><br>
            <input type="text" name="niveaux" placeholder="Niveaux" required><br><br>
            <input type="submit" value="Ajouter">
            <button type="button" onclick="hideForm()">Annuler</button>
        </form>
    </div>

    <div id="overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
        background:rgba(0,0,0,0.5); z-index:500;" onclick="hideForm()"></div>

    <script>
        function showForm(){
            document.getElementById('alertForm').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
        function hideForm(){
            document.getElementById('alertForm').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
<?php } ?>
    <?php 
    foreach($classe as $classeinfo){ 
        $count = 0;
        
        foreach($eleve as $eleveinfo){ 
            if($eleveinfo['idclasseeleve'] == $classeinfo['idclasse']){
                $count++;
            }
        }
        if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'modif' && isset($_REQUEST['id']) && $_REQUEST['id'] == $classeinfo['idclasse']) 
        {
            echo '<div class="classe-card">
                    <form style="display:contents;" action="index.php?uc=classe&action=modifierClasse&id='.$classeinfo['idclasse'].'" method="post">
                        <label for="libelleClasse">Libellé de la classe :</label>
                        <input type="text" id="libelleClasse" name="libelleClasse" value="'.$classeinfo['libelleClasse'].'" required>
                        <input type="submit" value="Enregistrer">
                    </form>';
        }
        else{?>
            <div class="classe-card">
            
            <div class="card-header" onclick="window.location='index.php?uc=gestion&action=afficher&id=<?php echo $classeinfo['idclasse']; ?>';">
                <h2><?php echo $classeinfo['libelleClasse']; ?></h2>
                <span class="eleve-count"><?php echo $count; ?> élève<?php if($count > 1) { echo 's'; } ?></span>
            </div><?php
            
        }
    ?>
            <div class="card-content">Niveaux : <?php echo $classeinfo['niveaux']; ?></div>
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
                    <?php if($_SESSION['role']) { ?>
                    <button class="btn-modifier" onclick="window.location='index.php?uc=classe&action=modif&id=<?php echo $classeinfo['idclasse']; ?>'; event.stopPropagation();">
                        Modifier
                    </button>
                    <?php if($count == 0) { ?>
                        
                    <button class="btn-supprimer" onclick="if(confirm('Supprimer cette classe ?')){ window.location='index.php?uc=classe&action=supprimer&id=<?php echo $classeinfo['idclasse']; ?>'; }">
                        Supprimer
                    </button>
                    <?php } ?>
                    <?php }?>
                </div>
            </div>
            
        </div>
        
    <?php } ?>
    
</body>
</html>