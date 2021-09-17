<?php

class UsersController extends Controller
{





    public function __construct()
    {
        //instanciation du model
        $this->userModel = $this->model('user');
        $this->session = new Session;
    }
    


    public function index() {

        $this->view('users/index');
    }


    // Login Method
    public function login() {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'error_email' => '',
            'error_password' => '',
            'existe_email' => ''
        ];

        if (empty($data['email'])) {
            $data['error_email'] = "Ecrir votre adresse email s'il vous plaît";
        }
        if (empty($data['password'])) {
            $data['error_password'] = "Ecrir votre mot de passe s'il vous plaît";
        }

        if (empty($data['password']) && !empty($data['email'])) {

            $verify = $this->userModel->checkUserEmail($data);
            if ($verify->email === $data['email']) {
                $data['existe_email'] = "L'adresse email est enregisté";
                $this->view('users/index', $data);
            }else {

                $data['error_email'] = "L'address email n'existe pas";
                $this->view('users/index', $data);
            }
        }

        if (!empty($data['email']) && !empty($data['password'])) {
            $verifyEmail = $this->userModel->checkUserEmail($data);
            if ($verifyEmail->email == $data['email']) {
                $verifyPassword = $this->userModel->checkUserPassword($data);
                $checkMatchPassword = password_verify($data['password'], $verifyPassword->password);
                if ($checkMatchPassword == 1) {
                    echo "passwords are matches";
                }else {
                    echo "passwords are not matches";
                }
            }else {
                $data['error_email'] = "L'address email n'existe pas";
                $this->view('users/index', $data);
            }
        }
    }


    // Method for navigate To SignUp page And Take Too Getters Method One For Areas And The Seconde For Cities
    public function signUp() {
        $areas = $this->userModel->getArea();
        $cities = $this->userModel->getCities();
        $this->view('users/sign_up', $areas, $cities);
    }


    // Take The Data From The Form
    public function stepOneInsertUser() {
        $file = $_FILES['name_file'];
        $data = [
            'sexe' => $_POST['sexe'],
            'lName' => $_POST['lName'],
            'fName' => $_POST['fName'],
            'activity' => $_POST['activity'],
            'date_birth' => $_POST['date_birth'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'zip_code' => $_POST['zip_code'],
            'address' => $_POST['address'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'name_file' => $_FILES['name_file']['name'],
            'error_sexe' => '',
            'error_lName' => '',
            'error_fName' => '',
            'error_activity' => '',
            'error_date_birth' => '',
            'error_email' => '',
            'error_phone' => '',
            'error_zip_code' => '',
            'error_address' => '',
            'error_country' => '',
            'error_city' => '',
            'error_name_file' => '',
            'error_message' => ''
        ];


        // Prepare The Errors Where The Inputs Are Empty
        if ($data['sexe'] === 'null') {
            $data['error_sexe'] = "Choisir s'il vous plaît";
        }
        if (empty($data['lName'])) {
            $data['error_lName'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['fName'])) {
            $data['error_fName'] = "Remplir le champ s'il vous plaît";
        }
        if ($data['activity'] === 'null') {
            $data['error_activity'] = "Choisir s'il vous plaît";
        }
        if (empty($data['date_birth'])) {
            $data['error_date_birth'] = "Choisir un date s'il vous plaît";
        }
        if (empty($data['email'])) {
            $data['error_email'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['phone'])) {
            $data['error_phone'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['zip_code'])) {
            $data['error_zip_code'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['address'])) {
            $data['error_address'] = "Remplir le champ s'il vous plaît";
        }
        if ($data['country'] === 'null') {
            $data['error_country'] = "Choisir s'il vous plaît";
        }
        if ($data['city'] === 'null') {
            $data['error_city'] = "Remplir le champ s'il vous plaît";
        }
        if ($data['name_file'] === 'null') {
            $data['error_name_file'] = "Choisir un fichier le champ s'il vous plaît";
        }

        // If All The Inputs Are Not Empty
        if (empty($data['error_sexe']) && empty($data['error_lName']) && empty($data['error_fName']) && empty($data['error_activity']) && empty($data['error_date_birth']) && empty($data['error_email']) && empty($data['error_phone']) && empty($data['error_zip_code']) && empty($data['error_error_address']) && empty($data['error_country']) && empty($data['error_city']) && empty($data['error_name_file'])) {

            $user = $this->userModel->getUser($data);
            if (!$user) {
                $uploadFile = $this->uploadFiles($file);
                if ($uploadFile) {
                    // $addUser = $this->userModel->addUser($data);
                    if ($this->userModel->addUser($data)) {

                        $user = $this->userModel->getUser($data);
                        $this->session->setSession('id_user',$user->id_user);
                        $this->view('users/diplomas');
                        
                    }else {
                        $this->view('users/sign_up?Infos Does Not Inserted');
                    }
                }else {
                    $this->view('users/sign_up?The File Cannot Uploded');
                }
            }else {
                $data['error_message'] = "This user is allready exists";
                $this->view('users/sign_up', $data);
            }
            

        }else {
            $data['error_message'] = "S'il vous plaît remplir les champs c'est obligatoire";
            $this->view('users/sign_up', $data);

        }


    }


    // Method For Uploading Files
    public function uploadFiles($file) {
        $fileName = $_FILES['name_file']['name'];
        $fileTmpName = $_FILES['name_file']['tmp_name'];
        $fileSize = $_FILES['name_file']['size'];
        $fileError = $_FILES['name_file']['error'];
        $fileType = $_FILES['name_file']['type'];

        $fileExt= explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        // print_r($fileExt);
        // die();
        $allowed = array('doc','docx','pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000) {
                    $fileNameNew = uniqid($fileExt[0], true).".".$fileActualExt;
                    $fileDestination = "C:\\xampp\htdocs\larmoProject1\public\uploads\\".$fileNameNew;

                    if (file_exists($fileDestination . $fileTmpName)) {
                        echo "This file is allredy exists";
                    }else {
                        move_uploaded_file($fileTmpName, $fileDestination);
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


    // Method For Take The Informations From Diplomas Form
    public function addDiploma() {
        $data = [
            'id_user' => $_POST['id_user'],
            'name_diploma' => $_POST['name_diploma'],
            'level' => $_POST['level'],
            'date_diploma' => $_POST['date_diploma'],
            'etablissement' => $_POST['etablissement'],
            'subject' => $_POST['subject'],
            'error_name_diploma' => '',
            'error_level' => '',
            'error_date_diploma' => '',
            'error_etablissement' => '',
            'error_subject' => '',
            'error_message' => ''
        ];

        // Check The Inputs If Are Empty And Declare The Errors
        if (empty($data['name_diploma'])) {
            $data['error_name_diploma'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['level'])) {
            $data['error_level'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['date_diploma'])) {
            $data['error_date_diploma'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['etablissement'])) {
            $data['error_etablissement'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['subject'])) {
            $data['error_subject'] = "Remplir le champ s'il vous plaît";
        }


        // Check If The Errors Are Empty For Complate The Methode 
        if (!empty($data['name_diploma']) && !empty($data['level']) && !empty($data['date_diploma']) && !empty($data['etablissement']) && !empty($data['subject'])) {

            if($this->userModel->addDiploma($data)) {

                $diplomas = $this->userModel->getDiplomas($data);
                if ($diplomas) {
                    $data1 = ['data is here'];
                    $this->view('users/diplomas', $diplomas, $data1); 
                }
            }else {
                $data['error_message'] = 'Diploma Cannot Insert';
                $this->view('users/diplomas');
            }

            // header('Location:' . URLROOT . '/UsersController/diplomas');

        }else {
            $data['error_message'] = "You must fill up all the informations";
            $this->view('users/diplomas', $data);
        }
    }
    


    // Delete One Diploma
    public function deleteDiploma() {
        $data = [
            'id_diploma' => $_POST['id_diploma'],
            'id_user' => $_POST['id_user']
        ];

        $result = $this->userModel->deleteDiploma($data);
        if ($result) {
            $diplomas = $this->userModel->getDiplomas($data);
            if ($diplomas) {
                $data1 = ['data is here'];
                $this->view('users/diplomas', $diplomas, $data1); 
            }else {
                $data1 = [''];
                $this->view('users/diplomas');
            }
        }else {
            echo "Diploma cannot deleted";
            $this->view('users/diplomas');
        }
        
    }


    // Navigate To Expériences Page
    public function experiencesPage() {
        $this->view('users/experiencesPage');
    }

    
    // Add Experiences Method
    public function addExperience() {
        $data = [
            'id_user' => $_POST['id_user'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'company' => $_POST['company'],
            'type_contract' => $_POST['type_contract'],
            'function' => $_POST['function'],
            'area' => $_POST['area'],
            'details' => $_POST['details'],
            'error_start_date' => '',
            'error_start_date' => '',
            'error_company' => '',
            'error_type_contract' => '',
            'error_function' => '',
            'error_area' => '',
            'error_details' => ''
        ];

        if (empty($data['start_date'])) {
            $data['error_start_date'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['end_date'])) {
            $data['error_end_date'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['company'])) {
            $data['error_company'] = "Remplir le champ s'il vous plaît";
        }
        if ($data['type_contract'] === 'null') {
            $data['error_type_contract'] = "Sélectionez s'il vous plaît";
        }
        if (empty($data['function'])) {
            $data['error_function'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['area'])) {
            $data['error_area'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['details'])) {
            $data['error_details'] = "Remplir le champ s'il vous plaît";
        }

        if (empty($data['start_date']) || empty($data['end_date']) || empty($data['company']) || $data['type_contract'] === 'null' || empty($data['function']) || empty($data['area']) || empty($data['details'])) {
            $data['error_message'] = "You must fill up all the informations";
            $this->view('users/experiencesPage', $data);
        }

        if (!empty($data['start_date']) && !empty($data['end_date']) && !empty($data['company']) && $data['type_contract'] !== 'null' && !empty($data['function']) && !empty($data['area']) && !empty($data['details'])) {
            
            $addExperience = $this->userModel->addExperience($data);

            if ($addExperience) {
                $experiences = $this->userModel->getExperiences($data);
                if ($experiences) {
                    $data1 = ['data is here'];
                    $this->view('users/experiencesPage', $experiences, $data1); 
                }
                
            }else {
                $data['error_message'] = "Experience Cannot Insert";
                $this->view('users/experiencesPage', $data);
            }
        }
    }


    // Delete Experiece
    public function deleteExperience() {
        $data = [
            'id_experience' => $_POST['id_experience'],
            'id_user' => $_POST['id_user']
        ];

        $result = $this->userModel->deleteExperience($data);
        if ($result) {
            $experiences = $this->userModel->getExperiences($data);
            if ($experiences) {
                $data1 = ['data is here'];
                $this->view('users/experiencesPage', $experiences, $data1); 
            }else {
                $data1 = [''];
                $this->view('users/experiencesPage');
            }
        }else {
            echo "Experience cannot deleted";
            $this->view('users/experiencesPage');
        }
    }


    // Navigate To Languages Page
    public function languagesPage() {
        $this->view('users/languagesPage');
    }


    // Add New Language For User
    public function addLanguage() {
        $data = [
            'id_user' => $_POST['id_user'],
            'name_language' => $_POST['name_language'],
            'level' => $_POST['level'],
            'error_name_language' => '',
            'error_level' => '',
            'error_message' => ''
        ];

        if (empty($data['name_language'])) {
            $data['error_name_language'] = "Remplir le champ s'il vous plaît";
        }
        if (empty($data['level'])) {
            $data['error_level'] = "Remplir le champ s'il vous plaît";
        }

        if (empty($data['name_language']) || empty($data['level'])) {
            $data['error_message'] = "You must fill up all the informations";
            $this->view('users/languagesPage', $data);
        }

        if (!empty($data['name_language']) && !empty($data['level'])) {
            $addLanguage = $this->userModel->addLanguage($data);
            if ($addLanguage) {
                $languages = $this->userModel->getLanguages($data);
                if ($languages) {
                    $data1 = ['data is here'];
                    $this->view('users/LanguagesPage', $languages, $data1);
                }else{
                    $data1= [''];
                    $this->view('users/languagesPage', $data1);
                }
            }
        }

        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // die();
    }


    // Delete Language With Id_language
    public function deleteLanguage() {
        $data = [
            'id_language' => $_POST['id_language'],
            'id_user' => $_POST['id_user']
        ];

        $result = $this->userModel->deleteLanguage($data);
        if ($result) {
            $languages = $this->userModel->getLanguages($data);
            if ($languages) {
                $data1 = ['data id here'];
                $this->view('users/languagesPage', $languages, $data1);
            }else {
                $data1 = [''];
                $this->view('users/languagesPage', $data1);
            }
        }else {
            echo "Language cannot deleted";
            $this->view('users/languagesPage');
        }
    }


    // Navigate To Competences Page
    public function competencesPage() {
        $this->view('users/competencesPage');
    }


    // Add Competence
    public function addCompetence() {
        $data = [
            'id_user' => $_POST['id_user'],
            'name_competence' => $_POST['name_competence'],
            'error_name_competence' => ''
        ];

        if (empty($data['name_competence'])) {
            $data['error_message'] = "Replire le champ s'il vous plaît";
            $this->view('users/competencesPage', $data);
        }

        if (!empty($data['name_competence'])) {
            $addCompetence = $this->userModel->addCompetence($data);
            if ($addCompetence) {
                $competences = $this->userModel->getCompetences($data);
                if ($competences) {
                    $data1 = ['data is here'];
                    $this->view('users/competencesPage', $competences, $data1);
                }else{
                    $data1= [''];
                    $this->view('users/competencesPage', $data1);
                }
            }
        }
    }


    // Delete Competence 
    public function deleteCompetence() {
        $data = [
            'id_user' => $_POST['id_user'],
            'id_competence' => $_POST['id_competence']
        ];

        $result = $this->userModel->deleteCompetence($data);
        if ($result) {
            $competences = $this->userModel->getCompetences($data);
            if ($competences) {
                $data1 = ['data id here'];
                $this->view('users/competencesPage', $competences, $data1);
            }else {
                $data1 = [''];
                $this->view('users/competencesPage', $data1);
            }
        }else {
            echo "Language cannot deleted";
            $this->view('users/competencesPage');
        }
    }


    // Navigate To Page Create Email & Password
    public function infosLogin() {
        $data = ['id_user' => $_POST['id_user']];
        $email = $this->userModel->getEmail($data);
        $this->view('users/infosLogin', $email);
    }


    // Create Password For User
    public function completCreationUser() {
        $data = [
            'id_user' => $_POST['id_user'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'check' => $_POST['check_password'],
            'error_password' => '',
            'error_check' => '',
            'error_match' => '',
            'error_message' => ''
        ];

        if (empty($data['password'])) {
            $data['error_password'] = "Vous dever creer un mot de passe";
        }
        if (empty($data['check'])) {
            $data['error_check'] = "Vous dever creer un mot de passe";
        } 
        
        if (empty($data['password']) || empty($data['check'])) {
            $data['error_message'] = "You must fill up all the informations";
            $email = $this->userModel->checkUserEmail($data);
            $this->view('users/infosLogin', $email, $data);
        }

        if (!empty($data['email']) && !empty($data['password']) && !empty($data['check'])) {
            if ($data['password'] === $data['check']) {
                $uppercase = preg_match('@[A-Z]@', $data['password']);
                $lowercase = preg_match('@[a-z]@', $data['password']);
                $number    = preg_match('@[0-9]@', $data['password']);
                $specialChars = preg_match('@[^\w]@', $data['password']);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($data['password']) < 8) {
                    $data['error_message'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number and one special character";
                    $email = $this->userModel->checkUserEmail($data);
                    $this->view('users/infosLogin', $email, $data);
                }else {
                    $data['safePassword'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    $stm = $this->userModel->insertPassword($data);
                    if ($stm) {
                        $this->session->unsetSession('id_user');
                        $this->view('users/index');
                    }else {
                        $data['error_message'] = "Password cannot insert";
                        $email = $this->userModel->checkUserEmail($data);
                        $this->view('users/infosLogin', $data);
                    }
                }
            }else {
                $data['error_message'] = "The Password is not match";
                $email = $this->userModel->getEmail($data);
                $this->view('users/infosLogin', $data);
            }
        }else {
            $data['error_message'] = "You must fill up all the informations";
            $email = $this->userModel->checkUserEmail($data);
            $this->view('users/infosLogin', $email, $data);
        }
    }





































    // Login method
    // public function login() {

    //     if(isset($_POST['submit_login'])) {

    //         $data = [
    //             'email' => $_POST['email'],
    //             'password' => $_POST['password'],
    //             'email_error' => '',
    //             'password_error' => ''
    //         ];

    //         if (empty($data['email'])) {
    //             $data['email_error'] = '*Saisir votre email*';
    //         }

    //         if (empty($data['password'])) {
    //             $data['password_error'] = '*Saisir votre password*';
    //         }

    //         if(!empty($data['email']) && !empty($data['password'])) {

    //             $result = $this->adminModel->getAdmin($data);

    //             if ($result === false) {
    //                 $this->view('admin/index');
    //             }else {
    //                 $email = $data['email'];
    //                 $password = $data['password'];
    //                 $dbEmail = $result->email;
    //                 $dbPassword = $result->password;
    //                 if ($email === $dbEmail && $password === $dbPassword) {
    //                     $this->createSession($result);
    //                 }
    //             }

                
    //         }

    //         $this->view('admin/index', $data);

    //     }else {
    //         $this->view('admin/index');
    //     }

    // }

    // // Create session for login
    // public function createSession($admin) {
    //     // session_start();
    //     $_SESSION['id'] = $admin->id;
    //     $_SESSION['name'] = $admin->name;
    //     $_SESSION['email'] = $admin->email;
    //     $_SESSION['password'] = $admin->password;

    //     header('Location: ' . URLROOT . '/PostController/index');

    // }

    // // Kill session for logout
    // public function killSession() {

    //     unset($_SESSION['id']);
    //     unset($_SESSION['name']);
    //     unset($_SESSION['email']);
    //     unset($_SESSION['password']);
    //     session_destroy();

    //     header('Location: ' . URLROOT . '/AdminController/index');
    // }

    // // Serch method
    // public function search() {
    //     if (isset($_POST['submit_search'])) {
    //         if (!empty($_POST['name'])) {
                
    //             $data = [
    //                 'name' => $_POST['name'],
    //                 'error_search' => ''
    //             ];

    //             $result = $this->adminModel->search($data);

    //             if ($result) {
    //                 $this->view('admin/result', $result);
    //             }else {
    //                 $data = [
    //                     'search' => '',
    //                     'error_search' => "Le resultat ne trouve pas"
    //                 ];
    //                 $this->view('admin/result', [], $data);
    //             }

    //         } else {
    //             header('Location: ' . URLROOT . '/PostController/index');
    //         }
    //     }
    // }

    

    // // GET CLIENTS 
    // public function dashClient() {
    //     $result = $this->adminModel->getClients();

    //     for ($i=0; $i > 0 ; $i++) { 
    //         $result[$i]->gender = explode(',', $result[$i]->gender);
    //         $result[$i]->occasion = explode(',', $result[$i]->occasion);
    //     }

    //     if ($result) {
    //         $this->view('admin/dash-client', $result);
    //     }else {
    //         return false;
    //     }
    // }

    
}
