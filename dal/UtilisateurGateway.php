<?php

class UtilisateurGateway {

    private $con;

    public function __construct(Connexion $con){
        $this->con=$con;
    }

    public function CreerUtilisateur($pseudo, $mdp) : bool {
        $query='INSERT INTO utilisateur(pseudo, mdp) VALUES (:pseudo,:mdp);';
        try {
            $this->con->exec_requete($query, array(':pseudo' => array($pseudo, PDO::PARAM_STR), ':mdp' => array($mdp, PDO::PARAM_STR)));
        }
        catch (PDOException $e){
            return false;
        }
        return true;
    }

    public function SelectUtilisateur($pseudo){
        $query='SELECT * FROM utilisateur WHERE pseudo=:pseudo;';
        $this->con->exec_requete($query, array(':pseudo' => array($pseudo, PDO::PARAM_STR)));
        $result=$this->con->getResult();
        $u=null;
        foreach ($result as $uti)
         $u= new Utilisateur($uti['id_utilisateur'], $uti['pseudo'], $uti['mdp']);
        return $u;
    }
}


?>