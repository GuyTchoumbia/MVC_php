<?php

class Stagiaire_formateur {
    private $id_stagiaire;
    private $id_formateur;
    private $date_debut;
    private $date_fin;
    
    public function __construct ($stagiaire=0,$formateur=0,$debut='',$fin=''){
        $this->id_stagiaire=$stagiaire;
        $this->id_formateur=$formateur;
        $this->date_debut=$debut;
        $this->date_fin=$fin;
    }
    
    public function getDate_debut(){
        return $this->date_debut;
    }
    
    public function getDate_fin(){
        return $this->date_fin;
    }
    
    public function __get($name){        
        return $this->$name;
    }   
}
