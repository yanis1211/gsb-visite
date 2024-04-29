<?php
require_once '../libraries/Database.php';

class SearchMedecin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function findDoctors($critaire)
    {
        $this->db->query('SELECT * FROM medecin WHERE nom Like :nom');

        $this->db->bind(':nom', $critaire . "%");


        $row = $this->db->resultSet();

        //Execute
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function findAllsearchMedecin()
    {
        $this->db->query('SELECT * FROM medecin');

        $row = $this->db->resultSet();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
