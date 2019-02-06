<?php

class Tache
{
    private $id_tache;
    private $nom ;
    private $valider;

    function __construct(int $id_tache, String $nom, bool $valider){
        $this->id_tache=$id_tache;
        $this->nom=$nom;
        $this->valider=$valider;
    }

    /**
     * @return String
     */
    public function getNom(): String
    {
        return $this->nom;
    }

    /**
     * @return int
     */
    public function getIdTache(): int
    {
        return $this->id_tache;
    }

    /**
     * @return bool
     */
    public function isValider(): bool
    {
        return $this->valider;
    }

}

?>