<?php
include_once RACINE.'/racine.php';
include_once RACINE.'/beans/Secretaire.php';
include_once RACINE.'/connexion/Connexion.php';
include_once RACINE.'/dao/IDao.php';

class SecretaireService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `secretaire` (`id`, `nom`, `prenom`, `cin`, `date_naissance`, `telephone`, `id_user`, `photo`)"
                . "VALUES (?,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array(null, $o->getNom(), $o->getPrenom(),$o->getCin(),$o->getDateNaissance(), $o->getTelephone(),
                        $o->getIdUser(),$o->getPhoto())) or die('Error');
    }

    public function delete($cin) {
        $query = "DELETE FROM `secretaire` WHERE cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select m.* , s.libelle as 'service', p.libelle as 'specialite',u.email as 'email' from `secretaire` m inner join service s on m.service = s.id inner join specialite p on m.specialite=p.id  inner join user u on m.id_user=u.id";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    public function findAz($id) {
        $query = "select m.* , s.libelle as 'service', p.libelle as 'specialite' from `secretaire` m inner join service s on m.service = s.id inner join specialite p on m.specialite=p.id where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }

    public function findById($id) {
        $query = "select * from `secretaire` where id =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $secretaire = new Secretaire($res->id, $res->nom, $res->prenom, $res->cin, $res->date_naissance, $res->telephone,$res->id_user, $res->service, $res->photo);
        return $secretaire;
    }
    
    public function findAlz($specialite) {
        $query = "select * from `secretaire` where specialite =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($specialite));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    
    public function findByIdUser($id) {
        $query = "select * from `secretaire` where id_user =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $secretaire = new Secretaire($res->id, $res->nom, $res->prenom, $res->cin, $res->date_naissance, $res->telephone,$res->id_user, $res->service, $res->photo);
        return $secretaire;
    }
    
    public function findBySpecialite($specialite) {
        //$etds = array();
        $query = "select * from `secretaire` where specialite =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($specialite));
        $res = $req->fetchAll(PDO::FETCH_OBJ);
        return $res;
        
    }

    public function findByEmail($email) {
        $query = "select * from `secretaire` where email =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($email));
        $s = $req->fetchAll(PDO::FETCH_OBJ);
        if (count($s) != 0) {
            foreach ($s as $res) {
                $cin = $res->cin;
        }
            return $cin;
        } else
            return -1;
        /* $employe = new Employe($res->cin, $res->nom, $res->prenom, $res->email, $res->telephone, $res->adresse, $res->password, $res->role, $res->photo, $res->fonction, $res->departement);
          return $employe; */
    }

    public function update($o) {
        $query = "UPDATE `secretaire` SET `id`=?,`nom`=?,`prenom`=?,`cin`=?,`date_naissance`=? ,`telephone`=? ,`service`=?,`photo`=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getId(), $o->getNom(), $o->getPrenom(),$o->getCin(),$o->getDateNaissance(), $o->getTelephone(),
                         $o->getService(),$o->getPhoto(), $o->getId())) or die('Error');
    }
    public function med($service,$specialite) {
        $query = "select * from `secretaire
        ` where service=? and specialite =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($service,$specialite));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

}