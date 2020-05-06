<?php
require_once 'models/university.model.php';
require_once 'views/university.view.php';

class UniversityController
{

    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new UniversityModel();
        $this->view = new UniversityView();
    }

    public function showMain()
    {
        //pido las carreras al modelo
        $career = $this->model->getCareer();
        //actualiza la vista
        $this->view->showCareer($career);
    }

    public function showCareer($id_carrera)
    {
        //obtengo info de mat y carrera
        $subject = $this->model->getSubjects($id_carrera);
        $career = $this->model->getCareerById($id_carrera);
        //lo mando al view
        $this->view->showSubjects($subject, $career);
    }

    public function showCareer3()
    {
        //obtengo info de mat y carrera
        $career3 = $this->model->getcareer3();
        //lo mando al view
        $this->view->showCareer3($career3);
    }

}
