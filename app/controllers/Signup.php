<?php

class SignUp extends Controller
{
    public function index()
    {

        $user = $this->model('User');
        $errors = [];

        //$users = $user->query('SELECT * FROM users');
        if(count($_POST) > 0){
            if($user->validate($_POST)){
                $_POST['user_id'] = generateRandomString();
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->insert($_POST);
                $_SESSION["USER"]=$_POST;
                $this->redirect('home');

            } else {
                $errors = $user->errors;
            }
        }
        $this->view('signup', [
            'errors'=>$errors,
            'data'=>$_POST
        ]);
    }
}