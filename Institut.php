<?php 
require_once('admin/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institut</title>
    <link rel="shortcut icon" type="image/png" href="img/log_1.jpg" />
</head>

<body>
    <?php include("entete.php"); ?>
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
                    <h1 class="section-title"><?php echo $titre2 ?></h1>
                </div>
            </div>
        </div>
    </section>

    <!--partie principale-->
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

                                    <h1>L'institut africaine d'informatique</h1>

                                    <p class="paragraphe">IAI-TOGO</p>
                                    </p>
                                    <p class="paragraphe">
                                        En application de la décision du Conseil d’Administration de délocaliser l’IAI,
                                        la Représentation du TOGO (IAI-TOGO) a ouvert ses portes le 24 octobre 2002.
                                        L’accord d’établissement entre la République Togolaise et l’Institut Africain
                                        d’Informatique a été signée le 12 mai 2006.
 

                                        L’IAI-TOGO propose actuellement le cycle de formation des ingénieurs de travaux
                                        informatiques (Licence professionnelle en informatique). Au terme des trois
                                        années de formation, les diplômés peuvent poursuivre leurs études supérieures au
                                        siège au GABON ou dans les universités occidentales ou asiatiques (UTBM en
                                        FRANCE, Université-Laval du Québec au CANADA, etc).</p>
                                    <p class="paragraphe">

                                        RESEAU IAI
                                    </p>
                                    <p class="paragraphe">

                                        Au lendemain des indépendances, la formation de cadres techniques de haut
                                        niveau, adaptés aux besoins socio-économiques des pays apparaissait comme l’une
                                        des priorités pour soutenir les actions d’un plan de développement national
                                        harmonieux.
                                        C’est ainsi que les chefs d’Etat de l’Organisation Commune Africaine, Malgache
                                        et Mauricienne (OCAM), considérant le développement continu et accéléré de
                                        l’informatique dans le monde et la nécéssité de disposer d’un personnel qualifié
                                        en nombre suffisant pour faire face à ce développement de l’informatique, ont
                                        convenu dans le cadre de leur politique de renforcement de la solidarité
                                        africaine de créer une école dénommée Institut Africain d’Informatique (IAI) en
                                        vue de former le personnel informatique dont ils ont besoin.
                                        L’institut Africain d’Informatique est une école supérieure en informatique. La
                                        convention portant création de l’institut et les statuts y afférent ont été
                                        signés le 29 janvier 1972 à Fort Lamy (actuel Ndjaména) en république du TCHAD.
                                        L’accord de siège entre l’IAI et le GABON a été signé en janvier 1975. Il est
                                        par conséquent un établissement inter-Etats.

                                        Dans l’optique d’approcher l’institut des pays membres et pour des soucis de
                                        performance toujours plus accrue, le conseil d’administration de l’IAI a
                                        autorsisé la délocalisation du premier cycle de l’institut dans les pays
                                        membres. C’est ainsi que l’IAI-Cameroun a été créé en 1999, l’IAI-Niger en 2001,
                                        et l’IAI-Togo en 2002.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="">
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
                        <div class="">
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



                    <div class="">
                        <div class="">
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

                <div class="wow zoomIn col-xs-12 col-sm-12 col-md-4 ">
                    <!-- col-xs-12 col-sm-12 col-md-4  -->
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


    <?php include("footer.php"); ?>
</body>

</html>