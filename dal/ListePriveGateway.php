<?php
class ListePriveGateway
{
    private $con;

    public function __construct(Connexion $con){
        $this->con=$con;
    }

    public function findListePrivee(string $id): array{
        $query='SELECT * FROM tlisteprive WHERE id_utilisateur=:id;';
        $this->con->exec_requete($query, array(':id' =>array($id, PDO::PARAM_INT)));
        $result=$this->con->getResult();
        $tabListe = [];
        foreach ($result as $liste){
            $query2='SELECT * FROM ttacheprive WHERE id_liste=:id_liste;';
            $this->con->exec_requete($query2, array(':id_liste' =>array($liste['id_liste_prive'], PDO::PARAM_INT)));
            $result2=$this->con->getResult();

            $tabTache=[];
            foreach ($result2 as $tache){
                $tabTache[]=new Tache($tache['id_tache'], $tache['titre'], $tache['valider']);
            }
            $tabListe[]=new Liste($liste['id_liste_prive'], $liste['titre'], $liste['description'], $tabTache);
            $tabTache=[];
        }
        return $tabListe;
    }

    Public function CreateTachePrivee(string $nom, int $id_liste){
        $query='INSERT INTO ttacheprive(titre, valider, id_liste) VALUES (:nom, :valider, :id_liste);';
        $this->con->exec_requete($query, array(':nom' => array($nom, PDO::PARAM_STR), ':valider' => array(false, PDO::PARAM_BOOL), ':id_liste' => array($id_liste, PDO::PARAM_INT)));
    }

    public function createListePrivee(string $titre, string $desc, int $id_utilisateur){
        $query='INSERT INTO tlisteprive (titre, description, id_utilisateur) VALUES(:titre, :desc, :id_utilisateur);';
        $this->con->exec_requete($query, array(':titre' => array($titre, PDO::PARAM_STR), ':desc' => array($desc, PDO::PARAM_STR), ':id_utilisateur' => array($id_utilisateur, PDO::PARAM_INT)));
    }

    public function SupprimerTachePrive(String $id_tache){
        $query = 'DELETE FROM ttacheprive WHERE id_tache=:id_tache;';
        $this->con->exec_requete($query, array(':id_tache' => array($id_tache, PDO::PARAM_INT)));
    }

    public function SupprimerListePrive(int $id_liste){
        $query = 'DELETE FROM tlisteprive WHERE id_liste_prive=:id_liste;';
        $this->con->exec_requete($query, array(':id_liste' => array($id_liste, PDO::PARAM_INT)));
    }


    public function ValiderTache(int $idTache){
        $query='UPDATE ttacheprive SET valider=NOT valider WHERE id_tache=:idTache;';
        $this->con->exec_requete($query, array(':idTache' => array($idTache, PDO::PARAM_INT)));
    }
}