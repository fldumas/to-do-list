<?php

class Utilisateur
{
    private $id_utilisateur;
    private $pseudo;
    private $mdp;

    function __construct(int $id_utilisateur, string $pseudo, string $mdp){
        $this->id_utilisateur=$id_utilisateur;
        $this->pseudo=$pseudo;
        $this->mdp=$mdp;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }

    /**
     * @return int
     */
    public function getIdUtilisateur(): int
    {
        return $this->id_utilisateur;
    }

}