<?php

class Error404 extends Controller
{
    private $title = "Error | deLego";

    public function __construct()
    {
        parent::__construct();
        $this->view->title = $this->title;
    }

    public function indexAction()
    {
        $this->view->message = "Page not found";
        $this->view->render('Error/index');
    }
}
