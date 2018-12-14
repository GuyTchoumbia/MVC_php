<?php
/*
 * Entité Nationalite
 */

class Nationalite {
    protected $id_nationalite;
    protected $libelle;
    
    public function __construct($id=0,$libelle=''){
        $this->id_nationalite = $id;
        $this->libelle = $libelle;
    }
    
    public function getId(){
        return $this->id_nationalite;
    }
    
    public function getLibelle(){
        return $this->libelle;
    }
    
    public function __get($name){        
        return $this->$name;
    }   
}
