<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>TASKS MANAGER</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top navigation" id="my-navbar">
    <div class="container">
        <div class="navbar-header">
            <button type="boutton" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">TASKS MANAGER</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php#publiques">tâches publiques</a></li>
                <li><a href="index.php#privée">tâches privées</a></li>
                <?php
                if(isset($role) && $role="Utilisateur")
                    echo '<li><a href="index.php?action=deconnexion">déconnexion</a></li>';
                else
                    echo '<li><a href="index.php?action=AfficherFormConnexion">connexion</a></li>'
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid cont1" id="entete">
    <div class="container">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-nd-12 col-lg-12">
                <h1>TASKS MANAGER</h1>
                Garder le fil de vos tâches
            </article>
        </div>
    </div>
</div>
<div class="container-fluid connection" id="connexion">
    <div class="container">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-nd-12 col-lg-12">
                <h1>ERREUR !!!!!</h1>
                 <?php
                 if (isset($dVueErreur)) {
                    foreach ($dVueErreur as $value){
                       echo $value;
                     }
                 }
                ?>
                <br>
                <a href="index.php">retour à l'accueil</a>
                <br>
                <a href="index.php?action=AfficherFormConnexion">Connexion</a>
            </article>
        </div>
    </div>
</div>
<div class="container-fluid remplissage">
    <div class="container">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-nd-12 col-lg-12">
            </article>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/javascript.js"> </script>
</body>
</html>