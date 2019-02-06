<?php

class ControleurVisiteur{

    function __construct() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        //debut

        //on initialise un tableau d'erreur
        $dVueErreur = array ();

       try{
           if(isset($_REQUEST['action']))
               $action=$_REQUEST['action'];
           else
               $action=NULL;

            switch($action) {

                //pas d'action, on r�initialise 1er appel
                case NULL:  //Fait
                    $this->AfficherListe();
                    break;

                case "AfficherFormulaireTache":
                    $this->AfficheFormTache();
                    break;

                case "AfficherFormulaireListe":
                    $this->AfficheFormListe();
                    break;

                case "CreerListe":
                    $this->CreerListe();
                    break;

                case "CreerTache":
                    $this->CreerTache();
                    break;

                case "validerTache":
                    $this->ValiderTache();
                    break;

                case "AfficherFormConnexion":
                    $this->AfficherConnexion();
                    break;

                case "Inscription":
                    $this->Inscription();
                    break;

                Case "Connexion":
                    $this->Connexion();
                    break;

                case "SupprimerListe":
                    $this->SupprimerListe();
                    break;

                case "SupprimerTache":
                    $this->SupprimerTache();
                    break;

                //mauvaise action
                default:
                    $dVueErreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['erreur']);
                    break;}
       }
       catch (PDOException $e){
             $dVueErreur[] =	"Erreur inattendue bd : $e!!! ";
             require ($rep.$vues['erreur']);

         } catch (Exception $e2) {
             $dVueErreur[] =	"Erreur inattendue : $e2!!! ";
             require ($rep.$vues['erreur']);
         } catch (Error $e3){
             $dVueErreur[] =	"Erreur inattendue (error)!!! : $e3";
             require ($rep.$vues['erreur']);
         }
         exit(0);
    }//fin constructeur


    function AfficherListe() {
        global $rep,$vues;

        $m= new Modele();
        $tabListe=$m->getListesPublic();

        $m2=new ModeleUtilisateur();
        $tabListe2=[];

        if(Validation::ValidSessionUtilisateur($_SESSION)){
            $tabListe2=$m2->getListesPrivee($_SESSION['id']);
            $role=$_SESSION['role'];
        }
        require ($rep.$vues['vueListe']);
    }

    function CreerTache(){
        global $rep, $vues;
        $nom=$_POST['NomTache'];
        $id_liste=$_GET['id_liste'];

        if(Validation::ValidTache( $nom,  $id_liste, $dVueErreur)) {
            $m = new Modele();
            $m->CreateTachePublic($nom, $id_liste);

            $_REQUEST = NULL;
            $cont = new FrontControleur();
        }
        else{
            require($rep.$vues['erreur']);
        }

    }

    function CreerListe(){
        global $rep, $vues;

        $titre=$_POST['Titre'];
        $desc=$_POST['Desc'];

        if(Validation::ValidListe($titre, $desc, $dVueErreur)){
            $m=new Modele();
            $m->CreateListePublic($titre, $desc);

            $_REQUEST=NULL;
            $cont = new FrontControleur();
        }
        else{
            require($rep.$vues['erreur']);
        }

    }

    function AfficheFormTache(){
        global $rep,$vues;
        if(Validation::ValidSessionUtilisateur($_SESSION)){
            $role=$_SESSION['role'];
        }
        $id_liste=$_GET['id_liste'];
        if(Validation::ValidId($id_liste, $dVueErreur))
            require($rep.$vues['vueFormTache']);
        else
            require($rep.$vues['erreur']);
    }

    function AfficheFormListe(){
        global $rep,$vues;
        if(Validation::ValidSessionUtilisateur($_SESSION)){
            $role=$_SESSION['role'];
        }
        require($rep.$vues['vueFormListe']);
    }

    function ValiderTache(){
        global $vues, $rep;

        $idTache=$_GET['id_tache'];

        if(Validation::ValidId($idTache, $dVueErreur)){
            $m=new Modele();
            $m->ValiderTache($idTache);

            $_REQUEST=NULL;
            $cont= new FrontControleur();
        }
        else{
            require($rep.$vues['erreur']);
        }
    }

    function SupprimerListe(){
        global $rep, $vues;

        $id_liste=$_GET['id_liste'];

        if(Validation::ValidId($id_liste, $dVueErreur)){
            $m=new Modele();
            $m->SupprimerListePublic($id_liste);

            $_REQUEST=NULL;
            $cont= new FrontControleur();
        }
        else{
            require($rep.$vues['erreur']);
        }


    }

    function SupprimerTache(){
        global $rep, $vues;

        $id_tache=$_GET['id_tache'];

        if(Validation::ValidId($id_tache, $dVueErreur)){
            $m=new Modele();
            $m->SupprimerTachePublic($id_tache);

            $_REQUEST=NULL;
            $cont= new FrontControleur();
        }
        else{
            require($rep.$vues['erreur']);
        }
    }

    function AfficherConnexion(){
        global $rep,$vues;
        require($rep.$vues['vueFormConnexion']);
    }

    function Inscription(){
        global $rep, $vues;

        $pseudo=$_POST['pseudo'];
        $mdp=$_POST['mdp'];
        $validMdp=$_POST['mdp2'];

        if(Validation::ValidInscription($pseudo, $mdp, $validMdp, $dVueErreur)){
            $m=new ModeleUtilisateur();
            $result=$m->Inscription($pseudo, $mdp);

            if($result==true){
                $this->Connexion();
                $_REQUEST=NULL;
                $cont= new FrontControleur();
            }
            else{
                require($rep.$vues['vueFormConnexion']);
            }
        }
        else{
            $res=false;
            require($rep.$vues['vueFormConnexion']);
        }
    }

    function Connexion(){
        global $rep,$vues;
        $pseudo=$_POST['pseudo'];
        $mdp=$_POST['mdp'];

        if(Validation::ValidConnexion($pseudo, $mdp, $dVueErreur)){
            $m=new ModeleUtilisateur();
            $u=$m->connexion($pseudo, $mdp);
            if(isset($u)){
                $_REQUEST=NULL;
                $cont= new FrontControleur();
            }
            else{
                $res2=false;
                require($rep.$vues['vueFormConnexion']);
            }
        }
        else{
            require($rep.$vues['erreur']);
        }
    }
}

?>