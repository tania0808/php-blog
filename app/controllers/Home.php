<?php

class Home extends Controller
{
    public function index()
    {
        //$user = $this->model('User');

        $user = new User();

        $users = $user->query('SELECT * FROM users');

        $this->view('home/index', [
            'users' => $users,
            'tab' => 'home'
        ]);
    }
}