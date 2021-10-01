<?php 

class AdminsController extends Controller
{


    public function __construct()
    {
        //instanciation du model
        $this->adminModel = $this->model('admin');
        $this->session = new Session;
    }



    public function index() {
        $data = [
            'email' => '',
            'password' => '',
            'error_email' => '',
            'error_password' => '',
            'error_message' => '',
        ];
        $this->view('admin/index', $data);
    }



    public function loginSuperAdmin() {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'error_email' => '',
            'error_password' => '',
            'error_message' => '',
        ];

        if (empty($data['email'])) {
            $data['error_email'] = "S'il vous plaît remplir le champ email";
        }
        if (empty($data['password'])) {
            $data['error_password'] = "S'il vous plaît remplir le champ mot de passe";
        }
        if (empty($data['email']) || empty($data['password'])) {
            $data['error_message'] = "S'il vous plaît remplir les champs";
        }

        if (!empty($data['email']) && !empty($data['password'])) {
            $checkAdmin = $this->adminModel->checkAdmin($data);
            if ($checkAdmin) {
                if ($checkAdmin->email == $data['email'] && $checkAdmin->password == $data['password']) {
                    $this->session->setSession('id_admin',$checkAdmin->id_admin);
                    $this->session->setSession('email',$checkAdmin->email);
                    $this->view('admin/homePage');
                }elseif($checkAdmin->email == $data['email'] && $checkAdmin->password !== $data['password']) {
                    $data['error_password'] = "Le mot de passe est incorrect";
                    $this->view('admin/index', $data);
                }elseif ($checkAdmin->email !== $data['email'] && $checkAdmin->password == $data['password']) {
                    $data['error_email'] = "Adresse mail est incorrect";
                    $this->view('admin/index', $data);
                }
                
            }else {
                $data['error_message'] = "Les informations ne sont pas corrects";
                $this->view('admin/index', $data);
            }
        }else {
            $data['error_message'] = "S'il vous plaît remplir les champs";
            $this->view('admin/index', $data);
        }
    }


    // Logout Admin
    public function logout() {
        $data = [
            'email' => '',
            'password' => '',
            'error_email' => '',
            'error_password' => '',
            'error_message' => '',
        ];
        $this->session->unsetSession('id_admin');
        $this->session->unsetSession('email');
        $this->view('admin/index', $data);
    }


    // 
    public function dashboard() {
        $users = $this->adminModel->getUsers();
        if ($users) {
            $this->view('admin/dashboard', $users);
        }else {
            $data['error_message'] = "Il y a un erreur dans cette page";
            $this->view('admin/dashbord', $data);
        }
    }

    // Navigate To Offres Page
    public function offres() {
        $this->view('admin/offres');
    }


    // Navigate To Page That Contin Form For Adding Offres
    public function addOffrePage() {
        $this->view('admin/addOffre');
    }

    // Method AddOffer
    public function addOffre() {
        $data = [
            'title' => $_POST['title'],
            'date' => $_POST['date'],
            'city' => $_POST['city'],
            'type_contrat' => $_POST['type_contrat'],
            'poste' => $_POST['poste'],
            'mission' => $_POST['mission'],
            'profil' => $_POST['profil'],
            'experience' => $_POST['experience'],
            'error_message' => ''
        ];

        if (empty($data['title']) || empty($data['date']) || empty($data['city']) || empty($data['type_contrat']) || empty($data['poste']) || empty($data['mission']) || empty($data['profil']) || empty($data['experience'])) {
            $data['error'] = 'Il faut remplire tout les champs';
            $this->view('admin/addOffre', $data);
        }else {
            $insert = $this->adminModel->addOffre($data);
            if ($insert) {
                header('Location: ' . URLROOT . '/AdminsController/getOffres');
            }else {
                $data['error_message'] = "Il y a un error au niveau de la requette";
                $this->view('admin/addOffre', $data);
            }
            
        }
    }


    // Get All Offres
    public function getOffres() {
        $offres = $this->adminModel->getOffres();
        $this->view('admin/offres', $offres);
    }


    // Delete Offre
    public function deleteOffre() {
        $id_offre = $_POST['id_offre'];

        $result = $this->adminModel->deletOffre($id_offre);
        if ($result) {
            header('Location: ' . URLROOT . '/AdminsController/getOffres');
        }else {
            $data['error_message'] = "L'offre n'a pas été supprimé";
            $this->view('admin/offre', $data);
        }
    }






































}