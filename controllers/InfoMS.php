<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../models/InfoM.php';
require_once '../helpers/session_helper.php';


class InfoMs
{

    private $infoModel;

    public function __construct()
    {
        $this->infoModel = new InfoM;
    }

    public function getInfoM()
    {

        $infoMS = $this->infoModel->getInfoM($_SESSION['Mname']);
        $_SESSION['infoM'] = $infoMS;

        $returnedinfoM = array();
        foreach ($infoMS as $ms) {
            array_push($returnedinfoM, $ms);
        }

        $_SESSION['infoM'] = $returnedinfoM;
        redirect("..//infoM.php");
    }

    public function createMedecinSession($medecin)
    {
        $_SESSION['Mname'] = $medecin->nom;
        redirect("../infoM.php");
    }
}

$init = new InfoMs;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'get':
            $init->getInfoM();
            break;
        default:
            redirect("../indexe.php");
    }
}
