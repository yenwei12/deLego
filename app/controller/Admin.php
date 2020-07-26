<?php
class Admin extends Controller
{
    private $title = "Admin | deLego";

    public function __construct()
    {
        parent::__construct();
        $logged = Session::get('loggedIn');

        if ($logged == false) {
            Session::destroy();
            header('location: ../login');
            exit();
        }

        $this->view->title = $this->title;
    }

    public function indexAction()
    {
        $this->view->render('Admin/index');
    }

    public function logoutAction()
    {
        Session::destroy();
        header('location: ../login');
        exit();
    }

    public function viewAction()
    {
        $this->model->run();
        $this->view->render('Admin/view');
    }

    public function editAction()
    {
        $this->view->render('Admin/edit');
    }

    public function addAction()
    {
        $this->view->render('Admin/add');
    }

    public function orderAction()
    {
        $this->view->render('Admin/order');
    }
}
