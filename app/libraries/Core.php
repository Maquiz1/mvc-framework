<?php

//CORE APP CLASS
class Core {

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){

        $url = $this->getUrl();

        //look in controller for first value and UCWORDS WILL CAPITALIZE FIRST LETTER
        if (file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
            //SET A NEW CONTROLLER
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        //require the controller
        require_once '../app/controllers/' .$this->currentController. '.php';
        $this->currentController = new $this->currentController;

        //Check second part of a the URL
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //GET PARAMETERS
        $this->params = $url ? array_values($url) : [];

        //Call a callback array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'] ,'/');  //Remove ending slass
            $url = filter_var($url, FILTER_SANITIZE_URL);   //REMOVE CHARACTERS TO URL
            $url = explode('/', $url); //put string to an array
            return $url;

        }
    }

}
?>

