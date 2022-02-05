<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/log_1.jpg" />
    <title>Contact</title>
</head>

<body>
    <?php include("entete.php"); ?>
    <!-- GET IN TOUCH -->
    <section id="contact" class="contact-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="wow zoomIn col-xs-12 text-center p-padding">
                    <h1 class="section-title">Contact</h1>
                    <p>Pour plus de renseignement veuillez nous contacter directement via ce formulaire ci dessous.</p>
                </div><!-- col-xs-12 -->
                <div class="wow zoomIn col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                    <form name="contactForm" id='contact_form' method="post" action='php/email.php'>
                        <div class="form-inline">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="name" id="exampleInputName"
                                    placeholder="nom">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="email" class="form-control" name="email" id="exampleInputEmail"
                                    placeholder="address email">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="subject" id="exampleInputSubject"
                                    placeholder="Objet">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="company" id="exampleInputCompany"
                                    placeholder="Entreprise/Etablissement scolaire/Autre...">
                            </div>
                            <div class="form-group col-sm-12">
                                <textarea class="form-control" name="message" rows="3" id="exampleInputMessage"
                                    placeholder="message"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <div id='mail_success' class='success' style="display:none;">votre message à été envoyer
                                avec succès.
                            </div><!-- success message -->
                            <div id='mail_fail' class='error' style="display:none;"> Désolé, erreur rencontrer lors de
                                l'envoie.
                            </div><!-- error message -->
                        </div>
                        <div class="form-group col-sm-12" id='submit'>
                            <input type="submit" id='send_message' class="btn  btn-lg costom-btn" value="envoyer">
                        </div>
                    </form>
                </div> <!-- /.col-xs-12 .col-sm-offset-2 .col-sm-8 -->
                <div class="col-xs-12">
                    <div class="contact-or">
                        <p>ou</p>
                    </div><!-- /.contact-or -->
                    <div class="icon-text">
                        <span>rejoignez nous sur</span>
                    </div><!-- /.icon-text -->
                    <div class="icon-holder">
                        <center>
                            <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>

                            </ul>
                        </center>

                    </div><!-- /.icon-holder -->
                </div><!-- /.col-xs-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- get in touch -->
    <?php include("footer.php") ?>
</body>

</html>