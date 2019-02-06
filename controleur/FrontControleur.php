<?php

class FrontControleur
{
    function __construct() {
        global $rep,$vues;
        $listeAction_Utilisateur = array('deconnexion', 'creerListePrivee', 'supprimerListePrive', 'validerTachePrivee', 'supprimerTachePrive','creeTachePrivee', 'AfficherFormulaireListePrivee', 'AfficherFormulaireTachePrivee');

        try{
            $m=new ModeleUtilisateur();
            $u=$m->isUtilisateur();
            if(isset($_REQUEST['action']) && in_array($_REQUEST['action'], $listeAction_Utilisateur)){
                if($u==false){
                    require($rep.$vues['vueFormConnexion']);
                }
                else{
                    $cont=new ControlerUtilisateur();
                }
            }
            else{
                 $cont= new ControleurVisiteur();
            }
        }
        catch (Exception $e){
            $dVueEreur[] =	"Erreur inattendue $e!!! ";
            require($rep.$vues['erreur.php']);
        }
    }
}