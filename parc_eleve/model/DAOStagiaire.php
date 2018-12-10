<?php
require_once 'core/DAO.class.php';
require_once 'Stagiaire.class.php';
require_once 'DAONationalite.php';
require_once 'DAOType_formation.php';
require_once 'DAOStagiaire_formateur.php';

class DAOStagiaire extends DAO {    
        
    public function find(Stagiaire $s){
        $sql = 'SELECT * FROM stagiaire WHERE nom=:nom AND prenom=:prenom AND id_nationalite=:nationalite';
        $param = ['nom'=>$s->nom, 'prenom'=>$s->prenom, 'nationalite'=>$s->id_nationalite];
        $statement = $this->executeRequest($sql, $param);
//        $statement = $this->cnx->prepare($sql);
//        $statement->execute(['nom'=>$s->nom,
//                             'prenom'=>$s->prenom,
//                             'nationalite'=>$s->id_nationalite]);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Stagiaire');
        return $statement->fetch(); 
    }
    
    public function update(Stagiaire $s) {
        $sql = 'UPDATE stagiaire SET nom=:nom, prenom=:prenom, id_nationalite=:nationalite, id_type_formation=:formation WHERE id=:id';
        $param = ['nom'=>$s->nom, 'prenom'=>$s->prenom, 'nationalite'=>$s->id_nationalite, 'formation'=>$s->id_type_formation, 'id'=>$s->id];
        $this->executeRequest($sql, $param);
//        $this->cnx->prepare($sql)->execute(['nom'=>$s->nom,
//                                            'prenom'=>$s->prenom,
//                                            'nationalite'=>$s->id_nationalite,
//                                            'formation'=>$s->id_type_formation,
//                                            'id'=>$s->id]);
    }
    
    public function insert(Stagiaire $s) : Stagiaire {
        $sql = 'INSERT INTO stagiaire (id, nom, prenom, id_nationalite, id_type_formation) VALUES (:id, :nom, :prenm, :nationalite, :formation)';
        $param = ['id'=>$s->id, 'nom'=>$s->nom, 'prenom'=>$s->prenom, 'nationalite'=>$s->id_nationalite, 'formation'=>$s->id_type_formation];
        $this->executeRequest($sql, $param);
//        $statement = $this->cnx->prepare($sql);
//        $test=$statement->execute(['id'=>$s->id,
//                                   'nom'=>$s->nom,
//                                   'prenom'=>$s->prenom,
//                                   'nationalite'=>$s->id_nationalite,
//                                   'formation'=>$s->id_type_formation]);          
        return $s;        
    }
    
    public function delete($id){
        $sql = 'DELETE FROM stagiaire WHERE id=:id';
        $param = ['id'=>$id];
        $this->executeRequest($sql, $param);        
//        $statement = $this->cnx->prepare($sql);
//        $statement->execute(['id'=>$id]);
        $this->deleteStagiaire_formateur($id);
        
    }
    
    public function findAll(){
        $sql = 'SELECT * from stagiaire';
        $statement = $this->executeRequest($sql);
//        $statement = $this->cnx->query($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Stagiaire');
        $d = [];
        while ($s = $statement->fetch()){
            $this->getType_Formation($s);
            $this->getNationalite($s);
            $this->getStagiaire_formateur($s);
            $d[] = $s;            
        }
        return $d;
    }        
    
    public function getType_formation(Stagiaire $s){
        $DAO = new DAOType_formation($this->cnx);
        $data = $DAO->find($s->id_type_formation);
        $s->type_formation = $data->getLibelle();
    }
    
    public function getNationalite(Stagiaire $s){
        $DAO = new DAONationalite($this->cnx);
        $data = $DAO->find($s->id_nationalite);
        $s->nationalite = $data->getLibelle();       
    } 
    
    public function getStagiaire_formateur(Stagiaire $s){
        $DAO = new DAOStagiaire_formateur($this->cnx);
        $s->stagiaire_formateur = $DAO->find($s);
    }   
    
    public function deleteStagiaire_formateur($id){
        $DAO = new DAOStagiaire_formateur($this->cnx);
        $DAO->delete($id);
    }
}
