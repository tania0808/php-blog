<?php

class Settings extends Controller
{
    public function index($id)
    {
        $user = new Users();
        $row = $user->where('user_id', $id)[0];
        $errors = [];

        if(isset($_POST['save-changes'])) {
            unset($_POST['save-changes']);
            if (isset($_POST['password']) && $_POST['password'] == '') {
                unset($_POST['password']);
            }

            if (isset($_POST['bio']) && $_POST['bio'] == '') {
                unset($_POST['bio']);
            }

            if (empty($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
                unset($_POST['image']);
                $user->update($id, 'user_id', $_POST);
                $this->redirect("settings/$id");
            } else {
                $image = new ImageUpload($_FILES['image']);
                $_POST['image'] = $image->image_name;
                $user->update($id, 'user_id', $_POST);
                $image->moveFile();
                $this->redirect("settings/$id");

            }
        }

        if (Auth::isLoggedIn()) {
            $this->view('profile/profile-settings', [
                'data'=>$row,
                'id'=>$id,
                'errors'=>$errors
            ]);
        } else {
            $this->redirect('login');
        }
    }

    public function resetImage($id)
    {
        $user = new Users();
        $row = $user->where('user_id', $id)[0];

        unlink('./assets/' . $row->image);

        $user->update($id, 'user_id', [
            'image' => 'user_female.jpg'
        ]);
    }
}