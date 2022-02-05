<?php 
require_once("admin/connection.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title>Mot du représentant résident</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="img/log_1.jpg" />
  
</head>
<body>

<div class="main">   
  <?php include("entete.php"); ?>
<!--   Start Blog with Sidebar   -->

<?php 
                $info = $bdd->prepare("SELECT * from propos where idinfos = 1");
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
  <section class="blog-header section-padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center">
          
          <h1 class="section-title"><?php echo $titre ?></h1>
        </div>
      </div>
    </div>
  </section>
  <section class="blog-sidebar">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-8">
          <div class="">
            <div class="sidebar-blog-content">
              <div class="row">
                <div class="col-xs-12">
                  
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  
                </div>
                <div class="wow zoomIn col-xs-12 col-sm-9 col-md-10">
                 <h1><?php echo $titre ?></h1>
                  <p class="paragraphe">
                    Bienvenue sur le portail web de l'Institut Africain d'informatique, représentation du TOGO.  
                  </p>
                  <p class="paragraphe"> Ouvert le 22 octobre 2002, l'IAI-TOGO est une école inter-Etats d'enseignement
                     supérieur en Informatique. Il est membre du réseau IAI créé le 29 janvier 1971 à Fort Lamy (actuel Ndjaména)
                      en république de TCHAD. Après quinze années d'existence, il convient de rendre plus visible l'Institut et de 
                      communiquer davantage avec nos partenaires. C'est le but de ce portail conçu pour vous permettre de prendre
                       connaissance des missions, objectifs, activités et offres de formations de l'IAI-TOGO. C'est le lieu de remercier
                        tous les partenaires de l'IAI-TOGO pour la confiance et les efforts consentis.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <div class="sidebar-blog-content">
              <div class="row">
                <div class="wow zoomIn col-xs-12">                 
                </div>
                <div class="col-xs-2 col-sm-3 col-md-2">                  
                </div>
                <div class="wow zoomIn col-xs-12 col-sm-9 col-md-10">              
                </div>
              </div>
            </div>
          </div>
          <div class="">
            <div class="sidebar-blog-content">
              <div class="row">
                <div class="wow zoomIn col-xs-12">                
                </div>
                <div class="wow zoomIn col-xs-2 col-sm-3 col-md-2">                
                </div>
                <div class="wow zoomIn col-xs-12 col-sm-9 col-md-10">                 
                  <div class="">                 
                  </div>                 
                </div>
              </div>
            </div>
          </div>
          <div class="pagination-content">
            <div class="container-fluid">
              <div class="row">
                <div class="wow zoomIn col-xs-12 col-sm-10 col-sm-offset-2 ">
                  <nav>
                    <ul class="pagination  pagination-lg">                  
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wow zoomIn col-xs-12 col-sm-12 col-md-4 "> <!-- col-xs-12 col-sm-12 col-md-4  -->
          <div class="sidebar">
            <div class="list-group">
              <a href="#" class="list-group-item active">
                categories
              </a>
              <a href="mot_du_D&G.php" class="list-group-item">Mot du représentant résidant</a>
              <a href="institut.php" class="list-group-item">L'institut</a>
              <a href="admission.php" class="list-group-item">Admission</a>
            </div><!-- /.list-group -->
          </div><!-- sidebar -->
        </div>
      </div><!-- row -->
    </div><!-- container -->
  </section>
<!-- footer -->
<?php include("footer.php"); ?>
</body>
</html>