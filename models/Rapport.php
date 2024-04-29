<?php
require_once '../libraries/Database.php';




Class Rapport{

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //register Data
    public function register($data){

        $this->db->query('INSERT INTO rapport ( date, motif, bilan, idVisiteur, idMedecin) 
        VALUES (:date, :motif, :bilan, :idVisiteur, :idMedecin)');
        //Bind values
        $this->db->bind(':date', $data['date']);
        $this->db->bind(':motif', $data['motif']);
        $this->db->bind(':bilan', $data['bilan']);
        $this->db->bind(':idVisiteur', $data['idVisiteur']);
        $this->db->bind(':idMedecin', $data['idMedecin']);


        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>