<?php

class Liste
{
    private $id_liste;
    private $titre;
    private $desc;
    private $tabTache;

    function __construct(int $id_liste,String $nom, String $desc, array $tabTache){
        $this->id_liste=$id_liste;
        $this->titre=$nom;
        $this->desc=$desc;
        $this->tabTache=$tabTache;
    }

    /**
     * @return String
     */
    public function getTitre(): String
    {
        return $this->titre;
    }

    /**
     * @return String
     */
    public function getDesc(): String
    {
        return $this->desc;
    }

    /**
     * @return int
     */
    public function getId_Liste(): int
    {
        return $this->id_liste;
    }

    public function getTache(): array {
        return $this->tabTache;
    }
}

?>