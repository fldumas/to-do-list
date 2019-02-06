<?php

class Modele
{
    function getListesPublic(): array {
        global $dsn, $login, $mdp;
        $g=new ListeGateway(new Connexion($dsn, $login, $mdp));
        return $g->findListePublic();
    }

    function CreateTachePublic(String $nom, String $id_liste){
        global $dsn, $login, $mdp;
        $g= new ListeGateway(new Connexion($dsn, $login, $mdp));
        $g->CreateTachePublic($nom, $id_liste);
    }

    function CreateListePublic(String $titre, String $desc){
        global $dsn, $login, $mdp;
        $g= new ListeGateway(new Connexion($dsn, $login, $mdp));
        $g->createListePublic($titre, $desc);
    }

    function ValiderTache(int $idTache){
        global $dsn, $login, $mdp;
        $g= new ListeGateway(new Connexion($dsn, $login, $mdp));
        $g->ValiderTache($idTache);
    }

    function SupprimerTachePublic(int $id_tache){
        global $dsn, $login, $mdp;
        $g= new ListeGateway(new Connexion($dsn, $login, $mdp));
        $g->SupprimerTachePublic($id_tache);
    }

    function SupprimerListePublic(int $id_liste){
        global $dsn, $login, $mdp;
        $g= new ListeGateway(new Connexion($dsn, $login, $mdp));
        $g->SupprimerListePublic($id_liste);
    }
}
