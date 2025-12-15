<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
    
    <?php 
    if(isset($_SESSION['id'])) { 
    ?>
        <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>
        
        <header>
            <?php 
            if($_SESSION['role'] == 'admin') { 
            ?>
                <a href="index.php?uc=classe">Classes</a>
            <?php 
            } 
            ?>
            
            <a href="index.php?uc=gestion&action=afficher">Gestion</a>
            
            <form action="index.php?uc=deconnexion" method="post">
                <input type="submit" value="Déconnexion">
            </form>
        </header>
        
        <script>
        function toggleSidebar() {
            document.body.classList.toggle('sidebar-hidden');
        }
        </script>
    <?php 
    } 
    ?>
    
    <div class="container">