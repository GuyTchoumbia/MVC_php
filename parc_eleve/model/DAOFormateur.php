<?php
require_once 'core/DAO.class.php';
require_once 'Formateur.class.php';
require_once 'DAOSalle.php';
require_once 'DAOType_formation_formateur.php';
/*
 * DAO de l'entité formateur et ses requetes utilisées
 */

class DAOFormateur extends DAO {
    
    public function find($id){
        $sql = 'SELECT * FROM formateur WHERE id_formateur=:id';
        $param = ['id'=>$id];
        $statement = $this->executeRequest($sql,$param);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Formateur');
        $f = $statement->fetch();
        $this->getSalle($f);
        return $f;
    }
    
    public function findAll(){
        $sql = 'SELECT * from formateur';
        $statement = $this->executeRequest($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Formateur');
        $d = [];
        while ($f = $statement->fetch()){
            $this->getSalle($f);
            $this->getType_formation($f);
            $d[] = $f;            
        }
        return $d;
    }        
       
    public function getSalle(Formateur $f){
        $DAOSalle = new DAOSalle($this->cnx);
        $data = $DAOSalle->find($f->id_salle);
        $f->salle = $data->getLibelle();       
    }
    
    public function getType_formation(Formateur $f){
        $DAO = new DAOType_formation_formateur($this->cnx);        
        $f->type_formation = $DAO->find($f->id_formateur);
    }
}
    
    
