<?php
/*
 * Entité stagiaire
 */

class Stagiaire {
    private $id;
    private $nom;
    private $prenom;
    private $id_nationalite;
    private $id_type_formation;
    
    public function __construct($id=0,$nom='',$prenom='',$id_nationalite=1,$id_type_formation=1){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_nationalite = $id_nationalite;
        $this->id_type_formation = $id_type_formation;
    }
    
    public function getId_nationalite(){
        return $this->id_nationalite;
    }
    
    public function getId_type_formation(){
        return $this->id_type_formation;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function getPrenom(){
        return $this->prenom;
    }   
    
    public function __get($name){        
        return $this->$name;
    }   
}

