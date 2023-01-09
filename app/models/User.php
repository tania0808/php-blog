<?php

class User extends Model
{
    public $table = 'users';

    public function validate($data, $id = '')
    {
        $this->errors = [];

        // check for username
        if (empty($data['user_name']) || !preg_match('/^[a-zA-Z ]+$/', $data['user_name'])) {
            $this->errors['user_name'] = 'Only letters and spaces allowed in username!';
        }

        // check for email
        if(!empty($data['email'])){
            $email = trim(htmlspecialchars($data['email']));
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            if(!$email) {
                $this->errors['email'] = 'Email is not valid !';
            }
        }

        // check if email exists
        if(trim($id) == ''){
            if($this->where('email', $data['email'])){
                $this->errors['email'] = 'That email is already in use!!!';
            }

        } else {
            if($this->query("select email from $this->table where email = :email && user_id != :id ", ['email'=>$data['email'], 'id'=>$id])){
                $this->errors['email'] = 'That email is already in use!';
            }
        }

        // check for password
        $password = $data['password'];

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $this->errors['password'] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }

        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }
}