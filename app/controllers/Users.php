<?php

class Users extends Controller {

    public function __construct(){
        $this->userModel = $this->model('User');
    }
 
    public function register(){
        $data = [
            'username' => '',
            'email' => '',
            'passwor' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Remove special characters
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //remove white space
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'passwor' => trim($_POST['passwor']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            //REmove special characters from user name
            $nameValidation = '/^[a-zA-Z0-9]*$/';
            $paswordValidarion = '/^(.{0/7}|[^a-z]*|[^\d]*)$/i';

            //validate username on letters and numbers
            if(empty($data['username'])){
                $data['username'] = 'Please enter username';
            }elseif (!preg_match($nameValidation, $data['username'])){
                $data['usernamError'] = 'Name can only contain letters and numbers';
                
            }

            //validate email
            if(empty($data['email'])){
                $data['emailError'] = 'Please enter email';
            }elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $data['emailError'] = 'please enter the correct email';
                
            }else{
                //check if email exists
                if($this->userModal->findUserByEmail(data['email'])){
                    $data['emailError'] = 'Email is already registered';
                }
            }


            //Validate password on lenth and numeric values
            if(empty($data['password'])){
                $data['passwordError'] = 'Please enter password';
            }elseif(strlen($data['password'] < 6)){
                $dat['passwordError'] = 'Password must be atleast 6 characters';
            }elseif (!preg_match($passwordValidation, $data['password'])){
                $data['passwordError'] = 'Password must atleast one numeric value';
                
            }

            //validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password';
            }else {
                if($data['password'] != $data['confirmPassword']){
                    $data['passowrdError'] = 'Password do not match';
                }
            }


            //check if errors are empt
            if(empty($data['usernameError']) && empty($data['passwordError']) && 
                empty($data['confirmPassowrdError']) && empty($data['emailError'])){

                    //hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //REGISTER USER FORM MODAL FUNCTION
                    if($this->userModal->register($data)){
                        //redirect to the Loin pAGE  
                        header('location: ' . URLROOT . '/users/login');

                    }else{
                        die('Something went wrong');
                    }
                }


            
        }
        $this->view('users/register', $data);
    }

    public function login(){
        $data = [
            'title' => 'Login page',
            'usernameError' => '',
            'passwordError' => ''
        ];


        $this->view('users/login', $data);
    }
}

?>