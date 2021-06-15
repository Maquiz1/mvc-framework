<?php
    //load model and the view
    class Controller {
        public function model($model){
            //Require model file
            require_once '../app/models/' . $model . '.php';

            //Instantiate model
            return new $model();
        }

        public function view($view){
            //Load the view (check for the file)
            if (file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            }else{
                die("view does not exists.");
            }
        }
    }
?>