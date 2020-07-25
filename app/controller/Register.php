<?php
class Register extends Controller
{
    private $title = "Register | deLego";

    public function indexAction()
    {
        $this->view->title = $this->title;
        $this->view->render('Register/index');
    }

    public function runAction()
    {
        $this->model->run();
    }
}
