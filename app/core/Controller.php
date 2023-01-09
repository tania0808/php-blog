<?php

class Controller
{
    public function model($model)
    {
        if (file_exists("../private/models/" . ucfirst($model) . ".php")) {
            require "../private/models/" . ucfirst($model) . ".php";
            return $model = new $model();
        }
        return false;
    }


    public function view($view, $data = [])
    {
        extract($data);
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            require_once '../app/views/404.view.php';
        }
    }

    public function redirect($link)
    {
        header("Location: " . ROOT . "/" . trim($link));
        die;
    }
}
