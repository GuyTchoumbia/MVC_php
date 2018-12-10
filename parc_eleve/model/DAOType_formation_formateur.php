<?php
require_once 'Type_formation_formateur.class.php';
require_once 'core/DAO.class.php';

class DAOType_formation_formateur extends DAO {    
        
    public function find($id){
        $sql = 'SELECT * FROM type_formation_formateur WHERE id_formateur=:id';
        $param = ['id'=>$id];
        $statement = $this->executeRequest($sql,$param);
//        $statement = $this->cnx->prepare($sql);
//        $statement->execute(['id'=>$id]);
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Type_formation_formateur');
        $d = [];
        while ($tf = $statement->fetch()){
            $d[] = $tf;
        }
        return $d;
                
    }
}
