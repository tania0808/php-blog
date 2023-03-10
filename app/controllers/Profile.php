<?php

class Profile extends Controller
{
    public function index($id)
    {
        $user = new Users();
        $post = new Posts();
        $posts = $post->where('user_id', $id);
        $posts = (array) $posts;

        foreach ($posts as $post){
            $post->user = $user->where('user_id', $post->user_id)[0];
        }

        if (Auth::isLoggedIn()) {
            $this->view('profile/user-profile', [
                'posts'=>$posts,
                'currentUser'=>$user->where('user_id', $id)[0]
            ]);
        } else {
            $this->redirect('login');
        }
    }
}