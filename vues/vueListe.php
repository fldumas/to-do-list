<HTML>
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
            <a href="index.php?action=" class="navbar-brand">TASKS MANAGER</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#publiques">tâches publiques</a></li>
                <li><a href="#privée">tâches privées</a></li>
                <?php
                    if(isset($role) && $role=="Utilisateur")
                        echo '<li><a href="index.php?action=deconnexion">déconnexion</a></li>';
                    else
                        echo '<li><a href="index.php?action=AfficherFormConnexion">connexion</a></li>';
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
<div class="container-fluid liste_tache" id="publiques">
    <div class="container">
        <div class="row">
            <?php
            if (isset($tabListe)){
                foreach ($tabListe as $liste){
                    echo '<article class="col-xs-12 col-sm-6 col-nd-3 col-lg-3">
                        <h2 class="titre_tache">'.$liste->getTitre().'</h2>
                            <p>'.$liste->getDesc().'</p>
                                <ul class="list-group ">';
                    $listeTache=$liste->getTache();
                    $numero=0;
                    foreach ($listeTache as $tache){
                        $numero=$numero+1;
                        echo '<form class="form-horizontal" action="index.php?action=validerTache&id_tache='.$tache->getIdTache().'" method="post">';
                        if($tache->isValider())
                            echo '<li class="list-group-item" ><p class="tacheValider" style="display: inline">'.$numero.') '.$tache->getNom().'</p> <input type="checkbox" checked="checked" onchange="this.form.submit()" class="check" name="fini"/> <a href="index.php?action=SupprimerTache&id_tache='.$tache->getIdTache().'"> <input type="button" class="btn btn-danger" name="SupprimerTache" value="X"/></a></li>';
                        else
                            echo '<li class="list-group-item"><p class="textTache" style="display: inline">'.$numero.') '.$tache->getNom().'</p> <input type="checkbox" onchange="this.form.submit()" class="check" name="fini"/> <a href="index.php?action=SupprimerTache&id_tache='.$tache->getIdTache().'"> <input type="button" class="btn btn-danger" name="SupprimerTache" value="X"/></a></li>';
                        echo '</form>';
                    }
                    echo '<a href="index.php?action=AfficherFormulaireTache&id_liste='.$liste->getId_liste().'"><input type="button" class="btn btn-warning" name="ajouterTache" value="Ajouter Tache"/></a>' ;
                    echo '<br><br>';
                    echo  '<a href="index.php?action=SupprimerListe&id_liste='.$liste->getId_Liste().'"><input type="button" class="btn btn-warning" name="SupprimerListe" value="Supprimer Liste"/></a>';
                    echo '</ul> 
                    
            </article>';
                }
            }
            else echo 'Aucune liste de tache a a afficher :(';
            ?>
        </div>
    </div>
    <a href="index.php?action=AfficherFormulaireListe"><input type="button" class="btn btn-warning" name="AjoutListe" value="Ajouter une liste"/></a>
</div>
<div class="container-fluid cont3" id="privée">
    <div class="container">
        <div class="row">
            <article class="col-xs-12 col-sm-12 col-nd-12 col-lg-12">
                <h1>Tâches personnelles</h1>
                Retrouver vos tâches grâce à votre compte.
            </article>
        </div>
    </div>
</div>
<div class="container-fluid liste_tache pad_bottom" id="tache_privées">
    <div class="container">
        <div class="row">
            <?php
            if (isset($tabListe2) && $tabListe2!=[]){
                foreach ($tabListe2 as $liste2){
                    echo '<article class="col-xs-12 col-sm-6 col-nd-3 col-lg-3">
                        <h2 class="titre_tache">'.$liste2->getTitre().'</h2>
                            <p>'.$liste2->getDesc().'</p>
                                <ul class="list-group ">';
                    $listeTache2=$liste2->getTache();
                    $numero=0;
                    foreach ($listeTache2 as $tache2){
                        $numero=$numero+1;
                        echo '<form class="form-horizontal" action="index.php?action=validerTachePrivee&id_tache='.$tache2->getIdTache().'" method="post">';
                        if($tache2->isValider())
                            echo '<li class="list-group-item"><p class="tacheValider" style="display: inline">'.$numero.') '.$tache2->getNom().'</p> <input type="checkbox" checked="checked" onchange="this.form.submit()" class="check" name="fini"/> <a href="index.php?action=supprimerTachePrive&id_tache='.$tache2->getIdTache().'"> <input type="button" class="btn btn-danger" name="SupprimerTache" value="X"/></a></li>';
                        else
                            echo '<li class="list-group-item"><p style="display: inline">'.$numero.') '.$tache2->getNom().'</P> <input type="checkbox" onchange="this.form.submit()" class="check" name="fini"/> <a href="index.php?action=supprimerTachePrive&id_tache='.$tache2->getIdTache().'"> <input type="button" class="btn btn-danger" name="SupprimerTache" value="X"/></a></li>';
                        echo '</form>';
                    }
                    echo '<a href="index.php?action=AfficherFormulaireTachePrivee&id_liste='.$liste2->getId_liste().'"><input type="button" class="btn btn-warning" name="ajouterTache" value="Ajouter Tache"/></a>';
                    echo '<br><br>';
                    echo '<a href="index.php?action=supprimerListePrive&id_liste='.$liste2->getId_liste().'"><input type="button" class="btn btn-warning" name="SupprimerListe" value="Supprimer Liste"/></a>';
                    echo '</ul> 
                    
            </article>';
                }
            }
            else {
                if(isset($role))
                    echo '<h3>Aucune liste de tâche à afficher :(</h3>';
                else{
                    echo "Vous n'êtes pas connecter. Connectez vous pour avoir accées à vos propres listes : ";
                    echo  '<a href="index.php?action=AfficherFormConnexion">se connecter</a>';
                }

            }

            ?>
        </div>
        <?php
            if(isset($role))
                echo '<a href="index.php?action=AfficherFormulaireListePrivee"><input type="button" class="btn btn-warning" name="AjoutListe" value="Ajouter une liste"/></a>'
        ?>
    </div>
</div>
<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"> </script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/javascript.js"> </script>
</body>
</HTML>
