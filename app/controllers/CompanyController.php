<?php

class CompanyController extends Controller {


    public function __construct() {
        // instanciation du model
        $this->companyModel = $this->model('company');
        $this->session = new Session;
    }


    public function index() {
        $this->view('company/index');
    }


    // Got To Create Account For Company
    public function signUp() {
        $this->view('company/signUp');
    }


    // Create Account For Company
    public function createAccount() {
        $data = [
            'raison_sociale' => $_POST['raison_sociale'],
            'activite' => $_POST['activite'],
            'effectif' => $_POST['effectif'],
            'adresse_sociale' => $_POST['adresse_sociale'],
            'zip_code' => $_POST['zip_code'],
            'city' => $_POST['city'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'rc' => $_POST['rc'],
            'ice' => $_POST['ice'],
            'cnss' => $_POST['cnss'],
            'forme_juridique' => $_POST['forme_juridique'],
            'nom_dirigeant' => $_POST['nom_dirigeant'],
            'rib' => $_POST['rib'],
            'password' => $_POST['password'],
            'error_raison_sociale' => '',
            'error_activite' => '',
            'error_effectif' => '',
            'error_adresse_sociale' => '',
            'error_zip_code' => '',
            'error_city' => '',
            'error_phone' => '',
            'error_email' => '',
            'error_rc' => '',
            'error_ice' => '',
            'error_cnss' => '',
            'error_forme_juridique' => '',
            'error_nom_dirigeant' => '',
            'error_rib' => '',
            'error_password' => '',
            'error_message' => ''
        ];

        $message = "Remplir le champ s'il vous plaît";

        if (empty($data['raison_sociale'])) {
            $data['error_raison_sociale'] = $message;
        }
        if (empty($data['activite'])) {
            $data['error_activite'] = $message;
        }
        if (empty($data['effectif'])) {
            $data['error_effectif'] = $message;
        }
        if (empty($data['adresse_sociale'])) {
            $data['error_adresse_sociale'] = $message;
        }
        if (empty($data['zip_code'])) {
            $data['error_zip_code'] = $message;
        }
        if (empty($data['city'])) {
            $data['error_city'] = $message;
        }
        if (empty($data['phone'])) {
            $data['error_phone'] = $message;
        }
        if (empty($data['email'])) {
            $data['error_email'] = $message;
        }
        if (empty($data['rc'])) {
            $data['error_rc'] = $message;
        }
        if (empty($data['ice'])) {
            $data['error_ice'] = $message;
        }
        if (empty($data['cnss'])) {
            $data['error_cnss'] = $message;
        }
        if (empty($data['forme_juridique'])) {
            $data['error_forme_juridique'] = $message;
        }
        if (empty($data['nom_dirigeant'])) {
            $data['error_nom_dirigeant'] = $message;
        }
        if (empty($data['rib'])) {
            $data['error_rib'] = $message;
        }
        if (empty($data['password'])) {
            $data['error_password'] = $message;
        }

        // If All Inputs Are Not Empty
        if (!empty($data['raison_sociale']) && !empty($data['activite']) && !empty($data['effectif']) && !empty($data['adresse_sociale']) && !empty($data['zip_code']) && !empty($data['city']) && !empty($data['phone']) && !empty($data['email']) && !empty($data['rc']) && !empty($data['ice']) && !empty($data['cnss']) && !empty($data['forme_juridique']) && !empty($data['nom_dirigeant']) && !empty($data['rib']) && !empty($data['password'])) {

            $email = $this->companyModel->checkEmail($data);
            if (!$email) {
                $uppercase = preg_match('@[A-Z]@', $data['password']);
                $lowercase = preg_match('@[a-z]@', $data['password']);
                $number    = preg_match('@[0-9]@', $data['password']);
                $specialChars = preg_match('@[^\w]@', $data['password']);
                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
                    $data['error_message'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number and one special character";
                    $this->view('company/signUp', $data);
                }else {
                    $data['safePassword'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $insert = $this->companyModel->addCompany($data);
                    if ($insert) {
                        $this->view('company/index');
                    }else {
                        $data['error_message'] = 'Il y a un erreur';
                        $this->view('company/signUp', $data);
                    }
                }

            }else {
                $data['error_message'] = "Cette adresse email est déjà existe";
                $this->view('company/index', $data);
            }

        }else {
            $data['error_message'] = "S'il vous plaît remplir les champs c'est obligatoire";
            $this->view('company/signUp', $data);
        }
    }


    // Login Company
    public function loginCompany() {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'error_email' => '',
            'error_password' => '',
            'error_message' => ''
        ];
        

        if (empty($data['email'])) {
            $data['error_email'] = "Ecrir votre adresse email s'il vous plaît";
        }
        if (empty($data['password'])) {
            $data['error_password'] = "Ecrir votre adresse mot de passe s'il vous plaît";
        }

        if (empty($data['password']) && !empty($data['email'])) {

            $email = $this->companyModel->checkEmail($data);
            if ($email) {
                $data['existe_email'] = "L'adresse email est enregisté";
                $this->view('company/index', $data);
            }else {
                $data['error_email'] = "L'adresse email n'existe pas";
                $this->view('company/index', $data);
            }
        }

        if (!empty($data['email']) && !empty($data['password'])) {
            $email = $this->companyModel->checkEmail($data);
            if ($email) {
                $verifyPassword = $this->companyModel->checkCompanyPassword($data);
                
                if ($verifyPassword == 1) {
                    $company = $this->companyModel->getCompany($data);
                    $this->session->setSession('id_company',$company->id_company);
                    $this->session->setSession('email',$company->email);
                    header('Location: ' . URLROOT . '/CompanyController/homePage');
                }else {
                    $data['error_password'] = "Le mot de passe est incorrect";
                    $email = $this->companyModel->checkEmail($data);
                    $this->view('company/index', $data, $email);
                }
            }else {
                $data['error_email'] = "L'adresse email n'existe pas";
                $this->view('company/index', $data);
            }
        }else {
            $this->view('company/index', $data);
        }
    }


    // Go To Home Page
    public function homePage() {
        $id_company = $_SESSION['id_company'];

        $files = $this->companyModel->getFiles($id_company);
        if ($files) {
            $this->view('company/homePage', $files);
        }else {
            $data['error_message'] = "Il n'y a pas des informations";
            $this->view('company/homePage', $data);
        }
    }


    // Logout Company
    public function logoutCompany() {

        $this->session->unsetSession('id_company');
        $this->session->unsetSession('email');
        $this->view('company/index');
    }


    // Method For Download Files
    public function download() {
        $fileName = basename($_POST['file']);
        $filePath = "C:\\xampp\htdocs\larmoProject1\public\uploads\\" . $fileName;
        

        if (!empty($fileName) && file_exists($filePath)) {
            header("Cache-Control: public");
            header("Content-Description: FIle Transfer");
            header("Content-Disposition: attachement; filename=$fileName");
            header("Content-Type: application/zip");
            header("Content-Transfer-Emcoding: binary");
            
            readfile($filePath);
            exit;
        }else {
            echo "This file does not exist.";
        }
    }
    


}