<?php

class AdminController extends Controller
{





    public function __construct()
    {
        //instanciation du model
        $this->adminModel = $this->model('admin');
    }

    public function accueil() {
        $this->view('admin/accueil');
    }


    public function index()
    {
        $this->view('admin/index');
    }

    // Login method
    public function login() {

        if(isset($_POST['submit_login'])) {

            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_error' => '',
                'password_error' => ''
            ];

            if (empty($data['email'])) {
                $data['email_error'] = '*Saisir votre email*';
            }

            if (empty($data['password'])) {
                $data['password_error'] = '*Saisir votre password*';
            }

            if(!empty($data['email']) && !empty($data['password'])) {

                $result = $this->adminModel->getAdmin($data);

                if ($result === false) {
                    $this->view('admin/index');
                }else {
                    $email = $data['email'];
                    $password = $data['password'];
                    $dbEmail = $result->email;
                    $dbPassword = $result->password;
                    if ($email === $dbEmail && $password === $dbPassword) {
                        $this->createSession($result);
                    }
                }

                
            }

            $this->view('admin/index', $data);

        }else {
            $this->view('admin/index');
        }

    }

    // Create session for login
    public function createSession($admin) {
        // session_start();
        $_SESSION['id'] = $admin->id;
        $_SESSION['name'] = $admin->name;
        $_SESSION['email'] = $admin->email;
        $_SESSION['password'] = $admin->password;

        header('Location: ' . URLROOT . '/PostController/index');

    }

    // Kill session for logout
    public function killSession() {

        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        session_destroy();

        header('Location: ' . URLROOT . '/AdminController/index');
    }

    // Serch method
    public function search() {
        if (isset($_POST['submit_search'])) {
            if (!empty($_POST['name'])) {
                
                $data = [
                    'name' => $_POST['name'],
                    'error_search' => ''
                ];

                $result = $this->adminModel->search($data);

                if ($result) {
                    $this->view('admin/result', $result);
                }else {
                    $data = [
                        'search' => '',
                        'error_search' => "Le resultat ne trouve pas"
                    ];
                    $this->view('admin/result', [], $data);
                }

            } else {
                header('Location: ' . URLROOT . '/PostController/index');
            }
        }
    }

    

    // GET CLIENTS 
    public function dashClient() {
        $result = $this->adminModel->getClients();

        for ($i=0; $i > 0 ; $i++) { 
            $result[$i]->gender = explode(',', $result[$i]->gender);
            $result[$i]->occasion = explode(',', $result[$i]->occasion);
        }

        if ($result) {
            $this->view('admin/dash-client', $result);
        }else {
            return false;
        }
    }

    
}
