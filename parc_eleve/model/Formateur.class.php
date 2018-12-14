<?php
/*
 * Entité Formateur
 */

class Formateur {
    private $id_formateur;
    private $nom;
    private $prenom;
    private $id_salle;

    public function __construct($id=0,$nom='',$prenom='',$salle=0){
        $this->id_formateur=$id;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->id_salle=$salle;
    }
    
    public function getId(){
        return $this->id_formateur;
    }
    
    public function __get($name){        
        return $this->$name;
    }   
}


