<?php

class Login extends Controller
{
    public function index()
    {
        //$user = $this->model('User');

        $user = new User();

        $users = $user->query('SELECT * FROM users');

        $this->view('login', [
            'users' => $users,
            'tab' => 'home'
        ]);
    }
}