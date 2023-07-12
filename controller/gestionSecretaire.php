<?php

include_once '../racine.php';
include_once RACINE.'/services/SecretaireService.php';
extract($_POST);

$es = new SecreaireService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $es->create(new Secretaire($id, $nom, $prenom, $cin, $date_naissance, $telephone, $id_user, $service, $photo));
    } elseif ($op == 'update') {
        $es->update(new Secretaire($id, $nom, $prenom, $cin, $date_naissance, $telephone, $id_user, $service, $photo));
    } elseif ($op == 'delete') {
        $es->delete($es->delete($cin));
    } elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($es->findById($cin));
        $r = false;
    }elseif ($op == 'id') {
        
        header('Content-type: application/json');
        echo json_encode($fs->findById($id));
        $r = false;
    }elseif ($op == 'pp') {
        
        header('Content-type: application/json');
        echo json_encode($es->med($service,$specialite));
        $r = false;
    }elseif ($op == 'mo') {
        
        header('Content-type: application/json');
        echo json_encode($es->findEmail());
        $r = false;
    }elseif ($op == 'by') {
        
        header('Content-type: application/json');
        echo json_encode($fs->findAlz($specialite));
        $r = false;
        
    }
}
if ($r == true){
    header('Content-type: application/json');
    echo json_encode($es->findAll());
}