<?php
/*
 * Entité Type_Formation
 */

class Type_formation {
    private $id_type_formation;
    private $libelle;
    
    public function __construct($id=0,$libelle=''){
        $this->id_type_formation = $libelle;
        $this->libelle = $libelle;
    }
    
    public function getId_Type_Formation(){
        return $this->id_type_formation;
    }
    
    public function getLibelle(){
        return $this->libelle;
    }
    
    public function __get($name){        
        return $this->$name;
    }   
}
