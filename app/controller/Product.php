<?php
class Product extends Controller
{
    private $title = "Product | deLego";

    public function __construct()
    {
        parent::__construct();
        $this->view->title = $this->title;
    }

    public function indexAction()
    {
        $this->model->run();
        $this->view->render('Product/index');
    }

    public function buildingAction()
    {
        $this->view->title = 'Building | deLego';
        $this->model->select('building');
        $this->view->render('Product/index');
    }

    public function vehicleAction()
    {
        $this->view->title = 'Vehicle | deLego';
        $this->model->select('vehicle');
        $this->view->render('Product/index');
    }

    public function figurineAction()
    {
        $this->view->title = 'Figurine | deLego';
        $this->model->select('figurine');
        $this->view->render('Product/index');
    }
}
