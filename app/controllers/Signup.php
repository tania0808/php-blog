<?php

class SignUp extends Controller
{
    public function index()
    {
        //$user = $this->model('User');

        $user = new User();

        //$users = $user->query('SELECT * FROM users');

        $this->view('signup', [
        ]);
    }
}