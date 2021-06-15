<?php 

class Pages extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    // THIS METHOD CALLED AUTOMATIC IF NO PARAMETERS WITH INDEX [0]
    public function index(){
        $users = $this->userModel->getUsers();
        $data = [
            'user'  =>  $users,
        ];
        $this->view('pages/index', $data);
    }

    // THIS METHOD CALLED AUTOMATIC IF THERE IS PARAMETERS WITH INDEX [1]
    public function about(){
        $this->view('pages/about');
    }

    public function contact(){
        echo 'contact';
    }

}

