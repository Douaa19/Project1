<?php

class user

{
    private $database;
    public function __construct()
    {
        $this->db = new Database;
    }

    // Get All From Area Table
    public function getArea() {
        $this->db->query("SELECT * FROM area");

        $areas = $this->db->resultSet();
        // Check If The Result Is True Or False
        if ($areas) {
            return $areas;
        } else {
            return false;
        }
    }


    // Get All From Cities Table
    public function getCities() {
        $this->db->query("SELECT * FROM cities");

        $cities = $this->db->resultSet();
        // Check If The Result Is True Or False
        if ($cities) {
            return $cities;
        }else {
            return false;
        }
    }


    // Add New User
    public function addUser($data) {
        $this->db->query("INSERT INTO `users`(``, ``, ``, ``, ``, ``, ``, ``, ``, ``, ``) VALUES ");
    }


    // Add Diploma Into Database
    public function addDiploma($data) {
        $this->db->query("INSERT INTO `diplomas`(`name_diploma`, `level`, `data_diploma`, `etablissement`, `subject`) VALUES (:nama_diploma, :level, :date_diploma, :etablissement, :subject)");

        // Binding Data
        $this->db->bind(':name_diploma', $data['name_diploma']);
        $this->db->bind(':level', $data['level']);
        $this->db->bind(':data_diploma', $data['data_diploma']);
        $this->db->bind(':etablissement', $data['etablissement']);
        $this->db->bind(':subject', $data['subject']);

        $result = $this->db->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
