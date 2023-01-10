<?php

class Settings extends Controller
{
    public function index($id)
    {
        if (Auth::isLoggedIn()) {
            $this->view('profile/profile-settings', [
                'id'=>$id
            ]);
        } else {
            $this->redirect('login');
        }
    }
}