<?php

class Explore extends Controller
{
    public function index()
    {
        $user = $this->model('User');

        $this->view('home/index', [
            'user' => 'tania',
            'tab' => 'explore'
        ]);
    }
}