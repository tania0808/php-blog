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
                $user_created = $user->where('email', $_POST['email']);
                $_SESSION["USER"] = $user_created[0];
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