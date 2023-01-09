<?php
require 'config.php';
require 'Controller.php';
require 'App.php';
require 'database.php';
require 'model.php';
require 'helpers.php';

spl_autoload_register(function ($class_name) {
    require "../app/models/" . ucfirst($class_name) . ".php";
});
