<?php

class UsersController extends Controller
{





    public function __construct()
    {
        //instanciation du model
        $this->userModel = $this->model('user');
    }
    


    public function index() {

        $this->view('users/index');
    }


    // Login Method
    public function login() {
        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
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

            $uploadFile = $this->uploadFiles($file);
            if ($uploadFile) {
                $this->userModel->addUser($data);
                $this->view('users/sign_upPart2');
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
    public function diplomas() {
        $data = [
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
        if (!empty($data['error_name_diploma'])) {
            $data['error_name_diploma'] = "Remplir le champ s'il vous plaît";
        }
        if (!empty($data['error_level'])) {
            $data['error_level'] = "Remplir le champ s'il vous plaît";
        }
        if (!empty($data['error_date_diploma'])) {
            $data['error_date_diploma'] = "Remplir le champ s'il vous plaît";
        }
        if (!empty($data['error_etablissement'])) {
            $data['error_etablissement'] = "Remplir le champ s'il vous plaît";
        }
        if (!empty($data['error_subject'])) {
            $data['error_subject'] = "Remplir le champ s'il vous plaît";
        }

        // Check If The Errors Are Empty For Complate The Methode Correctly
        if (!empty($data['name_diploma']) && !empty($data['level']) && !empty($data['date_diploma']) && !empty($data['etablissement']) && !empty($data['subject'])) {

            $result = $this->userModel->addDiploma($data);
            $this->view('users/sign_upPart2', $result);

        }else {
            $this->view('users/sign_upPart2', $data);
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