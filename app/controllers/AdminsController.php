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
        $this->view('admin/index');
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
                if ($checkAdmin['email'] == $data['email'] && $checkAdmin['password'] == $data['password']) {
                    $this->session->setSession('id_user',$checkAdmin->id_admin);
                    $this->view('admin/homePage');
                }elseif($checkAdmin['email'] == $data['email'] && $checkAdmin['password'] !== $data['password']) {
                    $data['error_password'] = "Le mot de passe est incorrect";
                    $thi-s>view('admin/index', $data);
                }
            }
        }else {
            $data['error_message'] = "S'il vous plaît remplir les champs";
            $this->view('admin/index', $data);
        }
    }
}