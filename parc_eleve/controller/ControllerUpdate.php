<?php
require_once 'core/Controller.class.php';

class ControllerUpdate extends Controller {
    
    // gets the necessary data to render the default update view, then renders it. 
    function index(){
        $stagiaire = ['tStagiaire' => $this->DAOStagiaire->findAll()];
        $this->merge($stagiaire);

        $nation = ['tNation' => $this->DAONationalite->findAll()];
        $this->merge($nation);

        $type = ['tType' => $this->DAOType_formation->findAll()];
        $this->merge($type);

        $formateur = ['tFormateur' => $this->DAOFormateur->findAll()];
        $this->merge($formateur);        
        
        $this->render('update');
    }
    
    /* necessary treatments of an update: 
     * creates a new Stagiaire instance from the request POST data,
     * then updates the ddb according to checked boxes and options
     * finally, redirects to the menu/index
     */ 
    function update(){
        extract($this->request->getData());         
        foreach ($post as $id => $stagiaire){         
            if (isset($stagiaire['true'])){
                $s = new Stagiaire($id,$stagiaire['nom'],$stagiaire['prenom'],$stagiaire['id_nationalite'],$stagiaire['id_type_formation']);
                $this->DAOStagiaire->update($s);  
                
                //delete tous les formateurs associés au stagiaire, avant de les rerajouter, pour eviter les entrées obsolete
                $this->DAOStagiaire_formateur->delete($s->getId());
                if (isset($stagiaire['formateur'])){
                    foreach ($stagiaire['formateur'] as $id_formateur => $formateur){                    
                        if (isset($formateur['id_type_formation']) && $formateur['id_type_formation']==$stagiaire['id_type_formation']){                    
                            $sf = new Stagiaire_formateur($id, $id_formateur, $formateur['date_debut'], $formateur['date_fin']);                    
                            $this->DAOStagiaire_formateur->insert($sf);
                        }
                    }
                }               
            }
        }
        $this->index();         
    }      
}


