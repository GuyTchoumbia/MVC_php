<?php
/*
 * Entité Salle
 */

class Salle {
    private $id_salle;
    private $libelle;
    
    public function __construct($id=0,$libelle=''){
        $this->id_salle=$id;
        $this->libelle=$libelle;
    }
    
    public function getId_Salle(){
        return $this->getId_salle;
    }
    
    public function getLibelle(){
        return $this->libelle;
    } 
    
    public function __get($name){        
        return $this->$name;
    }   
}
