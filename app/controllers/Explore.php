<?php

class Explore extends Controller
{
    public function index()
    {
        $user = $this->model('User');
        $user->name = 'Tania';

        $this->view('home/index', [
            'user' => 'tania',
            'tab' => 'explore'
        ]);
    }
}