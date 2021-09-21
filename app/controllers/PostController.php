<?php

class PostController extends Controller
{

    public function __construct()
    {
        //Instanciation du model
        $this->postModel = $this->model('post');
    }


    // GO TO:

    // INDEX - ACCUEIL ADMIN
    public function index() {
        $result = $this->postModel->sexPhotos();
        $data = $this->postModel->getOneVideo();

        $this->view('admin/accueil', $result, $data);
    }

    // ADMIN FOLDERS OF IMAGES
    public function foldersPhotos() {
        $result = $this->getFolders();

        $this->view('admin/f-photos', $result);
    }

    // ADMIN PHOTOS PAGE
    public function photos() {
        if (isset($_POST['submit'])) {
            $data = [
                'id' => $_POST['id'],
                'error' => ''
            ];
            $result = $this->postModel->photos($data);
            if ($result) {
                $this->view('admin/photos', $result);
            }else {
                $data['error'] = 'Le dossier est vide';
                $this->view('admin/photos', $data);
            }
        }
    }

    // ADMIN VIDEO PAGE
    public function foldersVideos() {
        $result = $this->getFolders();

        $this->view('admin/f-videos', $result);
    }

    // PAGE VIDEOS
    public function videos() {
        if (isset($_POST['submit'])) {
            $data = [
                'id' => $_POST['id'],
                'error' => ''
            ];
            $result = $this->postModel->getVideoByIdFolder($data);

            if ($result) {
                $this->view('admin/videos', $result);
            }else {
                $data['error'] = 'Le dossier est vide';
                $this->view('admin/videos', $data);
            }
        }
    }

    // DASHBOARD PAGE
    public function dashboard() {
        $this->view('admin/dashboard');
    }

    // DASHBOARD PHOTO PAGE
    public function dashPhoto() {
        $result = $this->postModel->getPhotos();

        $this->view('admin/dash-photo', $result);
    }

    // FORM FOR ADD PHOTO
    public function add() {
        //  SELECT FLDERS FOR DISPLAY IT IN THE DROP DOWN SELECT
        $result = $this->getFolders();
        
        $this->view('admin/add-photo', $result);    
    }

    // DASHBOARD VIDEO PAGE
    public function dashVideo() {
        $result = $this->postModel->getVideos();

        $this->view('admin/dash-video', $result);
    }

    // ADD VIDEO PAGE
    public function addVideoPage() {
        //  SELECT FoLDERS FOR DISPLAY IT IN THE DROP DOWN SELECT
        $result = $this->getFolders();

        $this->view('admin/add-video', $result);
    }

    // DASHBOARD FOLDER 
    public function dashFolder() {
        $result = $this->getFolders();
        
        $this->view('admin/dash-folder', $result);
    }

    // ADD FOLDER PAGE
    public function addFolder() {
        $this->view('admin/add-folder');
    }

    // DASHBOARD CLIENT PAGE
    public function dashClient() {
        $this->view('admin/dash-client');
    }

    // RESULT OF SERSHING BY FOLDER
    public function resultAll() {
        if (isset($_POST['submit'])) {
            $data = [
                'id' => $_POST['id'],
                'error' => ''
            ];
            $result = $this->postModel->searchAll($data);

            if ($result) {
                echo '<pre>';
                var_dump($result);
                echo '</pre>';
                die();
            }
        }
    }



    // ADD METHODS

    // ADD PHOTO
    public function addPhoto() {
        if (isset($_POST['submit'])) {
            if (!empty($_FILES['new_image']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tag']) && !empty($_POST['folder'])) {
                
                
                $image = $_FILES['new_image']['tmp_name'];
                $data = [
                    'title' => $_POST['title'],
                    'image' => $_FILES['new_image']['name'],
                    'description' => $_POST['description'],
                    'tag' => $_POST['tag'],
                    'folder' => $_POST['folder'] 
                ];

                if ($this->uploadPhoto($image)  === true) {
                    if ($this->postModel->addPhoto($data)) {
                        header('Location: ' . URLROOT . '/PostController/dashPhoto');
                    }else {
                        header('Location: ' . URLROOT . '/Postcontroller/add');
                    }
                }
            } else {
                header('Location: ' . URLROOT . '/PostController/add');
            }
        }
    }

    // ADD VIDEO
    public function addVideo() {
        if (isset($_POST['submit'])) {
            $data= [
                'title' => $_POST['title'],
                'new_video' => $_FILES['new_video']['name'],
                'description' => $_POST['description'],
                'tag' => $_POST['tag'],
                'folder' => $_POST['folder'],
                'error' => ''
            ];
            if (!empty($_FILES['new_video']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tag']) && !empty($_POST['folder'])) {

                $video = $_FILES['new_video']['tmp_name'];

                if ($this->uploadVideo($video) === true) {
                    if ($this->postModel->addVideo($data)) {
                        header('Location: ' . URLROOT . '/PostController/dashVideo');
                    }else {
                        die('This is not working');
                    }
                }

            } else {
                $data['error'] = 'Un champ est vide';
                $this->view('admin/add-video', $data);
            }
        }
    }

    // Add Folder
    public function insertFolder() {
        if (isset($_POST['submit'])) {
            $data = [
                'name' => $_POST['name'],
                'new_image' => $_FILES['new_image'],
                'error' => ''
            ];
            
            if (!empty($_POST['name']) && !empty($_FILES['new_image'])) {
                
                $image = $_FILES['new_image']['tmp_name'];
                $data= [
                    'name' => $_POST['name'],
                    'new_image' => $_FILES['new_image']['name'],
                    'error' => ''
                ];

                $check = $this->postModel->oneFolder($data);
                if (!$check) {
                    if ($this->uploadPhoto($image) === true) {
                        if ($this->postModel->addFolder($data)) {
                            
                            header('Location: ' . URLROOT . '/PostController/dashFolder');
                        }
                    }
                    }else {
                        $data['error'] = 'Le dossier est déjà existe';
                        $this->view('admin/add-folder', $data);
                    }
            }else {
                $data['error'] = 'Les champs sont vides';
                $this->view('admin/add-folder', $data);
            }
        }
        
    }


    // DELETE METHODS

    // PHOTO
    public function deletePhoto() {
        $data = [
            'id' => $_POST['id'],
            'image' => $_POST['image']
        ];
        if ($this->postModel->deletePhoto($data)) {
            $image = $data['image'];
            $path = "C:\\xampp\htdocs\PFR\public\uploads/$image";
            chown($path, 666);

            if (unlink($path)) {
                header('location:' . URLROOT . '/' . 'PostController/dashPhoto');
            }else {
                $_SESSION["Le poste ne être pas supprimé"];
            }
        }else {
            echo "Post not deleted";
        }
        
        }

    // DELETE VIDEO
    public function deleteVideo() {
        $data = [
            'id' => $_POST['id'],
            'video' => $_POST['video'],
            'error' => ''
        ];
        if ($this->postModel->deleteVideo($data)) {
            $video = $data['video'];
            $path = "C:\\xampp\htdocs\PFR\public\uploads/$video";
            chown($path, 666);

            //   if (unlink($path)) {
                header('location:' . URLROOT . '/' . 'PostController/dashVideo');
            //   }else {
            //       $data['error'] = ["Le poste ne être pas supprimé"];
            //   }
        }else {
            echo "Post not deleted";
        }
    }

    // FOLDER
    public function deleteFolder() {
        $data = [
            'id' => $_POST['id_folder'],
            'image' => $_POST['image']
        ];
        
        if ($this->postModel->deleteFolder($data)) {
            header('Location: ' . URLROOT . '/PostController/dashFolder');
        }
    }


    // UPDATE METHODS

    // PHOTO
    // Select One Post From Data
    public function editPhoto() {
        $data = [
            'id' => $_POST['id'],
            'image' => $_POST['image']
        ];

        $result = $this->postModel->selectOnePhoto($data);
        $data1 = $this->postModel->selectFolder();

        if($result) {
            $this->view('admin/edit-photo', $result, $data1);
        }else {
            return false;
        }
    }

    // UPDATE PHOTO
    public function updatePhoto() {
        if (isset($_POST['submit'])) {
            if (!empty($_FILES['new_image']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tag']) && !empty($_POST['folder'])) {


                $new_image = $_FILES['new_image']['tmp_name'];
                $data = [
                    'id' => $_POST['id'],
                    'title' => $_POST['title'],
                    'old_image' => $_POST['old_image'],
                    'new_image' => $_FILES['new_image']['name'],
                    'tag' => $_POST['tag'],
                    'description' => $_POST['description'],
                    'folder' => $_POST['folder'],
                ];

                $old_image = $data['old_image'];
                $path = "C:\\xampp\htdocs\PFR\public\uploads/$old_image";
                chown($path, 666);
                
            //   if (unlink($path)) {
                    if ($this->uploadPhoto($new_image) === true) {
                        $this->postModel->updatePhoto($data);

                        header('Location: ' . URLROOT . '/PostController/dashPhoto');
                    }
                // }
            }
        }
    }


    // VIDEO
    public function editVideo() {
        $data = [
            'id' => $_POST['id'],
            'video' => $_POST['video'],
        ];

        $result = $this->postModel->selectOneVideo($data);
        $data1 = $this->postModel->selectFolder();
        
        if ($result) {
            $this->view('admin/edit-video', $result, $data1);
        }else {
            return false;
        }
    }

    // UPDATE VIDEO 
    public function updateVideo() {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['title']) && !empty($_FILES['new_video']) && !empty($_POST['description']) && !empty($_POST['tag'])) {
                
                $new_video = $_FILES['new_video']['tmp_name'];
                $data = [
                    'id' => $_POST['id'],
                    'title' => $_POST['title'],
                    'old_video' => $_POST['old_video'],
                    'new_video' => $_FILES['new_video']['name'],
                    'tag' => $_POST['tag'],
                    'description' => $_POST['description'],
                    'folder' => $_POST['folder'],
                ];

                $old_video = $data['old_video'];
                $path = "C:\\xampp\htdocs\PFR\public\uploads/$old_video";
                chown($path, 666);

                if ($this->uploadVideo($new_video) === true) {
                    $this->postModel->updateVideo($data);

                    header('Location: ' . URLROOT . '/PostController/dashVideo');
                }
            }
        }
    }


    // FOLDER
    public function editFolder() {
        $data = [
            'id' => $_POST['id_folder'],
            'new_image' => $_POST['image']
        ];

        $result = $this->postModel->getFolderById($data);

        if ($result) {
            $this->view('admin/edit-folder', $result);
        }else {
            return false;
        }
    }

    // UPDATE FOLDER
    public function updateFolder() {
        if (isset($_POST['submit'])) {
            if (!empty($_FILES['new_image']) && !empty($_POST['name'])) {


                $new_image = $_FILES['new_image']['tmp_name'];
                $data = [
                    'id_folder' => $_POST['id'],
                    'name' => $_POST['name'],
                    'old_image' => $_POST['old_image'],
                    'new_image' => $_FILES['new_image']['name']
                ];

                $old_image = $data['old_image'];
                $path = "C:\\xampp\htdocs\PFR\public\uploads/$old_image";
                chown($path, 666);
                
            //   if (unlink($path)) {
                    if ($this->uploadPhoto($new_image) === true) {
                        if ($this->postModel->updateFolder($data)) {
                            
                            header('Location: ' . URLROOT . '/PostController/dashFolder');   
                        }else {
                            echo 'Post model returns false';
                        }
                    }else {
                        echo 'method uploafPhoto returns false';
                    }
                // }
            }
        }
    }


    // SUPPORT METHODS

    // GET FOLDERS
    public function getFolders() {
        $result = $this->postModel->getFolders();

        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // UPLOAD IMAGE
    public function uploadPhoto($image)
    { 
    $dir = "C:\\xampp\htdocs\PFR\public\uploads";
    $name = str_replace(' ','-',strtolower($_FILES["new_image"]["name"]));
    $type = $_FILES["new_image"]["type"];
    if(move_uploaded_file($image,$dir."/".$name))
    {
        return true;    
    }else{
        return false;
    }
    }

    // UPLOAD VIDEO
    public function uploadVideo($video) {
        
        $dir = "C:\\xampp\htdocs\PFR\public\uploads";
        $name = str_replace(' ','-',strtolower($_FILES["new_video"]["name"]));
        $position = strpos($name, ".");
        $extension = substr($name, $position + 1);
        if ($extension == "mp4" || $extension == "mkv" || $extension == "ogg" || $extension == "webm") {
            if(move_uploaded_file($video,$dir.$name))
            {
                return true;    
            }else{
                return false;
            }
        }
        
        
    }


    // Update The Data Selected 
    public function datePhoto() {
        if (isset($_POST['"btn-update'])) {
            if (!empty($_FILES['new_image']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['tag']) && !empty($_POST['folder'])) {
                
                $new_image = $_FILES['new_image']['tmp_name'];
                $data= [
                    'title' => $_POST['title'],
                    'image' => $_FILES['new_image']['name'],
                    'description' => $_POST['description'],
                    'tag' => $_POST['tag'],
                    'folder' => $_POST['folder']
                ];

                if ($this->uploadPhoto() === true) {
                    if ($this->postModel->updatePhoto()) {
                        echo 'all is going right';
                    }
                }

            }else {
                $error = [
                    'error' => 'IL Y A DES CHAMPS VIDES'
                ];

                $this->view('admin/edit-photo', [], $error);
            }
        }else {
            $this->view('admin/edit-photo');
        }
    }

    
}



    

    
    


    
