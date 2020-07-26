<?php
class Dashboard extends Controller
{
    private $title = "Dashboard | deLego";

    public function __construct()
    {
        parent::__construct();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ../login');
            exit();
        }
    }

    public function indexAction()
    {
        $this->model->getOrder();
        $this->view->title = $this->title;
        $this->view->render('dashboard/index');
    }

    public function logoutAction()
    {
        Session::destroy();
        header('location: ../login');
        exit();
    }

    public function gorderAction()
    {
    }
}
