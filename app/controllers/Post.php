<?php

class Post extends Controller
{
    public function index()
    {

        if (Auth::isLoggedIn()) {
            $this->view('post/single-post', [
            ]);
        } else {
            $this->redirect('login');
        }

    }

    public function edit($id)
    {
        $post = new Posts();
        $row = $post->where('post_id', $id)[0];

        $error = '';

        if(Auth::is_own_content($row)){
            if (isset($_POST['text'])) {
                if ($_FILES['image']['error']) {
                    echo "without image";
                    $post->update($id, 'post_id', $_POST);
                    $this->redirect('home');
                } else {
                    echo "with image";
                    $image = new ImageUpload($_FILES['image']);
                    if ($image->error === '') {
                        $_POST['image'] = $image->image_name;
                        show($_POST);
                        $post->update($id, 'post_id', $_POST);
                        $image->moveFile();
                        $this->redirect('home');
                    } else {
                        $error = $image->error;
                    }
                }
            }
        } else {
            $this->view('access_denied');
        }



        if (Auth::isLoggedIn()) {
            $this->view('post/edit-post', [
                'post'=>$row,
                'id'=>$id
            ]);
        } else {
            $this->redirect('login');
        }

    }

    public function delete($id){
        $post = new Posts();
        $row = $post->where('post_id', $id)[0];
        if(Auth::is_own_content($row)){
            $result = $post->delete('post_id', $id);
            unlink('./assets/' . $row->image);
            if(!$result){
                $this->redirect('home');
            } else {
                echo "Error !!!";
            }
        } else {
            $this->view('access_denied');
        }

    }
}