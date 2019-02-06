<?php

class ControlerUtilisateur
{
    function __construct() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        ////debut

        //on initialise un tableau d'erreur
        $dVueEreur = array ();

        try{
            if(isset($_REQUEST['action']))
                $action=$_REQUEST['action'];
            else
                $action=NULL;

            switch($action) {

                //pas d'action, on r�initialise 1er appel
                case NULL:  //Fait
                    $cont= new FrontControleur();
                    break;

                case "AfficherFormulaireListePrivee":
                    $this->AfficherFormListePrivee();
                    break;

                case "AfficherFormulaireTachePrivee":
                    $this->AfficherFormTachePrivee();
                    break;

                case "creerListePrivee":
                    $this->creerListePrivee();
                    break;

                case "deconnexion":
                    $this->deconnexion();
                    break;

                case "creeTachePrivee":
                    $this->creerTachePrivee();
                    break;

                case "supprimerTachePrive":
                    $this->supprimerTachePrive();
                    break;

                case "supprimerListePrive":
                    $this->supprimerListePrive();
                    break;

                case 'validerTachePrivee':
                    $this->validerTache();
                    break;

                //mauvaise action
                default:
                    $dVueEreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['erreur']);
                    break;}
        }
        catch (PDOException $e){
            $dVueEreur[] =	"Erreur inattendue bd : $e!!! ";
            require ($rep.$vues['erreur']);

        } catch (Exception $e2) {
            $dVueEreur[] =	"Erreur inattendue : $e2!!! ";
            require ($rep.$vues['erreur']);
        } catch (Error $e3){
            $dVueEreur[] =	"Erreur inattendue (error)!!! : $e3";
            require ($rep.$vues['erreur']);
        }
        exit(0);
    }//fin constructeur

    function creerListePrivee(){
        $titre=$_POST['Titre'];
        $desc=$_POST['Desc'];
        $id=$_SESSION['id'];

        Validation::ValidId($id, $dVueErreur);
        Validation::ValidListe($titre, $desc, $dVueErreur);

        $m=new ModeleUtilisateur();
        $m->CreateListePrivee($titre, $desc, $id);

        $_REQUEST=NULL;
        $cont = new FrontControleur();
    }

    function creerTachePrivee(){
        $nom=$_POST['NomTache'];
        $id_liste=$_GET['id_liste'];

        Validation::ValidTache( $nom,  $id_liste, $dVueEreur);

        $m=new ModeleUtilisateur();
        $m->CreateTachePrivee($nom, $id_liste);

        $_REQUEST=NULL;
        $cont= new FrontControleur();
    }

    function AfficherFormListePrivee(){
        global $rep,$vues;
        if(Validation::ValidSessionUtilisateur($_SESSION)){
            $role=$_SESSION['role'];
        }
        require($rep.$vues['vueFormListePrivee']);
    }

    function AfficherFormTachePrivee(){
        global $rep,$vues;
        if(Validation::ValidSessionUtilisateur($_SESSION)){
            $role=$_SESSION['role'];
        }
        $id_liste=$_GET['id_liste'];
        require($rep.$vues['vueFormTachePrivee']);
    }

    function deconnexion(){
        $m=new ModeleUtilisateur();
        $m->deconnexion();
        $cont=new FrontControleur();
    }

    public function supprimerTachePrive(){
        $id_tache=$_GET['id_tache'];

        $m=new ModeleUtilisateur();
        $m->SupprimerTachePrive($id_tache);

        $_REQUEST=NULL;
        $cont= new FrontControleur();
    }

    public function supprimerListePrive(){
        $id_liste=$_GET['id_liste'];

        $m=new ModeleUtilisateur();
        $m->SupprimerListePrive($id_liste);

        $_REQUEST=NULL;
        $cont= new FrontControleur();
    }

    public function validerTache(){
        global $vues, $rep;

        $idTache=$_GET['id_tache'];

        if(Validation::ValidId($idTache, $dVueErreur)){
            $m=new ModeleUtilisateur();
            $m->ValiderTachePrivee($idTache);

            $_REQUEST=NULL;
            $cont= new FrontControleur();
        }
        else{
            require($rep.$vues['erreur']);
        }
    }

}

?>
}