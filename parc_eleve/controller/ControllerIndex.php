<?php
 require_once 'core/Controller.class.php';

class ControllerIndex extends Controller{
    
    function index(){
        $this->render('index');
    }
}
