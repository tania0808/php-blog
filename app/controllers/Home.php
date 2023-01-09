<?php

class Home extends Controller
{
    public function index()
    {
        $user = new User();

        $users = $user->query('SELECT * FROM users');

        if (Auth::isLoggedIn()) {
            $this->view('home/index', [
                'users' => $users,
                'tab' => 'home'
            ]);
        } else {
            $this->redirect('login');
        }

    }
}