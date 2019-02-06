<?php
class Connexion extends PDO{
    private $stmt;

    public function __construct($dsn, $username, $password)
    {
        parent::__construct($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function exec_requete($query, array $parameters=[]){
        $this->stmt=parent::prepare($query);
        foreach($parameters as $name => $value){
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    public function getResult(){
        return $this->stmt->fetchall();
    }
}
?>