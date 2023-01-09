<?php

class SignUp extends Controller
{
    public function index()
    {
        $user = new User();
        $errors = [];

        if (count($_POST) > 0) {
            if ($user->validate($_POST)) {
                $_POST['user_id'] = generateRandomString();
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->insert($_POST);
                $_SESSION["USER"] = (object)$_POST;
                $this->redirect('home');
            } else {
                $errors = $user->errors;
            }
        }

        if (!Auth::isLoggedIn()) {
            $this->view('signup', [
                'errors' => $errors,
                'data' => $_POST
            ]);
        } else {
            $this->redirect('home');
        }

    }
}