<?php

class ListeGateway
{
    private $con;

    public function __construct(Connexion $con){
        $this->con=$con;
    }

    public function findListePublic(): array{
        $query='SELECT * FROM tliste;';
        $this->con->exec_requete($query);
        $result=$this->con->getResult();
        $tabListe = [];
        foreach ($result as $liste){
            $query2='SELECT * FROM ttache WHERE id_liste=:id_liste;';
            $this->con->exec_requete($query2, array(':id_liste' =>array($liste['id_liste'], PDO::PARAM_INT)));
            $result2=$this->con->getResult();

            $tabTache=[];
            foreach ($result2 as $tache){
                $tabTache[] = new Tache($tache['id_tache'], $tache['titre'], $tache['valider']);
            }
            $tabListe[]=new Liste($liste['id_liste'], $liste['titre'], $liste['description'], $tabTache);
        }
        return $tabListe;
    }

    Public function CreateTachePublic(String $nom, String $id_liste){
        $query='INSERT INTO ttache(titre, valider, id_liste) VALUES (:nom, :valider, :id_liste);';
        $this->con->exec_requete($query, array(':nom' => array($nom, PDO::PARAM_STR), ':valider' => array(false, PDO::PARAM_BOOL), ':id_liste' => array($id_liste, PDO::PARAM_INT)));
    }

    public function createListePublic(String $titre, String $desc){
        $query='INSERT INTO tliste (titre, description) VALUES(:titre, :desc);';
        $this->con->exec_requete($query, array(':titre' => array($titre, PDO::PARAM_STR), ':desc' => array($desc, PDO::PARAM_STR)));
    }

    public function SupprimerTachePublic(String $id_tache){
        $query='DELETE FROM ttache WHERE id_tache=:id_tache;';
        $this->con->exec_requete($query, array(':id_tache' => array($id_tache, PDO::PARAM_INT)));
    }

    public function SupprimerListePublic(String $id_liste){
        $query='DELETE FROM tliste WHERE id_liste=:id_liste;';
        $this->con->exec_requete($query, array(':id_liste' => array($id_liste, PDO::PARAM_INT)));
    }

    public function ValiderTache(int $idTache){
        $query='UPDATE ttache SET valider=NOT valider WHERE id_tache=:idTache;';
        $this->con->exec_requete($query, array(':idTache' => array($idTache, PDO::PARAM_INT)));
    }
}