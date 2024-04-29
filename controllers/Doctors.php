<?php

require_once '../models/Doctor.php';
require_once '../helpers/session_helper.php';

class Doctors
{

    private $doctorModel;

    public function __construct()
    {
        $this->doctorModel = new Doctor;
    }

    public function get()
    {
        $doctors = $this->doctorModel->getAllDoctors();
        $_SESSION['doctorsLists'] = $doctors[0]->prenom;

        $returnedDocs = array();
        foreach ($doctors as $doc) {
            array_push($returnedDocs, $doc);
        }
        $_SESSION['doctorsList'] = $returnedDocs;
        redirect("../medecin.php");
    }
}

$init = new Doctors;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'get':
            $init->get();
            break;
        default:
            redirect("../indexe.php");
    }
}
