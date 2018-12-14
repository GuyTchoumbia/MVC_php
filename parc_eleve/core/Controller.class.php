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
    /*
     * accesseurs
     */    
    public function getData(){ return $this->data; }
    
    public function getConnection(){ return $this->cnx; }
    
    public function getRequest(){ return $this->request; }
    
    public function setRequest(Request $request){ $this->request = $request; }
    
    /*
     * cherche la methode definie par le parametre action de la requete,
     * et l'effectue si trouvée
     * sinon, renvoie exception
     */
    public function execute($action){
        if (method_exists($this, $action)){            
            $this->$action();         
        }
        else {
            $class = get_class($this);
            throw new Exception("Can't find method ".$action." in class ".$class);
        }
    }
    /*
     * utilisé pour stocker les differents resultSets des requetes sql
     */
    public function merge($d){ 
        $this->data = array_merge_recursive($this->data,$d);  
    }
    /*
     * un render tout ce qu'il y a de plus basique
     */ 
    function render($filename){ 
        extract($this->data);      
        ob_start();     
        require('views/'.$filename.'.php');        
        $content = ob_get_clean();  
        require('views/template.php');		    
    } 
    
    /*
     * utilisé par le contructeur pour precharger les modeles
     */
    function loadModel($name){             
        require_once('model/'.$name.'.php');              
        $this->$name = new $name($this->cnx);    
    } 
}
?>
    


