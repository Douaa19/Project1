<?php

class company

{

    private $database;
    public function __construct() {
        $this->db = new Database;
    }

    // 
    public function addCompany($data) {
        $this->db->query("INSERT INTO `company`(`raison_sociale`, `activite`, `effectif`, `adresse_sociale`, `zip_code`, `city`, `phone`, `rc`, `ice`, `cnss`, `forme_juridique`, `nom_dirigeant`, `rib`) VALUES (:raison_sociale, :activite, :effectif, :adresse_sociale, :zip_code, :city, :phone, :rc, :ice, :cnss, :forme_juridique, :nom_dirigeant, :rib)");

        $this->db->bind(':raison_sociale', $data['raison_sociale']);
        $this->db->bind(':activite', $data['activite']);
        $this->db->bind(':effectif', $data['effectif']);
        $this->db->bind(':adresse_sociale', $data['adresse_sociale']);
        $this->db->bind(':zip_code', $data['zip_code']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':rc', $data['rc']);
        $this->db->bind(':ice', $data['ice']);
        $this->db->bind(':cnss', $data['cnss']);
        $this->db->bind(':forme_juridique', $data['forme_juridique']);
        $this->db->bind(':nom_dirigeant', $data['nom_dirigeant']);
        $this->db->bind(':rib', $data['rib']);

        // Execute The Statment
        $insert = $this->db->execute();

        if ($insert) {
            return $insert;
        }else {
            return false;
        }

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // die();
    }

}