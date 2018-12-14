<?php
require_once 'core/DAO.class.php';
require_once 'Type_formation.class.php';

class DAOType_formation extends DAO {    
        
    public function find($id) : Type_formation {
        $sql = 'SELECT * FROM type_formation WHERE id_type_formation=:id';
        $param = ['id'=>$id];
        $statement = $this->executeRequest($sql, $param);
            $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Type_formation');
            return $statement->fetch();         
    }
    
    public function findAll(){
        $sql = 'SELECT * from type_formation';
        $statement = $this->executeRequest($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Type_formation');
        return $statement->fetchAll();         
    }            
}
