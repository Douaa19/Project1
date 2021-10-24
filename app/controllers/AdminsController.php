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
                    $offres = $this->adminModel->getOffres();
                    $this->view('admin/offres', $offres);
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
            $this->view('admin/dashboard', $data);
        }
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
            'required_profile' => $_POST['required_profile'],
            'diploma_formation' => $_POST['diploma_formation'],
            'required_qualitie' => $_POST['required_qualitie'],
            'place_activity' => $_POST['place_activity'],
            'error_message' => ''
        ];

        if (!empty($data['title']) || !empty($data['date']) || !empty($data['city']) || !empty($data['type_contrat']) || !empty($data['poste']) || !empty($data['mission']) || !empty($data['profil']) || !empty($data['experience']) || !empty($data['required_profile']) || !empty($data['diploma_formation']) || !empty($data['required_qualitie']) || !empty($data['place_activity'])) {
            $insert = $this->adminModel->addOffre($data);
            if ($insert) {
                header('Location: ' . URLROOT . '/AdminsController/getOffres');
            }else {
                $data['error_message'] = "Il y a un error au niveau de la requette";
                $this->view('admin/addOffre', $data);
            }
        }else {
            $data['error'] = 'Il faut remplire tout les champs';
            $this->view('admin/addOffre', $data);
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


    // Go To Add More Information For One Specific User
    public function addMore() {
        $id_user = $_POST['id_user'];
        $this->view('admin/addMore', $id_user);
    }


    // Add More Informations For One User
    public function addMoreInfos() {
        $data = [
            'id_user' => $_POST['id_user'],
            'offre_emploi' => $_POST['offre_emploi'],
            'cnss' => $_POST['cnss'],
            'certificate' => $_POST['certificate'],
            'illness_records' => $_POST['illness_records'],
            'illness_records' => $_POST['illness_records']
        ];
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }


    // Go To View More Informations For One Specific User
    public function viewMore() {
        $id_user = $_POST['id_user'];

        // $moreInfos = $this->adminModel->getMoteInfos($id_user);
        // if ($moreInfos) {
            $this->view('admin/viewMore', $id_user);
        // }
    }


    // Go To The Dashboard Of Companys
    public function companys() {
        $companys = $this->adminModel->getCompanys();
        if ($companys) {
            $this->view('admin/companys', $companys);
        }else {
            $data['error_message'] = "Data empty!";
            $this->view('admin/companys', $data);
        }
    }


    // Go To Another Page For Adding More Informations For Company
    public function addMoreInfosCompany() {
        $id_company = $_POST['id_company'];
        $this->view('admin/addMoreForCompany', $id_company);
    }


    // Add More Informations Method For Company
    public function insertMoreInfosCompany() {
        $contract = $_FILES['contract'];
        $contract_salarie = $_FILES['contract_salarie'];
        $facture = $_FILES['facture'];
        $liste_personnel = $_FILES['liste_personnel'];
        $data = [
            'contract' => $_FILES['contract']['name'],
            'contract_salarie' => $_FILES['contract_salarie']['name'],
            'facture' => $_FILES['facture']['name'],
            'liste_personnel' => $_FILES['liste_personnel']['name'],
            'id_company' => $_POST['id_company'],
            'error_message' => '',
        ];

        if (empty($data['contract'])) {
            $data['error_contract'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['contract_salarie'])) {
            $data['error_contract_salarie'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['facture'])) {
            $data['error_facture'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['liste_personnel'])) {
            $data['error_liste_personnel'] = "Remplir le champ s'il vous plaît";
        }

        if (!empty($data['contract']) && !empty($data['contract_salarie']) && !empty($data['facture']) && !empty($data['liste_personnel'])) {
            // Uploading All Files With The Method UloadFiles
            $uploadContract = $this->uploadFileContract($contract);
            $uploadContract_salarie = $this->uploadContract_salarie($contract_salarie);
            $uploadFacture = $this->uploadFacture($facture);
            $uploadListe_personnel = $this->uploadListe_personnel($liste_personnel);

            if ($uploadContract && $uploadContract_salarie && $uploadFacture && $uploadListe_personnel) {
                $insert = $this->adminModel->insertInforForCompany($data);
                if ($insert) {
                    echo true;
                }
            }
        }else {
            $data['error_message'] = "S'il vous plaît remplir les champs c'est obligatoire";
            $this->view('admin/addMoreForCompany', $data);
        }
    }


    // Method For Uploading File Contact
    public function uploadFileContract($contract) {
        $contractName = $_FILES['contract']['name'];
        $contractTmpName = $_FILES['contract']['tmp_name'];
        $contractSize = $_FILES['contract']['size'];
        $contractError = $_FILES['contract']['error'];
        $contractType = $_FILES['contract']['type'];

        $contractExt= explode('.', $contractName);
        $contractActualExt = strtolower(end($contractExt));
        
        $allowed = array('doc','docx','pdf');

        if (in_array($contractActualExt, $allowed)) {
            if ($contractError === 0) {
                if ($contractSize < 100000000) {
                    $contractNameNew = uniqid($contractExt[0], true).".".$contractActualExt;
                    $contractDestination = "C:\\xampp\htdocs\larmoProject1\public\uploads\\".$contractNameNew;

                    if (file_exists($contractDestination . $contractTmpName)) {
                        echo "This file is allredy exists";
                    }else {
                        move_uploaded_file($contractTmpName, $contractDestination);
                        return true;
                    }
                }else {
                    echo "Your file is to big";
                }
            }else {
                echo "There was an error uploading your file";
            }
        }else {
            echo "You cannot upload files of this type";
        }
    }


    // Method For Uploading File Contact Salarie
    public function uploadContract_salarie($contract_salarie) {
        $contract_salarieName = $_FILES['contract_salarie']['name'];
        $contract_salarieTmpName = $_FILES['contract_salarie']['tmp_name'];
        $contract_salarieSize = $_FILES['contract_salarie']['size'];
        $contract_salarieError = $_FILES['contract_salarie']['error'];
        $contract_salarieType = $_FILES['contract_salarie']['type'];

        $contract_salarieExt= explode('.', $contract_salarieName);
        $contract_salarieActualExt = strtolower(end($contract_salarieExt));
        
        $allowed = array('doc','docx','pdf');

        if (in_array($contract_salarieActualExt, $allowed)) {
            if ($contract_salarieError === 0) {
                if ($contract_salarieSize < 100000000) {
                    $contract_salarieNameNew = uniqid($contract_salarieExt[0], true).".".$contract_salarieActualExt;
                    $contract_salarieDestination = "C:\\xampp\htdocs\larmoProject1\public\uploads\\".$contract_salarieNameNew;

                    if (file_exists($contract_salarieDestination . $contract_salarieTmpName)) {
                        echo "This file is allredy exists";
                    }else {
                        move_uploaded_file($contract_salarieTmpName, $contract_salarieDestination);
                        return true;
                    }
                }else {
                    echo "Your file is to big";
                }
            }else {
                echo "There was an error uploading your file";
            }
        }else {
            echo "You cannot upload files of this type";
        }
    }


    // Method For Uploading File Contact
    public function uploadFacture($facture) {
        $factureName = $_FILES['facture']['name'];
        $factureTmpName = $_FILES['facture']['tmp_name'];
        $factureSize = $_FILES['facture']['size'];
        $factureError = $_FILES['facture']['error'];
        $factureType = $_FILES['facture']['type'];

        $factureExt= explode('.', $factureName);
        $factureActualExt = strtolower(end($factureExt));
        
        $allowed = array('doc','docx','pdf');

        if (in_array($factureActualExt, $allowed)) {
            if ($factureError === 0) {
                if ($factureSize < 100000000) {
                    $factureNameNew = uniqid($factureExt[0], true).".".$factureActualExt;
                    $factureDestination = "C:\\xampp\htdocs\larmoProject1\public\uploads\\".$factureNameNew;

                    if (file_exists($factureDestination . $factureTmpName)) {
                        echo "This file is allredy exists";
                    }else {
                        move_uploaded_file($factureTmpName, $factureDestination);
                        return true;
                    }
                }else {
                    echo "Your file is to big";
                }
            }else {
                echo "There was an error uploading your file";
            }
        }else {
            echo "You cannot upload files of this type";
        }
    }


    // Method For Uploading File Contact
    public function uploadListe_personnel($liste_personnel) {
        $liste_personnelName = $_FILES['liste_personnel']['name'];
        $liste_personnelTmpName = $_FILES['liste_personnel']['tmp_name'];
        $liste_personnelSize = $_FILES['liste_personnel']['size'];
        $liste_personnelError = $_FILES['liste_personnel']['error'];
        $liste_personnelType = $_FILES['liste_personnel']['type'];

        $liste_personnelExt= explode('.', $liste_personnelName);
        $liste_personnelActualExt = strtolower(end($liste_personnelExt));
        
        $allowed = array('doc','docx','pdf');

        if (in_array($liste_personnelActualExt, $allowed)) {
            if ($liste_personnelError === 0) {
                if ($liste_personnelSize < 100000000) {
                    $liste_personnelNameNew = uniqid($liste_personnelExt[0], true).".".$liste_personnelActualExt;
                    $liste_personnelDestination = "C:\\xampp\htdocs\larmoProject1\public\uploads\\".$liste_personnelNameNew;

                    if (file_exists($liste_personnelDestination . $liste_personnelTmpName)) {
                        echo "This file is allredy exists";
                    }else {
                        move_uploaded_file($liste_personnelTmpName, $liste_personnelDestination);
                        return true;
                    }
                }else {
                    echo "Your file is to big";
                }
            }else {
                echo "There was an error uploading your file";
            }
        }else {
            echo "You cannot upload files of this type";
        }
    }





































}