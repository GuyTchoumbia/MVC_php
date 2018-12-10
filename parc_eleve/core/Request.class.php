<?php

class Request {
    private $data;

    public function __construct(){  //on separe bien les donnes venant du get et du post pour faciliter le filtrage en aval
        $get = ['get' => $_GET];
        $this->clean($get);
        $post = ['post' => $_POST];
        $this->clean($post);
        $this->data = array_merge($get, $post);        
    } 
    
    public function getData(){
        switch (func_num_args()){
            case 0: 
                return $this->data;
                break;
            case 1: 
                $global=func_get_arg(0);
                if (isset($this->data[$global])){
                    return $this->data[$global];
                    break;
                }
                else
                    throw new Exception("no ".$global." sent/found");
            case 2: 
                $global = func_get_arg(0);
                $name = func_get_arg(1);
                if (isset($this->data[$global][$name]) and $this->data[$global][$name]!='')
                    return $this->data[$global][$name];
                else 
                    throw new Exception("can't find ".$name." in request");
                break;
        }       
    }  
    
    public function clean($array){  //recursive function that iterates over arrays to 'clean' their values
        foreach($array as $val){
            if (is_array($val))                
                $this->clean($val);            
            else  
                $val = htmlentities($val);    
        }
    }
    
    public function exists($name) { // celle la ne sert que au routeur
        return (isset($this->data['get'][$name]) && $this->data['get'][$name] != "");
    }
}
