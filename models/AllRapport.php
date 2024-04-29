<?php
require_once '../libraries/Database.php';

class Edit
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Find user by email or username
    public function getAllReports($id)
    {
        $this->db->query('SELECT * FROM rapport WHERE idVisiteur = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function updateReports($data)
    {
        $this->db->query('UPDATE rapport SET date= :date, motif = :motif, bilan = :bilan WHERE id = :id');
        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':motif', $data['motif']);
        $this->db->bind(':bilan', $data['bilan']);


        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findReports($criteria)
    {
        $this->db->query('SELECT * FROM rapport WHERE date = :date  ');
        //Bind values
        $this->db->bind(':date', $criteria);


        $row = $this->db->resultSet();
        //Execute
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
