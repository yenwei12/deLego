<?php
class ArController extends Controller
{
    private $title = "AR View | deLego";

    public function __construct()
    {
        parent::__construct();
        $this->view->title = $this->title;
    }

    public function indexAction()
    {
        $this->view->render('ar/index');
    }

    public function cameraAction()
    {
        $this->view->render('ar/camera');
    }
}
