<?php
require_once '../libraries/Database.php';

Class Edit {


public function make_table($cats,$model = null)
{

$result= "";
if(is_array($cats))){
    foreach ($cats as $cat_row){

        $edit_args = $cat_row->id.",'".$cat_row->date."'";

        $info ['id'] = $cat_row->id;
        $info ['date'] = $cat_row->date;
        $info ['motif'] = $cat_row->motif;
        $info ['bilan'] = $cat_row->bilan;
        $info ['idVisiteur'] = $cat_row->idVisiteur;
        $info ['idMedecin'] = $cat_row->idVisiteur;









    }
}


}



}