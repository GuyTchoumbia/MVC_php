<?php
require_once 'core/DAO.class.php';
require_once 'Nationalite.class.php';

class DAONationalite extends DAO {
    
    public function find($id) : Nationalite {
        $sql = 'SELECT * FROM nationalite WHERE id_nationalite=:id';
        $param = ['id'=>$id];
        $statement = $this->executeRequest($sql,$param);
//        $statement = $this->cnx->prepare($sql);
//        $statement->execute(['id'=>$id]);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        return $statement->fetch();      
    }
    
    public function findAll(){
        $sql = 'SELECT * FROM nationalite';
        $statement = $this->executeRequest($sql);
//        $statement = $this->cnx->query($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Nationalite');
        return $statement->fetchAll();
    }        
}
