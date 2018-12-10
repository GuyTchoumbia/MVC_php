<?php
require_once 'core/DAO.class.php';
require_once 'Stagiaire_formateur.class.php';

class DAOStagiaire_formateur extends DAO {    
        
    public function find(Stagiaire $s){
        $sql = 'SELECT * FROM stagiaire_formateur WHERE id_stagiaire=:id';
        $param = ['id'=>$s->id];
        $statement = $this->executeRequest($sql, $param);
//        $statement = $this->cnx->prepare($sql);
//        $statement->execute(['id'=>$s->id]);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Stagiaire_formateur'); // <------- FETCH MODE TO CHECK either GROUP OR NAM
        $d = [];
        while ($sf = $statement->fetch()){
            $this->getFormateur($sf);
            $d[] = $sf;
                    }  
        return $d;
    }
        
    public function getFormateur(Stagiaire_formateur $sf){
        $DAOFormateur = new DAOFormateur($this->cnx);        
        $sf->formateur = $DAOFormateur->find($sf->id_formateur);    
    }
    
    public function insert(Stagiaire_formateur $sf){
        $sql = 'INSERT INTO stagiaire_formateur (id_stagiaire, id_formateur, date_debut, date_fin) VALUES (:stagiaire, :formateur, :debut, :fin)';
        $param = ['stagiaire'=>$sf->id_stagiaire, 'formateur'=>$sf->id_formateur, 'debut'=>$sf->date_debut, 'fin'=>$sf->date_fin];
        $this->executeRequest($sql, $param);
//        $statement = $this->cnx->prepare($sql);
//        $statement->execute(['stagiaire'=>$sf->id_stagiaire,
//                             'formateur'=>$sf->id_formateur,
//                             'debut'=>$sf->date_debut,
//                             'fin'=>$sf->date_fin]);        
    }
            
    public function delete($id){
        $sql = 'DELETE FROM stagiaire_formateur WHERE id_stagiaire=:id';
        $param = ['id'=>$id];
        $this->executeRequest($sql, $param);
//        $statement = $this->cnx->prepare($sql);
//        $statement->execute(['id'=>$id]);
    }
}
