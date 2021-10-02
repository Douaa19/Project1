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


    // Get One area
    public function getOneArea($data) {
        $this->db->query("SELECT * FROM area WHERE name_area = :activity");

        $this->db->bind(':activity', $data['activity']);

        $data = $this->db->single();
        if ($data) {
            return $data;
        }else {
            return false;
        }
    }


    // // Get One City
    public function getCity($data) {
        $this->db->query("SELECT * FROM cities WHERE name_city = :city");

        $this->db->bind(':city', $data['city']);

        $data = $this->db->single();
        if ($data) {
            return $data;
        }else {
            return false;
        }
    }


    // Add New User
    public function addUser($data) {
        $area = $this->getOneArea($data);
        $city = $this->getCity($data);
        // var_dump($area, $city);
        // die();

        if ($area && $city) {
            $this->db->query("INSERT INTO `users`(`civility`, `lName`, `fName`, `id_area`, `date_birth`, `email`, `phone`, `zip_code`, `address`, `country`, `id_city`, `name_file`) VALUES (:sexe, :lName, :fName, :activity, :date_birth, :email, :phone, :zip_code, :address, :country, :city, :name_file)");

            // Binding Data
            $this->db->bind(':sexe', $data['sexe']);
            $this->db->bind(':lName', $data['lName']);
            $this->db->bind(':fName', $data['fName']);
            $this->db->bind(':activity', $area->id_area);
            $this->db->bind(':date_birth', $data['date_birth']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':zip_code', $data['zip_code']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':city', $city->id_city);
            $this->db->bind(':name_file', $data['name_file']);

            $result = $this->db->execute();
            if ($result) {
                return true;
            }else {
                return false;
            }
        }
    }


    // Get Some Infos For Check If The User Is Allredy Exists
    public function getUser($data) {
        $this->db->query("SELECT * FROM users WHERE email = :email AND fName = :fName AND lName = :lName");

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':fName', $data['fName']);
        $this->db->bind(':lName', $data['lName']);

        $data = $this->db->single();
        if ($data) {
            return $data;
        }else {
            return false;
        }
    }


    // Get Some Infos For Check If The User Is Allredy Exists
    public function getUserByEmail($data) {
        $this->db->query("SELECT * FROM users WHERE email = :email");

        $this->db->bind(':email', $data['email']);

        $data = $this->db->single();
        if ($data) {
            return $data;
        }else {
            return false;
        }
    }


    // Get One Id User
    public function getIdUser($data) {
        $this->db->query("SELECT users.id_user FROM users WHERE email = :email AND fName = :fName AND lName = :lName");

        $this->db->bind(':email', $data['email']);
        $this->db->bind(':fName', $data['fName']);
        $this->db->bind(':lName', $data['lName']);
        
        $idUser = $this->db->single();
        
        if ($idUser) {
            return $idUser;
        }else {
            return false;
        }
    }


    // Add Diploma Into Database
    public function addDiploma($data) {
        $this->db->query("INSERT INTO `diplomas`(`name_diploma`, `level`, `date_diploma`, `etablissement`, `subject`, `id_user`) VALUES (:name_diploma, :level, :date_diploma, :etablissement, :subject, :id_user)");

        // Binding Data
        $this->db->bind(':name_diploma', $data['name_diploma']);
        $this->db->bind(':level', $data['level']);
        $this->db->bind(':date_diploma', $data['date_diploma']);
        $this->db->bind(':etablissement', $data['etablissement']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':id_user', $data['id_user']);

        $result = $this->db->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    // Get All Diplomas
    public function getDiplomas($data) {

        $this->db->query("SELECT * FROM `diplomas` WHERE id_user = :id_user");
        $this->db->bind(':id_user', $data['id_user']);

        $diplomas = $this->db->resultSet();

        if ($diplomas) {
            return $diplomas;
        }else {
            return false;
        }
    }


    // Delete Diploma 
    public function deleteDiploma($data) {

        $this->db->query("DELETE FROM `diplomas` WHERE id_diploma = :id_diploma");
        $this->db->bind(':id_diploma', $data['id_diploma']);

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }


    // Add Experience Into Database
    public function addExperience($data) {
        $this->db->query("INSERT INTO `experiences`(`start_date`, `end_date`, `company`, `type_contract`, `function`, `area`, `details`, `id_user`) VALUES (:start_date,:end_date,:company,:type_contract,:function,:area,:details,:id_user)");
        $this->db->bind(':start_date', $data['start_date']);
        $this->db->bind(':end_date', $data['end_date']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':type_contract', $data['type_contract']);
        $this->db->bind(':function', $data['function']);
        $this->db->bind(':area', $data['area']);
        $this->db->bind(':details', $data['details']);
        $this->db->bind(':id_user', $data['id_user']);

        $add = $this->db->execute();

        if ($add) {
            return true;
        }else {
            return false;
        }
    }


    // Get All Experiences For One Id_User
    public function getExperiences($data) {
        $this->db->query("SELECT * FROM experiences WHERE id_user = :id_user");
        $this->db->bind(':id_user', $data['id_user']);

        $experiences = $this->db->resultSet();
        if ($experiences) {
            return $experiences;
        }else {
            return false;
        }
    }


    // Delete Experience With Id_User
    public function deleteExperience($data) {

        $this->db->query("DELETE FROM `experiences` WHERE id_experience = :id_experience");
        $this->db->bind(':id_experience', $data['id_experience']);

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }


    // Add Language Into Database
    public function addLanguage($data) {
        $this->db->query("INSERT INTO `languages`(`name_language`, `level`, `id_user`) VALUES (:name_language, :level, :id_user)");
        $this->db->bind(':name_language', $data['name_language']);
        $this->db->bind(':level', $data['level']);
        $this->db->bind(':id_user', $data['id_user']);

        $add = $this->db->execute();
        if ($add) {
            return true;
        }else {
            return false;
        }
    }


    // Get All Languages From Table
    public function getLanguages($data) {
        $this->db->query("SELECT * FROM `languages` WHERE id_user = :id_user");
        $this->db->bind(':id_user', $data['id_user']);

        $languages = $this->db->resultSet();
        if($languages){
            return $languages;
        }else {
            return false;
        }
    }


    // Delete Language With Id_language
    public function deleteLanguage($data) {
        $this->db->query("DELETE FROM `languages` WHERE id_language = :id_language");
        $this->db->bind(':id_language', $data['id_language']);

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }


    // Add Competence Into Database
    public function addCompetence($data) {
        $this->db->query("INSERT INTO `competences`(`name_competence`, `id_user`) VALUES (:name_competence, :id_user)");
        $this->db->bind(':name_competence', $data['name_competence']);
        $this->db->bind(':id_user', $data['id_user']);

        $add = $this->db->execute();
        if ($add) {
            return true;
        }else {
            return false;
        }
        
    }


    // Get All Competences With Id_User
    public function getCompetences($data) {
        $this->db->query("SELECT * FROM `competences` WHERE id_user = :id_user");
        $this->db->bind(':id_user', $data['id_user']);

        $competences =$this->db->resultSet();
        if ($competences) {
            return $competences;
        }else {
            return false;
        }
    }


    // Delete Competence With Id_Competence
    public function deleteCompetence($data) {
        $this->db->query("DELETE FROM `competences` WHERE id_competence = :id_competence");
        $this->db->bind('id_competence', $data['id_competence']);

        $result = $this->db->execute();
        if ($result) {
            return true;
        }else {
            return false;
        }
    }



    // Get User Email With Id_User
    public function getEmail($data) {
        $this->db->query("SELECT users.email FROM users WHERE id_user = :id_user");
        $this->db->bind(':id_user',$data['id_user']);

        $email = $this->db->single();
        if ($email) {
            return $email;
        }else {
            return false;
        }
    }


    // Add Password Of New User With Email & Id_User
    public function insertPassword($data) {
        $this->db->query("UPDATE `users` SET `password` = :safePassword WHERE id_user = :id_user");
        $this->db->bind(':safePassword', $data['safePassword']);
        $this->db->bind(':id_user', $data['id_user']);

        $result = $this->db->execute();
        if ($result) {
            return true;
        }else {
            return false;
        }
    }



    // Check If The User Have Account Befor Or Not
    public function checkUserEmail($data) {
        $this->db->query("SELECT users.email FROM users WHERE email = :email");
        $this->db->bind(':email', $data['email']);

        $email = $this->db->single();
        if ($email) {
            return $email;
        }else {
            return false;
        }
    }


    // Check If The User Password Is In The database With Email
    public function checkUserPassword($data) {
        $this->db->query("SELECT users.password FROM users WHERE email = :email");
        $this->db->bind(':email', $data['email']);

        $password = $this->db->single();
        $hashed_password = $password->password;
        
        if (password_verify($data['password'], $hashed_password)) {
            return true;
        }else {
            return false;
        }
    }


    // Get All Offres From Database
    public function getOffres() {
        $this->db->query("SELECT * FROM offres");
        $offres = $this->db->resultSet();

        if ($offres) {
            return $offres;
        }else {
            return false;
        }
    }


    // Get All Details For One Offre With Id_Offre
    public function getDetails($id_offre) {
        $this->db->query("SELECT * FROM offres WHERE id_offre = :id_offre");
        $this->db->bind(':id_offre', $id_offre['id_offre']);

        $details = $this->db->single();
        if ($details) {
            return $details;
        }else {
            return false;
        }
    }


    // Insert Ids for Users Who Applied For Particulare Offre
    public function addToApply($data) {
        $this->db->query("INSERT INTO `toapply`(`id_user`, `id_offre`) VALUES (:id_user, :id_offre)");
        $this->db->bind(':id_user', $data['id_user']);
        $this->db->bind(':id_offre', $data['id_offre']);

        $result = $this->db->execute();
        if ($result) {
            return true;
        }else {
            return false;
        }
    }


    public function checkApply($data) {
        $this->db->query("SELECT * FROM toapply WHERE id_user = :id_user AND id_offre = :id_offre");
        $this->db->bind(':id_user', $data['id_user']);
        $this->db->bind(':id_offre', $data['id_offre']);

        $result = $this->db->single();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }
    
}
