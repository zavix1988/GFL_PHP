<?php

class Controller
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View(TEMPLATE);

        if(isset($_POST['email']))
        {
            $this->model->setName($this->clean($_POST['name']));
            $this->model->setEmail($this->clean($_POST['email']));
            $this->model->setSubject($this->clean($_POST['subject']));
            $this->model->setText($this->clean($_POST['message']));
            $this->model->setUserIp($_SERVER['REMOTE_ADDR']);
            $this->pageSendMail();
        }
        else
        {
            $this->pageDefault();
        }

        $this->view->templateRender();
    }

    private function pageSendMail()
    {
        if($this->model->checkForm() === true)
        {
            $this->model->sendEmail();
        }
        $mArray = $this->model->getArray();
        $this->view->addToReplace($mArray);
    }

    private function pageDefault()
    {
       $mArray = $this->model->getArray();
       $this->view->addToReplace($mArray);
    }

    private function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        return $value;
    }
}
