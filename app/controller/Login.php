<?php
class Login extends Controller
{
    private $title = "Login | deLego";

    public function __construct()
    {
        parent::__construct();
        $this->view->title = $this->title;
    }

    public function indexAction()
    {
        $this->view->render('login/index');
    }

    public function runAction()
    {
        $this->model->run();
    }
}
