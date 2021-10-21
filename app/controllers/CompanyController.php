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

        // If All Inputs Are Not Empty
        if (!empty($data['raison_sociale']) && !empty($data['activite']) && !empty($data['effectif']) && !empty($data['adresse_sociale']) && !empty($data['zip_code']) && !empty($data['city']) && !empty($data['phone']) && !empty($data['email']) && !empty($data['rc']) && !empty($data['ice']) && !empty($data['cnss']) && !empty($data['forme_juridique']) && !empty($data['nom_dirigeant']) && !empty($data['rib'])) {

            $email = $this->companyModel->checkEmail($data);
            if (!$email) {
                $insert = $this->companyModel->addCompany($data);
                if ($insert) {
                    $this->view('company/index');
                }else {
                    $data['error_message'] = 'Il y a un erreur';
                    $this->view('company/signUp', $data);
                }
            }else {
                $data['error_message'] = "Cette adresse email est déjà existe";
                $this->view('company/index', $data);
            }

        }else {
            $data['error_message'] = "S'il vous plaît remplir les champs c'est obligatoire";
            $this->view('company/signUp', $data);
        }

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
    }

}