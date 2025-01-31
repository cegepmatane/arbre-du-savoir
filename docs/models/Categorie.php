<?php

namespace models;

class Categorie
{

    public $idCategorie;
    public $nomCategorie;

    public function __construct() {
        $this->idCategorie = "";
        $this->nomCategorie = "";
    }

    /**
     * @return string
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * @param string $idCategorie
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = filter_var($idCategorie, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * @return string
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    /**
     * @param string $nomCategorie
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = filter_var($nomCategorie, FILTER_SANITIZE_STRING);
    }

}