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




































}