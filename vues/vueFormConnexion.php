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
                if(isset($_role) && $role=="Utilisateur")
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
                <h1>Connectez vous</h1>
                <?php
                if(isset($res2) && $res2==false)
                    echo '<p class="alert-warning">Mot de passe ou Pseudo incorrect !</p>';
                ?>
                <form action="index.php?action=Connexion" class="form-horizontal" method="post">
                    Votre pseudo
                    <input type="text" class="form-control" name="pseudo" placeholder="...." required/>
                    Votre mdp
                    <input type="password" class="form-control" name="mdp" placeholder="...." required/>
                    </br>
                    <button type="submit" class="btn btn-warning">
                        CONNEXION
                    </button>
                </form>
            </article>
        </div>
    </div>
</div>
<div class="container-fluid cont3" id="privée">
    <div class="container">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-nd-12 col-lg-12">
                <h1>Nouveau ? Créer votre compte !</h1>
                Retrouver vos taches grâce à votre compte. Et ne perdez plus le fil.
            </article>
        </div>
    </div>
</div>
<div class="container-fluid creation" id="creation">
    <div class="container">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-nd-12 col-lg-12">
                <h1>Créer votre compte</h1>
                <?php
                    if(isset($result) && $result==false)
                        echo '<p class="alert-warning">Ce pseudo est déja pris! Veuillez en choisir un autre</p>';
                    if(isset($res) && $res==false)
                        echo '<p class="alert-warning">'.end($dVueErreur).'</p>';
                ?>
                <form action="index.php?action=Inscription" class="form-horizontal" method="post">
                    Votre pseudo
                    <input type="text" class="form-control" name="pseudo" placeholder="...." required/>
                    Votre mdp
                    <input type="password" class="form-control" name="mdp" placeholder="...." required/>
                    Confirmez votre mdp
                    <input type="password" class="form-control" name="mdp2" placeholder="...." required/>
                    </br>
                    <button type="submit" class="btn btn-warning">
                        ENVOYER
                    </button>
                </form>
            </article>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/javascript.js"> </script>
</body>
</html>