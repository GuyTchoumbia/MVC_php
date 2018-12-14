<?php
require_once 'core/Controller.class.php';

class ControllerDelete extends Controller { 
    
    /*
     * recupere tous les stagiaires pour le render de la page delete
     */
    function index(){ 
        $stagiaire = ['tStagiaire' => $this->DAOStagiaire->findAll()];
        $this->merge($stagiaire);
        $this->render('delete');
    }
    
    /*
     * deletion du stagiaire
     */
    function delete(){                   
        foreach ($this->request->getData('post','id') as $id){
            $this->DAOStagiaire->delete($id);
        }
        $this->index();        
    }     
}
