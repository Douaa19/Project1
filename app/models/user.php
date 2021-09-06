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
}
