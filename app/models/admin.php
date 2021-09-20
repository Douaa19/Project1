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

        $admin = $this->db->resultSet();
        if ($admin) {
            return $admin;
        }else {
            return false;
        }
    }
}