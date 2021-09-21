<?php

class VisiteurController extends Controller {
    public function __construct() {
        $this->visiteurModel = $this->model('Visiteur');
    }

    // GO TO METHODS

    // THE FIRST PAGE
    // this method take seven photos to the index page
    public function index() {
        $result = $this->getPhotos();
        // this method take one videos to the index page
        $data = $this->getVideos();
        $this->view('visiteur/index', $result, $data);
    }

    // this method take all folders to f-photos
    public function foldersPhotos() {
        $result = $this->getFolders();

        $this->view('visiteur/f-photos', $result);
    }

    // this method take all folders to f-videos
    public function foldersVideos() {
        $result = $this->getFolders();

        $this->view('visiteur/f-videos', $result);
    }


    // GET METHODS

    // GET SEVEN PHOTOS
    public function getPhotos() {
        $result = $this->visiteurModel->getPhotos();

        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET TOO VIDEOS
    public function getVideos() {
        $result = $this->visiteurModel->getVideos();

        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET FOLDERS
    public function getFolders() {
        $result = $this->visiteurModel->getFolders();

        if ($result) {
            return $result;
        }else {
            return false;
        }
    }

    // GET ALL PHOTOS
    public function photos() {
        if (isset($_POST['submit'])) {
            $data = [
                'id' => $_POST['id'],
                'error' => '' 
            ];
            $result = $this->visiteurModel->allPhotos($data);

            if ($result) {
                $this->view('visiteur/photos', $result);
            }else {
                $data['error'] = 'Le dossier est vide';
                $this->view('visiteur/photos', $data);
            }
        }
    }

    // GET ALL VIDEOS
    public function videos() {
        if (isset($_POST['submit'])) {
            $data = [
                'id' => $_POST['id'],
                'error' => '' 
            ];
            $result = $this->visiteurModel->allVideos($data);

            if ($result) {
                $this->view('visiteur/videos', $result);
            }else {
                $data['error'] = 'Le dossier est vide';
                $this->view('visiteur/videos', $data);
            }
        }
    }

    // THIS METHOD FOR SEARCH
    public function search() {
        if (isset($_POST['submit_search'])) {
            if (!empty($_POST['name'])) {
                $data = [
                'name' => $_POST['name'],
                'error' => ''
                ];
                $result = $this->visiteurModel->searchFolders($data);

                if ($result) {
                    $this->view('visiteur/result', $result);
                }else {
                    $data['error'] = 'Le dossier n\'existe pas';
                    $this->view('visiteur/result', $data);
                }
            }else {
                $data['error'] = 'La bare de recherche est vide';
                $this->view('visiteur/result', $data);
                // header('Location: ' . URLROOT . '/VisiteurController/index/' . $data['error']);
            }
            
        }
    }

    // ADD CLIENT IN DATABASE
    public function addClient() {
        if (isset($_POST['envoyer'])) {
            if (!empty($_POST['email']) && !empty($_POST['phone'])) {
                // genders checkbox values
                $check_photo = isset($_POST['photos']) ? $_POST['photos'] : 0;
                $check_video = isset($_POST['videos']) ? $_POST['videos'] : 0;
                // occasions checkbox values
                $check_marriage = isset($_POST['marriage']) ? $_POST['marriage'] : 0;
                $check_anniversaire = isset($_POST['anniversaire']) ? $_POST['anniversaire'] : 0;
                $check_fete = isset($_POST['fête']) ? $_POST['fête'] : 0;
                $check_match = isset($_POST['match']) ? $_POST['match'] : 0;
                $check_shooting = isset($_POST['shooting']) ? $_POST['shooting'] : 0;
                $check_autre = isset($_POST['autre']) ? $_POST['autre'] : 0;
                if (isset($_POST['videos']) || isset($_POST['marriage']) || isset($_POST['fête']) || isset($_POST['anniversaire']) || isset($_POST['match']) || isset($_POST['shooting']) || isset($_POST['autre'])) {
                    $data = [
                        'email' => $_POST['email'],
                        'phone' => $_POST['phone'],
                        'gender' => [
                            'photos' => $check_photo,
                            'vidéos' => $check_video,
                        ],
                        'occasion' => [
                            'marriage' => $check_marriage,
                            'fête' => $check_fete,
                            'anniversaire' => $check_anniversaire,
                            'match' => $check_match,
                            'shooting' => $check_shooting,
                            'autre' => $check_autre
                        ],
                        'error' => ''
                    ];
                    $this->visiteurModel->insertClient($data);
                    header('Location: ' . URLROOT . '/VisiteurController/index');
                }
                
            }else {
                header('Location: ' . URLROOT . '/VisiteurController/index');
            }
        }
    }

    
    

    
}