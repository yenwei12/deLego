<?php
class UserController extends Controller
{
    private $title = "User | deLego";

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
        $this->model->getOrder();
        $this->view->render('user/index');
    }

    public function logoutAction()
    {
        Session::destroy();
        header('location: ../login');
        exit();
    }

    public function cartAction()
    {
        $this->view->render('user/cart');
    }

    public function checkoutAction()
    {
        $this->view->render('user/checkout');
    }

    public function updateAction()
    {
        $this->model->update();
    }

}
