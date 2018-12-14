<?php

/*
 * Entité Type_formation_formateur
 */

class Type_formation_formateur {
    private $id_type_formation;
    private $id_formateur;
    
    public function __construct($type='',$formateur=''){
        $this->id_type_formation = $type;
        $this->id_formateur = $formateur;
    }
    
    public function getId_Type_Formation(){
        return $this->id_type_formation;
    }
    
    public function getId_formateur(){
        return $this->id_formateur;
    }  
    
    public function __get($name){        
        return $this->$name;
    }   
}
