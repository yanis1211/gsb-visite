<?php
require_once '../libraries/Database.php';

class Doctor {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //get all Doctors
    public function getAllDoctors(){
        $this->db->query('SELECT * FROM medecin');

        $row = $this->db->resultSet();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
}

?>

