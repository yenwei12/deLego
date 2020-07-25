<?php

class Error404 extends Controller
{
    private $title = "Error | deLego";

    public function indexAction()
    {
        $this->view->message = "Page not found";
        $this->view->title = $this->title;
        $this->view->render('error/index');
    }
}
