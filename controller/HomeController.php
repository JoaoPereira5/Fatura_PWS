<?php
require_once './controller/BaseController.php';

class HomeController extends BaseController
{
    public function index(){
         $this->renderView('home/index');
    }
}