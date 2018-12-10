<?php

require_once 'model/Connection.class.php';

abstract class Controller {
    protected $data = []; 
    protected static $models = ['DAOFormateur','DAONationalite','DAOSalle','DAOStagiaire','DAOStagiaire_formateur','DAOType_formation'];
    protected $cnx; 
    protected $request;

    public function __construct(){  
        $this->cnx = singleton::getInstance()->getConnection();
        if(isset(self::$models)){   
            foreach (self::$models as $model){ 
                $this->loadModel($model);     
            }         
        }
    } 
        
    public function getData(){
        return $this->data;
    }
    
    public function getConnection(){
        return $this->cnx;
    }
    
    public function getRequest(){
        return $this->request;
    }
    
    public function setRequest(Request $request){
        $this->request = $request;
    }
    
    public function execute($action){
        if (method_exists($this, $action)){            
            $this->$action();         
        }
        else {
            $class = get_class($this);
            throw new Exception("Can't find method ".$action." in class ".$class);
        }
    }

    public function merge($d){ 
        $this->data = array_merge_recursive($this->data,$d);  //fusionne les tableaux $this->vars et $d  
    }
     
    function render($filename){ 
        extract($this->data);      
        ob_start();     
        require('views/'.$filename.'.php');        
        $content = ob_get_clean();  
        require('views/template.php');		    
    } 

    function loadModel($name){             
        require_once('model/'.$name.'.php');              
        $this->$name = new $name($this->cnx);    
    } 
}
?>
    


