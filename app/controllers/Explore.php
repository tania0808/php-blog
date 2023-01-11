<?php

class Explore extends Controller
{
    public function index()
    {

        $this->view('explore', [
            'user' => 'tania',
            'tab' => 'explore'
        ]);
    }
}