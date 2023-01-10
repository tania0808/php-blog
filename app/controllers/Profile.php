<?php

class Profile extends Controller
{
    public function index($id)
    {
        $user = new User();
        $post = new Post();
        $posts = $post->where('user_id', $id);
        $posts = (array) $posts;
        foreach ($posts as $post){
            $post->user = $user->where('user_id', $post->user_id)[0];
        }

        if (Auth::isLoggedIn()) {
            $this->view('profile/user-profile', [
                'posts'=>$posts
            ]);
        } else {
            $this->redirect('login');
        }
    }
}