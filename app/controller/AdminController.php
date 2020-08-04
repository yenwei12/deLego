<?php
class AdminController extends Controller
{
    private $title = "Admin | deLego";

    public function __construct()
    {
        parent::__construct();
        $logged = Session::get('loggedIn');
        $userRole = Session::get('userRole');

        if ($logged == false) {
            Session::destroy();
            header('location: ../login');
            exit();
        } else if ($userRole != 'admin') {
            header('location: ../error');
            exit();
        }

        $this->view->title = $this->title;
    }

    public function indexAction()
    {
        $this->view->render('admin/index');
    }

    public function logoutAction()
    {
        Session::destroy();
        header('location: ../login');
        exit();
    }

    public function viewAction()
    {
        $this->model->viewAll();
        $this->view->render('admin/view');
    }

    public function editAction($id = 0)
    {
        $this->model->viewOne($id);
        $this->view->render('admin/edit');
    }

    public function addAction()
    {
        $this->view->render('admin/add');
    }

    public function orderAction()
    {
        $this->model->getOrder();
        $this->view->render('admin/order');
    }

    public function addProductAction()
    {
        $this->model->add();
    }

    public function editProductAction()
    {
        $this->model->save();
    }

    public function updateOrderAction($id)
    {
        $this->model->updateOrder($id);
    }

    public function reportAction()
    {
        $this->view->render('admin/report');
    }
}
