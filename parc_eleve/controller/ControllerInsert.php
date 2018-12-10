<?php
require_once 'core/Controller.class.php';

class ControllerInsert extends Controller {
    
    function index(){
        $nation = ['tNation' => $this->DAONationalite->findAll()];
        $this->merge($nation);

        $type = ['tType' => $this->DAOType_formation->findAll()];
        $this->merge($type);

        $formateur = ['tFormateur' => $this->DAOFormateur->findAll()];
        $this->merge($formateur);
        
        $this->render('insert');
    }
    
    function insert(){
        extract($this->request->getData('post'));
        $stagiaire = new Stagiaire(uniqid(),$nom,$prenom,$nationalite,$type_formation); 
        if ($this->DAOStagiaire->find($stagiaire))
            throw new Exception("Stagiaire deja existant");
        else {
            $this->DAOStagiaire->insert($stagiaire);   
            foreach ($formateur as $form){
                if (isset($form['id_formateur'])){
                    $stagiaire_formateur = new Stagiaire_formateur($stagiaire->id, $form['id_formateur'], $form['date_debut'], $form['date_fin']); 
                    $this->DAOStagiaire_formateur->insert($stagiaire_formateur);
                }                                    
            }
            $this->index();
        }
    }    
       
}
