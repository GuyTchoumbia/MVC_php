<?php
require_once 'core/DAO.class.php';
require_once 'Salle.class.php';

class DAOSalle extends DAO {    
        
    public function find($id) : Salle {
        $sql = 'SELECT * FROM salle WHERE id_salle=:id';
        $param = ['id'=>$id];
        $statement = $this->executeRequest($sql,$param);
//        $statement = $this->cnx->prepare($sql);
//        $statement->execute(['id'=>$id]);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Salle');
        return $statement->fetch();   
    }
}
