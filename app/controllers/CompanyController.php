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
            'error_rc' => '',
            'error_ice' => '',
            'error_cnss' => '',
            'error_forme_juridique' => '',
            'error_nom_dirigeant' => '',
            'error_rib' => '',
            'error_message' => ''
        ];

        if (empty($data['raison_sociale'])) {
            $data['error_raison_sociale'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['activite'])) {
            $data['error_activite'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['effectif'])) {
            $data['error_effectif'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['adresse_sociale'])) {
            $data['error_adresse_sociale'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['zip_code'])) {
            $data['error_zip_code'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['city'])) {
            $data['error_city'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['phone'])) {
            $data['error_phone'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['rc'])) {
            $data['error_rc'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['ice'])) {
            $data['error_ice'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['cnss'])) {
            $data['error_cnss'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['forme_juridique'])) {
            $data['error_forme_juridique'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['nom_dirigeant'])) {
            $data['error_nom_dirigeant'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['rib'])) {
            $data['error_rib'] = "Remplir le champ s'il vous plaît";
        }

        // If All Inputs Are Not Empty
        if (!empty($data['raison_sociale']) && !empty($data['activite']) && !empty($data['effectif']) && !empty($data['adresse_sociale']) && !empty($data['zip_code']) && !empty($data['city']) && !empty($data['phone']) && !empty($data['rc']) && !empty($data['ice']) && !empty($data['cnss']) && !empty($data['forme_juridique']) && !empty($data['nom_dirigeant']) && !empty($data['rib'])) {
            
            $insert = $this->companyModel->addCompany($data);
            if ($insert) {
                $this->view('company/index');
            }else {
                $data['error_message'] = 'Il y a un erreur';
                $this->view('company/signUp', $data);
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