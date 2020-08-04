<?php
class IndexController extends Controller
{
    private $title = "Explore | deLego";

    public function __construct()
    {
        parent::__construct();
        $this->view->title = $this->title;
    }

    public function indexAction()
    {
        $this->model->run();

        $this->view->render('index/index');
    }
}
