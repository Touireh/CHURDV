<?php
class Secretaire {

private $id;
private $nom;
private $prenom;
private $cin;
private $date_naissance;
private $telephone;
private $id_user;

private $photo;




function __construct($id, $nom, $prenom, $cin, $date_naissance, $telephone, $id_user, $photo) {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->photo = $photo;
    $this->cin = $cin;
    $this->id_user = $id_user;
   
    $this->telephone = $telephone;
    $this->date_naissance = $date_naissance;
   

}

function getId() {
    return $this->id;
}

function getNom() {
    return $this->nom;
}

function getPrenom() {
    return $this->prenom;
}

function getPhoto() {
    return $this->photo;
}

function getCin() {
    return $this->cin;
}

function getIdUser() {
    return $this->id_user;
}

function getTelephone() {
    return $this->telephone;
}

function getDateNaissance() {
    return $this->date_naissance;
}





function setId($id) {
    $this->id = $id;
}

function setNom($nom) {
    $this->nom = $nom;
}

function setPrenom($prenom) {
    $this->prenom = $prenom;
}

function setPhoto($photo) {
    $this->photo = $photo;
}
function setCin($cin) {
    $this->cin = $cin;
}
function setIdUser($id_user) {
    $this->id_user = $id_user;
}
function setTelephone($telephone) {
    $this->telephone = $telephone;
}


function setDateNaissance($date_naissance) {
    $this->date_naissance = $date_naissance;
}





}