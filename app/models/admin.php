<?php

class admin 
{
    private $database;
    public function __construct() {
        $this->db = new Database;
    }

    public function checkAdmin($data) {
        $this->db->query("SELECT * FROM `admins` WHERE email = :email");
        $this->db->bind(':email', $data['email']);

        $admin = $this->db->single();
        if ($admin) {
            return $admin;
        }else {
            return false;
        }
    }


    // 
    public function getUsers() {
        $this->db->query("SELECT * FROM users");
        
        $users = $this->db->resultSet();
        if ($users) {
            return $users;
        }else {
            return false;
        }
    }


    // Insert Offres Into Database
    public function addOffre($data) {
        $this->db->query("INSERT INTO `offres`(`date`, `title`, `city`, `type_contrat`, `poste`, `mission`, `required_profile`, `diploma_formation`, `required_qualitie`, `place_activity`, `profil`, `experience`) VALUES (:date, :title, :city, :type_contrat, :poste, :mission, :required_profile, :diploma_formation, :required_qualitie, :place_activity, :profil, :experience)");
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':type_contrat', $data['type_contrat']);
        $this->db->bind(':poste', $data['poste']);
        $this->db->bind(':mission', $data['mission']);
        $this->db->bind(':required_profile', $data['required_profile']);
        $this->db->bind(':diploma_formation', $data['diploma_formation']);
        $this->db->bind(':required_qualitie', $data['required_qualitie']);
        $this->db->bind(':place_activity', $data['place_activity']);
        $this->db->bind(':profil', $data['profil']);
        $this->db->bind(':experience', $data['experience']);

        // Execut The Statement
        $result = $this->db->execute();
        if ($result) {
            return true;
        }else {
            return false;
        }
    }

    
    // Get All Offres From Table
    public function getOffres() {
        $this->db->query("SELECT * FROM offres");
        $offres = $this->db->resultSet();

        if ($offres) {
            return $offres;
        }else {
            return false;
        }
    }


    // Delete One offre From Database With Id_Offre
    public function deletOffre($id_offre) {
        $this->db->query("DELETE FROM offres WHERE id_offre = :id_offre");
        $this->db->bind(':id_offre', $id_offre);

        $deletedOffre = $this->db->execute();
        if ($deletedOffre) {
            return true;
        }else {
            return false;
        }
    }


    // Get All The Companys From Database
    public function getCompanys() {
        $this->db->query("SELECT * FROM company");

        // Execute The Statement
        $companys = $this->db->resultSet();
        if ($companys) {
            return $companys;
        }else {
            return false;
        }
    }


    // 
    public function insertInforForCompany($data) {
        var_dump($data);
        die();
    }
}