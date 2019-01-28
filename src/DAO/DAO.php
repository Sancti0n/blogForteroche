<?php

//Pour toutes les classes dans DAO
namespace App\src\DAO;

//Uniquement pour la classe Database
use PDO;

abstract class DAO {

    private $connection;

    private function checkConnection() {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if ($this->connection === null) {
            return $this->getConnection();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }
    
    private function getConnection() {
        //Tentative de connexion à la base de données
        try {
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection) {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }

    protected function sql($sql, $parameters = null) {
        if ($parameters) {
            $result = $this->getConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        else {
            $result = $this->getConnection()->query($sql);
            return $result;
        }
    }
}
