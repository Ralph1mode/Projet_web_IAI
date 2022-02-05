<?php SESSION_START();

$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    header('location:index.php');
}

// either new or old, it should live at most for another hour
$_SESSION['discard_after'] = $now + 120;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Confirmation d'inscription</title>
    <style>
        .marg{
            margin-top: 10%;
            text-align: center;
        }
        
        .tit{
            
            color: green;

            
        }
    </style>
    <?php include("entete.php");?>
</head>

<body>

    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 marg">
            <label for="candidat" class="paragraphe"><i class="flaticon-male80"></i> <?php echo $_SESSION['prenom']," ".$_SESSION['nom'] ;?></label>
            <h1 class="tit">INSCRIPTION REUSSIE !!</h1>
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>