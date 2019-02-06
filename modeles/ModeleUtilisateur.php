<?php

class ModeleUtilisateur
{

    function Inscription($pseudo, $Mdp) : bool {
        global $dsn, $login, $mdp;
        $g= new UtilisateurGateway(new Connexion($dsn, $login, $mdp));
        $hash=password_hash($Mdp, PASSWORD_DEFAULT);
        if($g->CreerUtilisateur($pseudo, $hash)){
            return true;
        }
        else
            return false;
    }

    function getListesPrivee(int $id){
        global $dsn, $login, $mdp;
        $g= new ListePriveGateway(new Connexion($dsn, $login, $mdp));
        return $g->findListePrivee($id);
    }

    function CreateListePrivee(string $titre, string $desc, int $id){
        global $dsn, $login, $mdp;
        $g= new ListePriveGateway(new Connexion($dsn, $login, $mdp));
        $g->createListePrivee($titre, $desc, $id);
    }

    function CreateTachePrivee(string $nom, int $id_liste){
        global $dsn, $login, $mdp;
        $g= new ListePriveGateway(new Connexion($dsn, $login, $mdp));
        $g->CreateTachePrivee($nom, $id_liste);
    }

    public function connexion($log, $mp){
        global $dsn, $login, $mdp;

        $log=Validation::Nettoyage_string($log);
        $mp=Validation::Nettoyage_string($mp);
        $g= new UtilisateurGateway(new Connexion($dsn, $login, $mdp));
        $u=$g->SelectUtilisateur($log);
        if(isset($u)){
            if(password_verify($mp, $u->getMdp())) {
                $_SESSION['id']=$u->getIdUtilisateur();
                $_SESSION['role'] = 'Utilisateur';
                $_SESSION['login'] = $log;
                return $u;
            }
            else{
                return null;
            }
        }
        else{
            return null;
        }
    }

    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public function isUtilisateur(): bool{
        if(isset($_SESSION['id']) && isset($_SESSION['login']) && isset($_SESSION['role'])){
            $role=Validation::Nettoyage_string($_SESSION['role']);
            if($role=="Utilisateur"){
                return true;
            }
            else{
                return false;
            }
        }
        else
            return false;
    }

    public function SupprimerTachePrive(int $id_tache){
        global $dsn, $login, $mdp;
        $g= new ListePriveGateway(new Connexion($dsn, $login, $mdp));
        $g->SupprimerTachePrive($id_tache);
    }

    public function SupprimerListePrive(int $id_liste){
        global $dsn, $login, $mdp;
        $g= new ListePriveGateway(new Connexion($dsn, $login, $mdp));
        $g->SupprimerListePrive($id_liste);
    }

    public function ValiderTachePrivee(int $id_tache){
        global $dsn, $login, $mdp;
        $g= new ListePriveGateway(new Connexion($dsn, $login, $mdp));
        $g->ValiderTache($id_tache);
    }

}