<?php

class Home extends Controller
{
    public function index()
    {
        $user = new User();
        $users = $user->query('SELECT * FROM users');
        $error = '';

        if(isset($_POST['text']) && isset($_FILES['image'])){
            $post = new Post();
            $image = new ImageUpload($_FILES['image']);

            if($image->error === ''){
                $_POST['image'] = $image->image_name;
                $_POST['user_id'] = $_SESSION['USER']->user_id;
                $post->insert($_POST);
                $image->moveFile();
                $this->redirect('home');
            } else {
                $error = $image->error;
            }
        }

        if (Auth::isLoggedIn()) {
            $this->view('home/index', [
                'users' => $users,
                'tab' => 'home',
                'error'=>$error,
            ]);
        } else {
            $this->redirect('login');
        }

    }
}