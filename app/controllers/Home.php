<?php

class Home extends Controller
{
    public function index()
    {
        $user = new Users();
        $post = new Posts();
        $posts = $post->query('SELECT * FROM posts order by id desc');
        //$posts = (array) $posts;

        if(is_array($posts)){
            foreach ($posts as $post){
                $post->user = $user->where('user_id', $post->user_id)[0];
            }
        } else {
            $posts = [];
        }
        $error = '';

        if(isset($_POST['text'])){
            $post = new Posts();
            if($_FILES['image']['error']){
                $_POST['user_id'] = $_SESSION['USER']->user_id;
                $_POST['post_id'] = generateRandomString();
                $post->insert($_POST);
                $this->redirect('home');
            } else {
                $image = new ImageUpload($_FILES['image']);
                if($image->error === ''){
                    $_POST['image'] = $image->image_name;
                    $_POST['user_id'] = $_SESSION['USER']->user_id;
                    $_POST['post_id'] = generateRandomString();
                    $post->insert($_POST);
                    $image->moveFile();
                    $this->redirect('home');
                } else {
                    $error = $image->error;
                }
            }



        }

        if (Auth::isLoggedIn()) {
            $this->view('home/index', [
                'posts' => $posts,
                'tab' => 'home',
                'error'=>$error,
            ]);
        } else {
            $this->redirect('login');
        }

    }

}