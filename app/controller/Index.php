<?php
class Index extends Controller
{
    private $title = "Explore | deLego";

    public function indexAction()
    {
        $this->view->title = $this->title;
        $this->view->render('index/index');
    }
}
