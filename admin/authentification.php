<?php require_once('connection.php');?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style/stylecss.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="/projet_web/vendor/flat-icon/flaticon.css">
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            <label for="avertissement"></label>
            <form action="index.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Pseudo<i class="flaticon-male80"></i></b></label>
                <input type="text" placeholder="Entrer votre pseudo/nom d'utilisateur" name="PrenomAdmin" >

                <label><b> Mot de passe<i class="flaticon-key142"></i></b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="motdepasse" >

                <input type="submit" name='submit' value='LOGIN' >
                <?php
               
                ?>
                <center><a href="/projet_web"><-- aller sur le site</a></center>
            </form>
            
            
        </div>
    </body>
    <!-- kivi -->
</html>