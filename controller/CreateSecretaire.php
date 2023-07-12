<?php 
include_once '../racine.php';
include_once RACINE.'/services/user/UserService.php';
include_once RACINE.'/services/SecretaireService.php';
include_once RACINE.'/beans/user.php';
include_once RACINE.'/beans/Secretaire.php';
$host = 'localhost';
$dbname = 'dbname';
$login = 'root';
$password = '';


try {
    $con = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
    $con->query("SET NAMES UTF8");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

$es = new UserService();

$ps = new SecretaireService();


$uri = $_SERVER['REQUEST_URI']; 

$url_components = parse_url($uri);

parse_str($url_components['query'], $params);

$email =  $params['email'];
$nom = $params['nom'];
$prenom = $params['prenom'];

$date_naissance = $params['datenaissance'];
$tele = $params['tele'];
$cin = $params['cin'];
$photo = $params['photo'];


echo $email;

$user = $es->findByEmail("$email");

$id_user = $user->getId();

$ps->create(new Secretaire(1, $nom, $prenom, $cin, $date_naissance, $tele, $id_user, $photo));

header('Location: ../Ajouter-secretaire.php')

?>
