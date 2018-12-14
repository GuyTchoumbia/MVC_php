<?php

/*
 * super classe DAO
 * 
 */

abstract class DAO {
    protected $cnx;
 
    public function __construct(PDO $cnx){
        $this->cnx = $cnx;
    }    
    
    /* execute la requete $sql, 
     * choisit entre requete preparée ou non en fonction de la presence ou non de parametre $param
     * 
     */
    protected function executeRequest(string $sql,array $param = null) {
        if ($param == null) {
            $statement = $this->cnx->query($sql);  
        }
        else {
            $statement = $this->cnx->prepare($sql); 
            $statement->execute($param);
        }
        if (!$statement)
            throw new Exception("Erreur a l'insertion Base de Donnée");
        else 
            return $statement;
            
    }
    
}
