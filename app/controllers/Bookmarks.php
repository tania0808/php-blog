<?php

class Bookmarks extends Controller
{
    public function index()
    {
        $user = $this->model('Users');

        $this->view('bookmarks', [
            'user' => 'tania',
            'tab' => 'bookmarks'
        ]);
    }
}