<?php
require_once 'Controller.class.php';
require_once 'controller/ControllerError.php';
require_once 'Request.class.php';

class Router {
       
    public function __construct(){
        try {
            $request = new Request();
            $controller = $this->setController($request);
            $action = $this->setAction($request);
            $controller->execute($action); 
        }
        catch (Exception $e) {
            $this->damageControl($e);
        }
    }
    /*
     * met en place le controlleur spécifié par le parametre de la requete
     */
    public function setController(Request $request){
        $controller = "Index";
        if ($request->exists('controller'))
            $controller = ucfirst(strtolower($request->getData('get','controller')));
        $class = 'Controller'.$controller;
        $file = 'controller/'.$class.'.php';
        if (file_exists($file)){
            require_once $file;
            $controller = new $class();
            $controller->setRequest($request);
            return $controller;
        }
        else {
            throw new Exception("Can't find ".$file); 
        }
    }
    
    /*
     * met en place l'action de la requete, utilisé par le controlleur pour effectuer la bonne methode
     */
    public function setAction(Request $request){
        $action = 'index';
        if ($request->exists('action')){
            $action = $request->getData('get','action');                   
        }
        return $action; 
    } 
    
    //creee le controleur d'erreur, qui affiche le message d'erreur
    public function damageControl(Exception $e){
        $error = new ControllerError($e);        
    }
}
