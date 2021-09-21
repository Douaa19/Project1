<?php

class post {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    // ADD PHOTO
    public function addPhoto($data) {
        
        $this->db->query("SELECT * FROM folders WHERE name = :folder");
        $this->db->bind(':folder', $data['folder']);
        $result = $this->db->single();

        $id_folder = $result->id_folder;

        $this->db->query("INSERT INTO `images`(`title`, `image`, `description`, `tag`, `id_folder`) VALUES (:title, :image, :description, :tag, :id_folder)");
        // BIND THE DATA
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':tag', $data['tag']);
        $this->db->bind(':id_folder', $id_folder);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    // GET ALL PHOTOS
    public function getPhotos() {
        $this->db->query("SELECT * FROM images ORDER BY id DESC");
        $result = $this->db->resultSet();

        return $result;
    }

    // GET PHOTOS BY ID FOLDER
    public function photos($data) {
        $this->db->query("SELECT * FROM images WHERE id_folder = :id");
        $this->db->bind(':id', $data['id']);

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET 6 PHOTOS
    public function sexPhotos() {
        $this->db->query("SELECT * FROM images ORDER BY id DESC LIMIT 7");
        $result = $this->db->resultSet();

        return $result;
    }

    // Delete photo
    public function deletePhoto($data) {
        $this->db->query("DELETE FROM `images` WHERE id = :id");
        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
           return false;
        }
    }

    // Select OneRow From Table Images Using ID
    public function selectOnePhoto($data) {
        $this->db->query("SELECT * FROM images WHERE id = :id");
        $this->db->bind(':id', $data['id']);

        $result = $this->db->single();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }



    // Update Photo
    public function updatePhoto($data) {
        $result = $this->folderByName($data);

        if ($result) {
            $this->db->query("UPDATE `images` SET `title` = :title, `image`= :image, `description`= :description, `tag`= :tag, `id_folder`= :id_folder WHERE id = :id");
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':image', $data['new_image']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':tag', $data['tag']);
            $this->db->bind(':id_folder', $result->id_folder);
            $this->db->bind(':id', $data['id']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        }else {
            echo 'result is false!!';
        }
 
    }

     

    // Add videos to database
    public function addVideo($data) {
        $this->db->query("SELECT * FROM folders WHERE name = :folder");
        $this->db->bind(':folder', $data['folder']);
        $result = $this->db->single();

        $id_folder = $result->id_folder;

        $this->db->query("INSERT INTO `videos`(`title`, `video`, `description`, `tag`, `id_folder`) VALUES (:title, :video, :description, :tag, :id_folder)");
        // BIND THE DATA
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':video', $data['new_video']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':tag', $data['tag']);
        $this->db->bind(':id_folder', $id_folder);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // SELECT ALL VIDEOS FROM DATABASE
    public function getVideos() {
        $this->db->query("SELECT * FROM videos ORDER BY id DESC");
        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }else {
            return 'Le tableau est vide';
        }
    }


    // SELECT ONE VIDEOS FROM DATABASE TO DISPLAY IT IN HOME PAGE
    public function getOneVideo() {
        $this->db->query("SELECT * FROM videos ORDER BY id DESC LIMIT 1");

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // DELETE VIDEO FROM DATABASE
    // DELETE VIDEO
    public function deleteVideo($data) {
        $this->db->query("DELETE FROM `videos` WHERE id = :id");
        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
           return false;
        }
    }

    // SELECT ONE VIDEO BY ID
    public function selectOneVideo($data) {
        $this->db->query("SELECT * FROM videos WHERE id = :id");
        $this->db->bind(':id', $data['id']);

        $result = $this->db->single();

        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // UPDATE VIDEO
    public function updateVideo($data) {
        $result = $this->folderByName($data);

        if ($result) {
            $this->db->query("UPDATE `videos` SET `title` = :title, `video`= :video, `description`= :description, `tag`= :tag, `id_folder`= :id_folder WHERE id = :id");
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':video', $data['new_video']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':tag', $data['tag']);
            $this->db->bind(':id_folder', $result->id_folder);
            $this->db->bind(':id', $data['id']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }

        }else {
            echo 'result is false!!';
        }
    }

    // GET ONE VIDEO BY ID_FOLDER
    public function getVideoByIdFolder($data) {
        $this->db->query("SELECT * FROM videos WHERE id_folder = :id");
        $this->db->bind(':id', $data['id']);

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }



    // Select All Data From Table Folders
    public function getFolders() {
        $this->db->query("SELECT * FROM folders ORDER BY id_folder DESC");

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // Select One Folder For Checking
    public function oneFolder($data) {
        $this->db->query("SELECT name FROM folders WHERE name = :name");
        $this->db->bind(':name', $data['name']);
        
        $result = $this->db->single();
        if ($result) {
            return true;
        }else {
            return false;
        }
    }

    // Select One Folder By Name
    public function folderByName($data) {
        $this->db->query("SELECT id_folder FROM folders WHERE name = :name");
        $this->db->bind(':name', $data['folder']);
        
        $result = $this->db->single();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET ONE FOLDER BY ID_FOLDER
    public function getFolderById($data) {
        $this->db->query("SELECT * FROM folders WHERE id_folder = :id");
        $this->db->bind('id', $data['id']);

        $result = $this->db->single();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // Add Folder 
    public function addFolder($data) {
        $this->db->query("INSERT INTO `folders`(`name`, `image`) VALUES (:name, :image)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['new_image']);

        if ($this->db->execute()) {
            return true;
        }else {
            return false;
        }
    }

    // UPDATE FOLDER
    public function updateFolder($data) {
        
        $this->db->query("UPDATE `folders` SET `name` = :name, `image`= :image WHERE id_folder = :id");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['new_image']);
        $this->db->bind(':id', $data['id_folder']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete Folder From Folders Table
    public function deleteFolder($data) {
        $this->db->query("DELETE FROM `folders` WHERE id_folder = :id");
        $this->db->bind(':id', $data['id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Folder In Images Table
    public function selectFolder(){
        $this->db->query("SELECT * FROM folders");

        $result = $this->db->resultSet();
        if ($result) {
            return $result;
        }else {
            return false;
        }
    }




    // SEARCH FOR ALL BY ID_FOLDER
    public function searchAll($data) {
        $this->db->query("SELECT * FROM ");
        $this->db->bind(':id_folder', $data['id']);

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    

}