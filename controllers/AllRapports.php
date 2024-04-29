<?php

require_once '../models/AllRapport.php';
require_once '../helpers/session_helper.php';

class Edits
{

    private $editModel;

    public function __construct()
    {
        $this->editModel = new Edit;
    }

    public function getAllReport()
    {


        $edits = $this->editModel->getAllReports($_SESSION['usersId']);

        $returnedEdits = array();
        foreach ($edits as $ed) {
            array_push($returnedEdits, $ed);
        }
        $_SESSION['reportsList'] = $returnedEdits;
        redirect("../allrapport.php");
    }

    public function updateReport()
    {
        //Process form
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'id' => $_POST['id'],
            'date' => $_POST['date'],
            'motif' => $_POST['motif'],
            'bilan' => $_POST['bilan']
        ];

        //Validate inputs
        if (empty($data['date']) || empty($data['motif']) || empty($data['bilan'])) {
            flash("updateReport", "Veuillez remplir tout les champs");
            redirect("../update.php");
        }

        //Modifie le rapport
        if ($this->editModel->updateReports($data)) {
            redirect("../update.php");
        } else {
            die("Something went wrong");
        }
    }

    public function searchReports()
    {

        $edits = $this->editModel->getAllReports($_SESSION['usersId']);


        $criteria = $_POST['find'];
        $result = $this->editModel->findReports($criteria);

        $returnSearch = array();
        foreach ($result as $rs) {
            array_push($returnSearch, $rs);
        }

        $_SESSION['reportsList'] = $returnSearch;
        redirect("../allrapport.php");
    }
}

$init = new Edits;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'get':
            $init->getAllReport();
            break;
        case 'updateReport':
            $init->updateReport();
            break;
        case 'search':
            $init->searchReports();
            break;
        default:
            redirect("../indexe.php");
    }
}
