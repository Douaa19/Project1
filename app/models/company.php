<?php

class company

{

    private $database;
    public function __construct() {
        $this->db = new Database;
    }

    // 
    public function addCompany($data) {
        $this->db->query("INSERT INTO `company`(`raison_sociale`, `activite`, `effectif`, `adresse_sociale`, `zip_code`, `city`, `phone`, `email`, `rc`, `ice`, `cnss`, `forme_juridique`, `nom_dirigeant`, `rib`, `password`) VALUES (:raison_sociale, :activite, :effectif, :adresse_sociale, :zip_code, :city, :phone, :email, :rc, :ice, :cnss, :forme_juridique, :nom_dirigeant, :rib, :password)");

        $this->db->bind(':raison_sociale', $data['raison_sociale']);
        $this->db->bind(':activite', $data['activite']);
        $this->db->bind(':effectif', $data['effectif']);
        $this->db->bind(':adresse_sociale', $data['adresse_sociale']);
        $this->db->bind(':zip_code', $data['zip_code']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':rc', $data['rc']);
        $this->db->bind(':ice', $data['ice']);
        $this->db->bind(':cnss', $data['cnss']);
        $this->db->bind(':forme_juridique', $data['forme_juridique']);
        $this->db->bind(':nom_dirigeant', $data['nom_dirigeant']);
        $this->db->bind(':rib', $data['rib']);
        $this->db->bind(':password', $data['safePassword']);

        // Execute The Statment
        $insert = $this->db->execute();
        
        if ($insert) {
            return $insert;
        }else {
            return false;
        }

    }


    // Check Email Company If Exists
    public function checkEmail($data) {
        $this->db->query("SELECT * FROM company WHERE email = :email");
        $this->db->bind(':email', $data['email']);

        $email = $this->db->single();
        if ($email) {
            return $email;
        }else {
            return false;
        }
    }


    // Check The Informations For Login System
    public function getCompany($data) {
        
    }


    // Check Password Company
    public function checkCompanyPassword($data) {
        var_dump($data);
        die();
        $this->db->query("SELECT company.password FROM company WHERE email = :email");
        $this->db->bind(':email', $data['email']);

        $password = $this->db->single();
        $hashed_password = $password->password;
        var_dump($hashed_password);
        die();
        
        if (password_verify($data['password'], $hashed_password)) {
            return true;
        }else {
            return false;
        }
    }

}