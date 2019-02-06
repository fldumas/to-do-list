<?php

class Validation
{

    static function  ValidTache(String $nom, int $id_liste, &$dVueEreur)
    {
        if (!isset($nom) || $nom == "") {
            $dVueEreur[] = "pas de nom de Tache";
            return false;
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING)) {
            $dVueEreur[] = "testative d'injection de code (attaque sécurité)";
            return false;
        }

        if (!isset($id_liste)) {
            $dVueEreur[] = "pas d'id de liste";
            return false;
        }

        if ($id_liste != filter_var($id_liste, FILTER_SANITIZE_NUMBER_INT)) {
            $dVueEreur[] = "testative d'injection de code (attaque sécurité)";
            return false;
        }
        return true;
    }

    static function  ValidListe(String $titre, String $desc, &$dVueEreur)
    {
        if (!isset($titre) || $titre == "") {
            $dVueEreur[] = "pas de nom de liste";
            return false;
        }

        if ($titre != filter_var($titre, FILTER_SANITIZE_STRING)) {
            $dVueEreur[] = "testative d'injection de code (attaque sécurité)";
            return false;
        }

        if (!isset($desc)) {
            $dVueEreur[] = "pas de description";
            return false;
        }

        if ($desc != filter_var($desc, FILTER_SANITIZE_STRING)) {
            $dVueEreur[] = "testative d'injection de code (attaque sécurité)";
            return false;
        }
        return true;
    }

    static function ValidId(int $id, &$dVueErreur){

        if (!isset($id)) {
            $dVueEreur[] = "pas d'id";
            return false;

        }

        if($id != filter_var($id, FILTER_SANITIZE_NUMBER_INT)){
            $dVueEreur[] = "testative d'injection de code (attaque sécurité)";
            return false;

        }

        if($id<0){
            $dVueErreur[] = "id invalide : id négatif";
            return false;
        }
        return true;
    }

    static function Nettoyage_string($s):string{
        if(!isset($s)){
            return "";
        }

        return filter_var($s, FILTER_SANITIZE_STRING);
    }

    static  function  Nettoyage_int($i): int{
        if(!isset($i)){
            return -1;
        }
        return filter_var($i, FILTER_SANITIZE_NUMBER_INT);
    }



    static function ValidInscription($pseudo, $mdp, $validMdp, &$dVueErreur){

            if(!isset($pseudo)){
                $dVueErreur[] = "Pas de pseudo";
                return false;

            }

            if($pseudo != filter_var($pseudo, FILTER_SANITIZE_STRING)){
                $dVueErreur[] = "testative d'injection de code (attaque sécurité)";
                return false;

            }


            if(!isset($mdp)){
                $dVueErreur[]= "Pas de mot de passe";
                return false;
            }

            if($mdp != filter_var($mdp, FILTER_SANITIZE_STRING)){
                $dVueErreur[] = "testative d'injection de code (attaque sécurité)";
                return false;

            }

            if(strlen($mdp)<3){
                $dVueErreur[] = "Mot de passe trop court !";
                return false;
            }

            if(!isset($validMdp)){
                $dVueErreur[] = "Pas de validMdp";
                return false;

            }

            if($validMdp != filter_var($validMdp, FILTER_SANITIZE_STRING)){
                $dVueErreur[] = "testative d'injection de code (attaque sécurité)";
                return false;
            }

            if($mdp != $validMdp){
                $dVueErreur[] = "Les mots de passe ne correspondent pas !";
                return false;
            }
            return true;
    }

    static function ValidConnexion($pseudo, $mdp, &$dVueErreur){
        if(!isset($pseudo)){
            $dVueErreur[] = "pas de pseudo";
            return false;
        }

        if($pseudo != filter_var($pseudo, FILTER_SANITIZE_STRING)){
            $dVueErreur[] = "testative d'injection de code (attaque sécurité)";
            return false;
        }


        if(!isset($mdp)){
            $dVueErreur[]= "pas de mot de passe";
            return false;
        }

        if($mdp != filter_var($mdp, FILTER_SANITIZE_STRING)){
            $dVueErreur[] = "testative d'injection de code (attaque sécurité)";
            return false;
        }
        return true;
    }

    static function ValidSessionUtilisateur($Session){
        if(!isset($Session['role']) || $Session['role']!="Utilisateur"){
            return false;
        }
        if(!isset($Session['id']) || $Session['id']<0){
            return false;
        }
        if(!isset($Session['login']) || $Session['login']=""){
            return false;
        }
        return true;
    }
}