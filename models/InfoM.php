<?php
require_once '../libraries/Database.php';

class InfoM {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function getInfoM($name){

        $this->db->query('SELECT * FROM medecin WHERE nom = :nom');

        $this->db->bind(':nom', $name);

        $row = $this->db->resultSet();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }

    }

}