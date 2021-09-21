<?php

class admin

{
    private $database;
    public function __construct()
    {
        $this->db = new Database;
    }

    // GET ADMIN EMAIL AND PASSWORD FROM DATABASE
    public function getAdmin($data)
    {

        $this->db->query("SELECT * FROM admin WHERE email = :email AND password = :password");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        $result = $this->db->single();
        

        if (!$result) {
            return false;
        } else {
            return $result;
        }

        
    }

    // CHECK IF THE EMAIL EXISTE IN DATABASE
    public function findAdmin($email) {
        $this->db->query("SELECT * FROM admin WHERE email = :email");
        $this->db->bind(':email', $email);

        $result = $this->db>single();

        if ($this->db->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
    }

    // GET RESULT FROM DATABASE
    public function search($data) {
        $this->db->query("SELECT * FROM folders WHERE name = :name");
        $this->db->bind(':name', $data['name']);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }else {
            return false;
            die();
        }
    }

    // GET CLIENTS FROM DATABASE
    public function getClients() {
        $this->db->query("SELECT * FROM clients");
        
        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }
}
