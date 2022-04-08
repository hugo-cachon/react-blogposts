<?php 


class Db_connect {

    public $connexion;
   
    public function setConnection()
    {
        
        $this->conn = null;
        
        try 
        {
            $this->conn = new PDO("mysql:host=db;port=3306;dbname=posts","root","password");
            $this->conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "Connected";
        }
        catch ( PDOException $e ) 
        {
            die ('Error: ' . $e->getMessage());
        }
        return $this->conn;
    }
}