<?php
require_once '../libraries/Database.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email or username
    public function findVisitorByLogin($login ){
        $this->db->query('SELECT * FROM visiteur WHERE login = :login');
        $this->db->bind(':login', $login);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
    
    //Login user
    public function login($login, $password){
        $row = $this->findVisitorByLogin($login);

        if($row == false) return false;

        $hashedPassword = $row->mdp;
        if($password==$hashedPassword){
            return $row;
        }else{
            return false;
        }
    }

 
}