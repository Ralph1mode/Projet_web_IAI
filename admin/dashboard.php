<?php  
session_start();
require_once('connection.php');
if(time() - $_SESSION['login_time'] >= 1800){
    session_destroy(); // destroy session.
    header("Location: deconnection.php");
    die(); // See https://thedailywtf.com/articles/WellIntentioned-Destruction
    //redirectionne si la page est interactive pour 3 minutes
}
else {        
   $_SESSION['login_time'] = time();
   // update 'login_time' to the last time a page containing this code was accessed.
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tree-viewer.css">
    <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" type="text/css" href="vendor/rs-plugin/css/settings.css" media="screen" />



    <!-- Flat icon css -->
    <link rel="stylesheet" href="/projet_web/vendor/flat-icon/flaticon.css">
    <title>Panel Admin</title>

    <SCRIPT LANGUAGE="JavaScript"> 
        if (window.print) {
        document.write('<form><input type=button name=print value="Print Page"onClick="window.print()"></form>');
        }


        function printData()
        {
        var divToPrint=document.getElementById("printTable");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.
        close();
        }

        function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Initialise la page  HTML avec div's HTML seulement
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print la Page
        window.print();
        //Restore ou rammène l'orignal HTML
        document.body.innerHTML = oldPage;

    }
</script>

</head>

<body>
    <div class="wrapper">
        <div class="left-side">
            <div class="logo">
                <img src="img/logo.jpg" alt="" />

            </div>
            <div class="left-content noprint">


                <ul role="tablist">
                    <li role="presentation" class="active"><a href="#one" aria-controls="home" role="tab"
                            data-toggle="tab">BIENVENUE</a></li>
                    <li role="presentation"><a href="#candidature" aria-controls="home" aria-controls="home" role="tab"
                            data-toggle="tab">GESTION DES CANDIDATURES</a></li>
                    <li role="presentation"><a href="#communique" aria-controls="home" role="tab"
                            data-toggle="tab">COMMUNIQUE</a></li>
                    <li role="presentation"><a href="#propos" aria-controls="home" role="tab" data-toggle="tab">A
                            PROPOS
                            DE IAI-TOGO</a></li>
                    <li role="presentation"><a href="#profil" aria-controls="home" role="tab" data-toggle="tab">Mon
                            profil</a></li>
                    <li role="presentation">
                        <a href="deconnection.php">Se deconnecter</a>

                    </li>
                </ul>


            </div>
            <div class="copyright">
                <p>Copyright &#169; 2022 <a href="mailto:raoukivi24@gmail.com">Raoul Kivi</a></p>
            </div>
        </div>
        <div class="right-side">
            <div class="right-content">
                <div id="one" class="content active fade in">
                    <h1><span>BIENVENUE</span> au tableau de bord administrateur</h1>
                    <div class="content-welcome">

                    </div>
                    <div class="created">
                        <p>
                            <label
                                for="session"><?php echo "vous êtes connecter en tant que ". $_SESSION['PrenomAdmin'];?></label>
                                
                            <br>
                            Created: 13/12/2021
                            <br> Latest Update: 28/12/2021
                            <br> By: <a href="#">RAKI</a>
                            <br>
                            <br> Merci de vous déconnecter après toutes oppération d'administation, pour des raison de
                            sécurité <a href="#">savoir plus</a>.
                            
                        </p>
                        <a href="../index.php" target="_blank"><strong><i class="flaticon-redo14"></i><i style="color: green;">Visiter le site</i></strong>  </a>
                    </div>
                </div>

                <?php
                
                               
								$requet1 = $bdd->prepare("SELECT * FROM candidat");
								$requet1->execute();
                                
                                $rapport = $bdd->prepare("SELECT COUNT(idcandidat) from candidat");
                                $rapport->execute();
                                $total = $rapport->fetchColumn();

                               

                                $rapport2 = $bdd->prepare("SELECT count(idcandidat) from candidat where sexe = 'Masculin'");
                                $rapport2->execute();
                                $total2 = $rapport2->fetchColumn();


                                $rapport3 = $bdd->prepare("SELECT count(idcandidat) from candidat where sexe = 'Feminin'");
                                $rapport3->execute();
                                $total3 = $rapport3-> fetchColumn();

                                $rapport4 = $bdd->prepare("SELECT count(idcandidat) from candidat where serie = 'D'");
                                $rapport4->execute();
                                $total4 = $rapport4->fetchColumn();

                                
                                $rapport5 = $bdd->prepare("SELECT count(idcandidat) from candidat where serie = 'E'");
                                $rapport5->execute();
                                $total5 = $rapport5->fetchColumn();

                                $rapport7 = $bdd->prepare("SELECT count(idcandidat) from candidat where serie = 'C'");
                                $rapport7->execute();
                                $total7 = $rapport7->fetchColumn();

                                $rapport6 = $bdd->prepare("SELECT count(idcandidat) from candidat where serie = 'F'");
                                $rapport6->execute();
                                $total6 = $rapport6->fetchColumn();

								 if(isset($_POST['valider']))
								{
									if($_POST['ordre'] == 'sexe')
									{
                                        $etat = "checked";
										$requet1 = $bdd->prepare("SELECT * FROM candidat ORDER BY sexe ASC");
										$requet1->execute();
                                        

									} elseif($_POST['ordre'] == 'az')
									{
                                        $etat = "checked";
										$requet1 = $bdd->prepare("SELECT * FROM candidat ORDER BY nom ASC");
										$requet1->execute();

									}elseif($_POST['ordre'] == 'za')
									{
                                        $etat = "checked";
										$requet1 = $bdd->prepare("SELECT * FROM candidat ORDER BY nom DESC");
										$requet1->execute();

									}elseif($_POST['ordre'] == 'defaut')
									{ 
                                        $etat = "checked";
										$requet1 = $bdd->prepare("SELECT * FROM candidat");
										$requet1->execute();
									
									}elseif($_POST['ordre'] == 'serie')
                                    {
                                        $requet1 = $bdd->prepare("SELECT * FROM candidat ORDER BY serie ASC");
										$requet1->execute();
                                    }
                                    
								}
                                if(isset($_POST['filtre']))
                                {
                                    if($_POST['filtre']== 'M')
                                    {
                                        $requet1 = $bdd->prepare("SELECT * FROM candidat where sexe = 'Masculin'");
										$requet1->execute();
                                    }
                                    elseif($_POST['filtre'] == 'F')
                                    {
                                        $requet1 = $bdd->prepare("SELECT * FROM candidat where sexe = 'Feminin'");
										$requet1->execute();
                                    }
                                    elseif($_POST['filtre'] == 'C')
                                    {
                                        $requet1 = $bdd->prepare("SELECT * FROM candidat where serie = 'C'");
										$requet1->execute();
                                    }
                                    elseif($_POST['filtre'] == 'D')
                                    {
                                        $requet1 = $bdd->prepare("SELECT * FROM candidat where serie = 'D'");
										$requet1->execute();
                                    }
                                    elseif($_POST['filtre'] == 'E')
                                    {
                                        $requet1 = $bdd->prepare("SELECT * FROM candidat where serie = 'E'");
										$requet1->execute();
                                    }
                                    elseif($_POST['filtre'] == 'F2')
                                    {
                                        $requet1 = $bdd->prepare("SELECT * FROM candidat where serie = 'F'");
										$requet1->execute();
                                    }
                                    elseif($_POST['filtre'] == 'tout')
                                    {
                                        $requet1 = $bdd->prepare("SELECT * FROM candidat");
										$requet1->execute();
                                    }
                                }
								
				?>

                <div id="candidature" class="content fade">
                    <h1>Gestion des candidatures</h1>
                    <form action="" method="POST">
                        <p><strong>Lister par</strong> : &nbsp Sexe &nbsp &nbsp <input type="radio" name="ordre" id=""
                                value="sexe">&nbsp &nbsp Nom
                            (A-Z) &nbsp &nbsp <input type="radio" name="ordre" id="" value="az">&nbsp &nbsp Nom (Z-A)
                            &nbsp &nbsp
                            <input type="radio" name="ordre" id="" value="za"> &nbsp &nbsp Serie<input type="radio" name="ordre" id="" value="serie">&nbsp &nbsp Par ordre inscrit
                            (défaut)&nbsp &nbsp <input type="radio" name="ordre" id="" value="defaut" checked > &nbsp &nbsp

                            <button type="submit" name="valider" class="btn btn-primary">Valider</button> <br> <hr> 
                            <button type="" name="exporter" onclick="" value="Print Table" class="btn btn-primary"><i class="flaticon-instagram20">&nbspExporter XML</i></button>
                            <button type="submit" name="imprimer" onclick="printData()" value="Print Table" class="btn btn-primary"><i class="flaticon-print26">&nbspImprimer</i> </button>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-exit15"></i>

                                    Filtre
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <button class="" disabled>Par sexe</button> <br>
                                        
                                    <button class="btn-danger" name="filtre" value="M">Masculin</button>
                                    <button class="btn-danger" name='filtre'value="F">Feminin</button> <br> <hr>
                                    <button class="" href="#" disabled>Par Serie</button> <br>
                                    <button class="btn-danger" name='filtre' value="C">C</button>
                                    <button class="btn-danger" name='filtre' value="D">D</button>
                                    <button class="btn-danger " name='filtre' value="E">E</button>
                                    <button class="btn-danger " name='filtre' value="F2">F</button>
                                    <button class="btn-danger " name='filtre' value="tout">Selectionner tout</button>
                                    </div>
                                </div>
                                </div>
                            <hr>
                            <h5><strong>Tolal inscrit : <?php echo $total ;?></strong></h5> <br>
                            <h5><strong>Fille : <?php echo $total3," | Garçon :".$total2 ;?></strong></h5> 
                            <h5><strong> Serie : <?php echo"D = 0".$total4," | E = 0".$total5," | F = 0".$total6," | C = 0".$total7 ;?></strong></h5> 
                        </p>

                    </form>

                    <table class="table table-bordered printthis" border='1' id="printTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Nom </th>
                                <th>Prenom </th>
                                <th>Sexe</th>
                                <th>Nationalité</th>
                                <th>Date de naissance </th>
                                <th>Année d'obtension de BAC</th>
                                <th>Serie</th>
                                <th>Code fichier</th>
                                <th colspan="2" class="noprint">
                                    <center>attestation</center>
                                </th>

                            </tr >
                        </thead>
                        <tbody>

                            <?php	while($requet = $requet1->fetch())
                                    
                            
								{	?>
                            <tr>

                                <td><?php  echo  $requet['idCandidat']; ?></td>
                                <td><?php  echo  $requet['nom']; ?></td>
                                <td><?php  echo  $requet['prenom']; ?></td>
                                <td><?php  echo  $requet['sexe']; ?></td>
                                <td><?php  echo  $requet['nationalite']; ?></td>
                                <td><?php  echo  $requet['datenaiss']; ?></td>
                                <td><?php  echo  $requet['anneebac']; ?></td>
                                <td><?php  echo  $requet['serie']; ?></td>
                                <td><?php  echo  $requet['code_fichier']; ?></td>
                               
                               
                                
                                <form action="downloadFile.php?code_fichier=<?php echo $requet['code_fichier'] ;?>" method="POST" >
                                <td>
                                <button type="submit" name="telecharger" class="btn btn-success" href="">TELECHARGER</button>
                                <!--button type="submit" name="ouvrir" class="btn btn-primary">OUVRIR</button-->
                                <?php  }?>
                                </td>
                                </form>


                            </tr>

                        </tbody>
                    </table>

                </div>

                <div id="communique" class="content fade">

                    <h1> communiqué du concours </h1>
                    <div>
                        
                        <h2>Type standard</h2> <br>
                        <p>Vous avez la possibilité d'uploader un communiqué sous forme PDF, en vous servant de se
                            formulaire de type standard. Si vous le souhaitez, cocher le radio suivant</p>
                    </div>

                    <form action="ajoutcommunique.php" method="POST" enctype="multipart/form-data">
                        Standard: &nbsp <input type="radio" name="type" id="yu" value="Standard">
                        <input type="hidden" name="edit_id" value="la valeur">

                        <div class="form-group">
                            <label> Titre </label>
                            <input type="text" name="titre1" value="" class="form-control"
                                placeholder="Enter le titre du communiqué">
                        </div>
                        <div class="form-group">
                            <label>Charger un fichier PDF</label>
                            <input type="file" name="commu" value="" class="form-control"
                                placeholder="uplaoder le communiqué" multiple="" accept="application/pdf">
                        </div>
                        <!--div class="form-group">
                            <label>Confirmer par votre mot de passe qu'il s'agit bien de vous</label>
                            <input type="password" name="confirme" value=""
                                class="form-control" placeholder="Enter Password">
                        </div-->


                        <button type="reset" class="btn btn-danger" name=""> Annuler </button>
                        <button type="submit" name="ajout" class="btn btn-primary"> Mettre à jour </button>

                    </form>
                    <hr>
                    <div>
                        <div style="margin-top: 50px ;">
                            <h2>Type personnalisé</h2> <br>
                            <p>Vous avez la possibilité d'uploader un communiqué sous forme personnalisé, en remplisant
                                vous même ce champs de saisi. Si vous le souhaitez, cocher le radio suivant</p>
                        </div>

                        <form action="" method="POST">
                            Personnalisé: &nbsp <input type="radio" name="type" value="Personnalisé" id="">
                            <input type="hidden" name="edit_id" value="">

                            <div class="form-group">
                                <label> Titre </label>
                                <input type="text" name="edit_username" value="" class="form-control"
                                    placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                
                                <textarea name="text" id="" cols="100" rows="10" placeholder="Saisir du texte ici"></textarea>
                               
                            </div>
                           

                            <button type="reset" class="btn btn-danger" name=""> Annuler </button>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Mettre à jour</button>

                            </for>
                    </div>
                </div>



                <div id="propos" class="content fade">

                    <div class="plugins-area">
                        <h1>A propos de IAI-TOGO</h1>
                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Mot du representant résident
</button>
 <?php 
                $info = $bdd->prepare("SELECT * from propos");
                $info->execute();
                $rows = $info->fetchAll();
            
           
                foreach($rows as $donne)
                {
                    $titre = $donne['titre'];
                    $titre2 = $donne['titre2'];
                    $titre3 = $donne['titre3'];
                    $mot = $donne['mot_du_representant'];
                    $institut = $donne['institut'];
                    $admission = $donne['admissions'];
                    $date = $donne['dateinfo'];
                }

                

                
            ?>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Mot du représentant résident</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <center><label for="titre">Titre </label></center>
          <input type="text" name="titre" value="<?php echo $titre ;?>" id=""> <br> <hr>
          <center><label for="titre">Description </label></center>
        
        <textarea name="representant" id="" cols="75" rows="10"><?php echo $mot ; ?></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Enregistrer les modifications</button>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  L'institut
</button>
<?php 
                $info = $bdd->prepare("SELECT * from propos where idinfos = 1");
                $info->execute();
                $rows = $info->fetchAll();
            
           
                foreach($rows as $donne)
                {
                    $titre = $donne['titre'];
                    /*$titre2 = $donne['titre2'];
                    $titre3 = $donne['titre3'];*/
                    $mot = $donne['mot_du_representant'];
                   /* $institut = $donne['institut'];
                    $admission = $donne['admissions'];
                    $date = $donne['dateinfo'];*/
                }

                

                
            ?>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">L'institut</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <center><label for="titre">Titre </label>
          <input type="text" name="titre2" value="<?php echo $titre2 ;?>" id=""></center> <br> <hr>
          <center><label for="info">Description </label></center>
        
        <textarea name="representant" id="" cols="75" rows="10"><?php echo $institut ; ?></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Enregistrer les modifications</button>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Admission
</button>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Admission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php 
                $info2 = $bdd->prepare("SELECT * from propos where idinfos = 1");
                $info2->execute();
                $rows = $info2->fetchAll();
            
           
                foreach($rows as $donne2)
                {
                   // $titre = $donne['titre'];
                    $titre2 = $donne2['titre2'];
                    //$titre3 = $donne['titre3'];
                    //$mot = $donne['mot_du_representant'];
                    $institut = $donne2['institut'];
                   // $admission = $donne['admissions'];
                   // $date = $donne['dateinfo'];
                }

                

                
            ?>
      </div>
      <div class="modal-body">
          <center><label for="titre">Titre </label></center>
          <input type="text" name="titre3" value="<?php echo $titre3 ;?>" id=""> <br> <hr>
          <center><label for="info">Description </label></center>
        
        <textarea name="representant" id="" cols="75" rows="10"><?php echo $admission ; ?></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">Enregistrer les modifications</button>
      </div>
    </div>
  </div>
</div>
                    </div>



                </div>

                <?php  
				$sql = $bdd->prepare('SELECT * FROM adminisrtrateur') ;

				$sql -> execute();
				$rows = $sql -> fetchAll();
			
				foreach($rows as $info){
					$password = $info['Motdepasse'];
					$prenombase = $info['PrenomAdmin'];
					$emailbase = $info['Email'];
					$idadmin = $info['idAdmin'];
				
			}
			?>
                <div id="profil" class="content fade">
                    <h1> Profil administrateur</h1>
                    <label for="confirm"></label>
                    <form action="index.php" method="POST">

                        <input type="text" name="edit_id" value="<?php echo'Administrateur '. $idadmin ?>">

                        <div class="form-group">
                            <label> Nom d'utilisateur </label>
                            <input type="text" name="edit_username" value="<?php echo $prenombase ?>"
                                class="form-control" placeholder="Entrer le nom d'utilisateur">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="edit_email" value="<?php echo $emailbase ?>" class="form-control"
                                placeholder="Entrer Email">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" name="edit_password" value="<?php echo $password ?>"
                                class="form-control" placeholder="Entrer le mot de passe">
                        </div>

                        <button type="reset" name="" class="btn btn-danger"> Annuler </button>
                        <button type="submit" name="updatebtn" class="btn btn-primary"> Modifier </button>

                    </form>

                    <form action="index.php" method="POST">

                        <br> <br>
                        <hr> <br>
                        <h3 style="color: green; ">Ajouter un nouveau profile</h3>



                        <div class="form-group">
                            <label>Nom : </label>
                            <input type="text" name="newname" value="" class="form-control"
                                placeholder="Entrer le nom d'utilisateur">
                        </div>
                        <div class="form-group">
                            <label> prenom d'utilisateur / Pseudo :</label>
                            <input type="text" name="newusername" value="" class="form-control"
                                placeholder="Entrer le prenom /pseudo d'utilisateur">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="newemail" value="" class="form-control"
                                placeholder="Entrer Email">
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" name="newpassword" value="" class="form-control"
                                placeholder="Entrer le mot de passe">
                        </div>
                        <div class="form-group">
                            <label>Confirmer le mot de passe</label>
                            <input type="password" name="newpassword2" value="" class="form-control"
                                placeholder="confirmation">
                        </div>

                        <a href="dashboard.php" class="btn btn-danger"> Annuler </a>
                        <button type="submit" name="adduser" class="btn btn-primary"> Valider </button>

                    </form>


                </div>

                <div id="deconnection">

                </div>
            </div>

            <script src="js/jquery-3.1.0.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jstree.min.js"></script>
            <script src="js/jstree.active.js"></script>
            <script src="js/main.js"></script>
</body>

</html>