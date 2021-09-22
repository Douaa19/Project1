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
}