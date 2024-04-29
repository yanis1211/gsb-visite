<?php

require_once '../models/SearchMedecin.php';
require_once '../helpers/session_helper.php';

class SearchMedecins
{

    private $searchMedecinModel;

    public function __construct()
    {
        $this->searchMedecinModel = new SearchMedecin;
    }






    public function get()
    {
        $searchMedecin = $this->searchMedecinModel->findAllsearchMedecin();
        $_SESSION['searchMedecinLists'] = $searchMedecin[0]->prenom;
        echo "alo";
        $returnedMeds = array();
        foreach ($searchMedecin as $sc) {
            array_push($returnedMeds, $sc);
        }
        $_SESSION['searchMedecinList'] = $returnedMeds;
        redirect("../searchmedecin.php");
    }

    public function searchDoctors()
    {

        $critaire = $_POST['doc'];
        $result = $this->searchMedecinModel->findDoctors($critaire . "%");

        $returnSearch = array();
        foreach ($result as $doc) {
            array_push($returnSearch, $doc);
        }
        $_SESSION['searMedecinList'] = $returnSearch;
        redirect("../searchmedecin.php");
    }
}

$init = new SearchMedecins;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST); // Ajout pour afficher les données POST reçues

    switch ($_POST['type']) {
        case 'get':
            $init->get();
            break;
        case 'search':
            $init->searchDoctors();
            break;
        default:
            redirect("../indexe.php");
    }
}
