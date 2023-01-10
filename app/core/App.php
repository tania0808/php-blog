<?php

class App
{
    // default controller, method and params we run
    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if ($url) {
            if (file_exists('../app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }
        }

        require_once('../app/controllers/' . $this->controller . '.php');

        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = ucfirst($url[1]);
                unset($url[1]);
            }
        }
        $url = array_values($url);
        $this->params = $url;

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // this will give different paths of the url
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}