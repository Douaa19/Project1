<?php 

class Visiteur

{
    private $database;
    // TO WORK WITH THE DATABASE 
    public function __construct()
    {
        $this->db = new Database;
    }

    // GET SEVEN PHOTOS
    public function getPhotos() {
        $this->db->query("SELECT * FROM images ORDER BY id DESC LIMIT 7");

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET TOO VIDEOS 
    public function getVideos() {
        $this->db->query("SELECT * FROM videos ORDER BY id DESC LIMIT 1");

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET FOLDERS
    public function getFolders() {
        $this->db->query("SELECT * FROM folders");

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET ALL PHOTOS
    public function allPhotos($data) {
        $this->db->query("SELECT * FROM images WHERE id_folder = :id");
        $this->db->bind(':id', $data['id']);

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET ALL PHOTOS
    public function allVideos($data) {
        $this->db->query("SELECT * FROM videos WHERE id_folder = :id");
        $this->db->bind(':id', $data['id']);

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // SEARCH FOR FOLDERS
    public function searchFolders($data) {
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

    // METHOD TO INSERT DATA CLIENT INTO DATABASE
    public function insertClient($data) {
        $this->db->query("INSERT INTO `clients`(`email`, `phone`, `gender`, `occasion`) VALUES (:email, :phone, :gender, :occasion)");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        // ocassion and gender values
        $oca_string = '';
        $gen_string = '';
        //  concatinating gender if not null
            foreach ($data['gender'] as $gender) {
                if ($gender != 0) {
                    $gen_string .= $gender .',';
                }
            }
 
        // concatinating all the occasions that the user choose

            foreach ($data['occasion'] as $occasion) {
                if ($occasion != 0) {

                    $oca_string .= $occasion .',';
                }
            }
            $this->db->bind(':gender', $gen_string);
            $this->db->bind(':occasion', $oca_string);
            

        $push = $this->db->execute();

        return $push;
    }

}