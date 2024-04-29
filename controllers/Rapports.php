<?php

 

    require_once '../models/User.php';
    require_once '../models/Rapport.php';
    require_once '../helpers/session_helper.php';

Class Rapports {

    private $rapportModel;

    public function __construct(){
        $this->rapportModel = new Rapport;
    }


    public function register(){
        //Process form
        echo "<script type='text/javascript'>alert('BLABLA');</script>";
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'date' => $_POST['date'],
            'motif' => $_POST['motif'],
            'bilan' => $_POST['bilan'],
            'idVisiteur' => $_POST['idVisiteur'],  
            'idMedecin' => $_POST['idMedecin'],
        ];

        //Validate inputs
        if(empty($data['date']) || empty($data['motif']) || empty($data['bilan']) || empty($data['idVisiteur']) || empty($data['idMedecin'])){
            flash("register", "Please fill out all inputs");
            redirect("../rapport.php");
        }

        //Enregistre le rapport
        if($this->rapportModel->register($data)){
            redirect("../medecin.php");
        }else{
            die("Something went wrong");
        }
    }
}

$init = new Rapports;

//Ensure that user is sending a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'register':
            $init->register();
            break;
        default:
        redirect("../indexe.php");
    }
    
}
?>