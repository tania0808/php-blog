<?php

class Login extends Controller
{
    public function index()
    {
        $errors = [];
        $user = new User();
        if (count($_POST) > 0) {
            $user_exists = $user->where('email', $_POST['email']);
            if ($user_exists) {
                $decrypted_pwd = password_verify($_POST['password'], $user_exists[0]->password);
                if ($decrypted_pwd) {
                    echo "good pwd";
                    $_SESSION["USER"] = $user_exists[0];
                    $this->redirect('home');
                } else {
                    $errors['password'] = 'Bad credentials !';
                }
            } else {
                $errors['password'] = 'Bad credentials !';
            }
        }

        if (!Auth::isLoggedIn()) {
            $this->view('login', [
                'errors' => $errors,
                'data' => $_POST
            ]);
        } else {
            $this->redirect('home');
        }

    }
}