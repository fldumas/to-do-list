<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
                if(isset($role) && $role=="Utilisateur")
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
                <h1>Ajouter une tâche a la liste</h1>
                <?php
                    echo '<form class="form-horizontal" action="index.php?action=creeTachePrivee&id_liste='.$id_liste.'" method="post">'; ?>
                    tâche :
                    <input type="text" class="form-control" name="NomTache" placeholder="...." required/>
                    </br>
                    <button type="submit" class="btn btn-warning">
                        Créer la tache !
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
                <h1> le paradis des taches </h1>
                partitionner votre travail </br>
                Ne surcharger pas vos collégues :).
            </article>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/javascript.js"> </script>
</body>
</html>