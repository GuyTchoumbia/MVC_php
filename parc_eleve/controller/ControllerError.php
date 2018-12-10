<?php

class ControllerError extends Controller {    
    
    public function __contruct($e){
        $this->merge(['msg'=>$e]);
        $this->render('error');
    }        
}