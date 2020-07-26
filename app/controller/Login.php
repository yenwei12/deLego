<?php
class Login extends Controller
{
    private $title = "Login | deLego";

    public function indexAction()
    {
        $this->view->title = $this->title;
        $this->view->render('login/index');
    }

    public function runAction()
    {
        $this->model->run();
    }
}
