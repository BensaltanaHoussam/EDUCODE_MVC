<?php 


class App
{

    private $controller = 'home';
    private $method = 'index';
    


    public function splitUrl()
    {
        $url = $_GET['url'] ?? 'home';
        $url = explode('/', $url);  
        return $url;
    }

    public function loadcontroller()
    {
        
        $url = $this->splitUrl();
        $filename = "../app/controller/" . ucfirst($url[0]) . ".php";

        if (file_exists(filename: $filename)) {
            require $filename;
            $this->controller = ucfirst($url[0]);
        } else {
            $filename = "../app/controller/_404.php";
            require $filename;
            $this->controller = '_404';
        }

        $controller = new $this->controller;
        call_user_func_array([$controller, $this->method], []);
    }
}



?>