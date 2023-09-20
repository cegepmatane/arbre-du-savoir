<?php

include_once(__DIR__.'/../DAO/CategorieDAO.php');
include_once(__DIR__.'/../DAO/LieuDAO.php');
include_once(__DIR__.'/../models/Formation.php');

class formationDAO
{

    public function creerFormation($tmp) {

        $formation = new \models\Formation();
        $categorieDAO = new CategorieDAO();
        $lieuDAO = new LieuDAO();

        $formation->setIdFormation($tmp['id_formation']);
        $formation->setTitreFormation($tmp['titre_formation']);
        $formation->setDescFormation($tmp['desc_formation']);
        $formation->setPhotoFormation($tmp['photo_formation']);
        $formation->setPrixFormation($tmp['prix_formation']);
        $formation->setNiveauFormation($tmp['niveau_formation']);
        $formation->setCertificationFormation($tmp['certification_formation']);
        $formation->setDateDebutFormation(date($tmp['date_debut_formation']));
        $formation->setDateFinFormation(date($tmp['date_fin_formation']));
        $formation->setListeCategories($categorieDAO->getCategoriesParFormation($formation->getIdFormation()));
        $formation->setListeLieux($lieuDAO->getLieuxParFormation($formation->getIdFormation()));

        return $formation;
    }

    public function lireRequete($sql, $arguments) {

        require 'DAO.php';

        $bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
        $rs = $bdd->prepare($sql);
        $rs->execute($arguments);

        $listFormation = array();
        while ($tmp = $rs->fetch()) {
            $formation = $this->creerFormation($tmp);
            array_push($listFormation, $formation);
        }
        return $listFormation;
    }

    public function executerRequete($sql, $arguments) {

        require 'DAO.php';

        $bdd = new PDO("mysql:host=localhost;dbname=$db_name",$user,$pass);
        $rs = $bdd->prepare($sql);
        $rs->execute($arguments);

    }

    public function getToutesLesFormations(){
        $sql = "SELECT * FROM FORMATION;";
        $argument = array();
        return $this->lireRequete($sql, $argument);
    }

    public function supprimerUneFormation($idFormation){
        echo $idFormation;
        $sql = "DELETE FROM FORMATION_CATEGORIE WHERE FORMATION_CATEGORIE.id_formation = ?;
                DELETE FROM FORMATION_LIEU WHERE FORMATION_LIEU.id_formation = ?;
                DELETE FROM FORMATION WHERE FORMATION.id_formation = ?;";
        $argument = array();
        array_push($argument, $idFormation, $idFormation, $idFormation);
        return $this->executerRequete($sql, $argument);
    }
}