<?php
class Register extends Controller
{
    private $title = "Register | deLego";

    public function __construct()
    {
        parent::__construct();
        $this->view->title = $this->title;
    }

    public function indexAction()
    {
        $this->view->render('Register/index');
    }

    public function runAction()
    {
        $this->model->run();
    }
}
