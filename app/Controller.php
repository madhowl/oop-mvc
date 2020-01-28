<?php


namespace App;
use App\Model;
use App\View;

class Controller
{
    public $name;
    public $Model;
    public $View;
    public $out = array();

    public function __construct()
    {
        $this->setName('Controller');
        $this->Model = new Model('Model');
        $this->View = new View('View');
    }

    public function getName()
    {
        echo $this->name.'<br>';
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function allNews()
    {
       $this->out= $this->Model->getAllNews ();
       $this->View->allNews ($this->out);

    }
    public function singleNews($id)
    {
       $this->out = $this->Model->getOneNews ($id);
       $this->View->oneNews ($this->out);
    }
}