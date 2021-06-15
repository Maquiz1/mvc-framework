<?php 

class Pages extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function index(){
        $users = $this->userModal->getUsers();
        $data = [
            'title' => 'Index Page Title',
            'name'  =>  $users
        ];
        $this->view('pages/index', $data);
    }


    public function about(){
        $this->view('pages/about');
    }

    public function contact(){
        echo 'contact';
    }

}

