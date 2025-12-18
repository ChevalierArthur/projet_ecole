<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Enseignant</title>

</head>
<body>
    <div class="container">
        <h1>Modifier l'Enseignant</h1>
        
        <?php if (isset($_GET['success']) && $_GET['success'] == '1') { ?>
            <div class="info-message">
                Les modifications ont été enregistrées avec succès !
            </div>
        <?php } ?>
        
        <?php if (!empty($enseignant) && isset($enseignant[0])) { 
            $enseignantData = $enseignant[0];
        ?>
            <div class="form-section">
                <h2>Informations personnelles</h2>
                <form action="index.php?action=validermodif" method="POST">
                    <input type="hidden" name="idenseignant" value="<?php echo htmlspecialchars($idenseignant); ?>">
                    
                    <div class="form-row">
                        <div class="form-column">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" id="nom" name="nom" 
                                       value="<?php echo htmlspecialchars($enseignantData['nom']); ?>" 
                                       required>
                            </div>
                        </div>
                        
                        <div class="form-column">
                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <input type="text" id="prenom" name="prenom" 
                                       value="<?php echo htmlspecialchars($enseignantData['prenom']); ?>" 
                                       required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="identifiant">Identifiant :</label>
                        <input type="text" id="identifiant" name="identifiant" 
                               value="<?php echo htmlspecialchars($enseignantData['identifiant']); ?>" 
                               required>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn">Enregistrer les modifications</button>
                        <a href="index.php?uc=Enseignant" class="btn btn-secondary">Retour à la liste</a>
                    </div>
                </form>
            </div>
            
            <div class="table-section">
                <h2>Classes et Matières enseignées</h2>
                
                <?php if (!empty($classe) || !empty($matiere)) { ?>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Classe</th>
                                    <th style="width: 70%;">Matière(s) enseignée(s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (!empty($classe)) { 
                                    foreach ($classe as $classeItem) {
                                ?>
                                    <tr>
                                        <td style="font-weight: bold;">
                                            <?php echo htmlspecialchars($classeItem['libelleclasse']); ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($matiere)) { ?>
                                                <div>
                                                    <?php foreach ($matiere as $matiereItem) { ?>
                                                        <span class="matiere-item">
                                                            <?php echo htmlspecialchars($matiereItem['libellemat']); ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            <?php } else { ?>
                                                <span style="color: #999; font-style: italic;">Aucune matière assignée</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php 
                                    }
                                } else { 
                                ?>
                                    <tr>
                                        <td style="font-style: italic; color: #999;">
                                            Aucune classe assignée
                                        </td>
                                        <td>
                                            <?php if (!empty($matiere)) { ?>
                                                <div>
                                                    <?php foreach ($matiere as $matiereItem) { ?>
                                                        <span class="matiere-item">
                                                            <?php echo htmlspecialchars($matiereItem['libellemat']); ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            <?php } else { ?>
                                                <span style="color: #999; font-style: italic;">Aucune matière assignée</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                <?php } else { ?>
                    <div class="no-data">
                        Cet enseignant n'est actuellement assigné à aucune classe ni matière.
                    </div>
                <?php } ?>
            </div>
            
        <?php } else { ?>
            <div class="no-data">
                Aucun enseignant trouvé avec cet identifiant.
                <div style="margin-top: 20px;">
                    <a href="liste_enseignants.php" class="btn">Retour à la liste des enseignants</a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>