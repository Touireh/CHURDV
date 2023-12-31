<?php
if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
include_once '../../racine.php';
if (isset($_SESSION["user"])) {
    if ($_SESSION['role'] == "patient") {
    include_once RACINE.'/beans/patient.php';
    include_once RACINE.'/services/others/PatientService.php';
    include_once RACINE.'/beans/user.php';
    include_once RACINE.'/services/user/UserService.php';
    $es = new PatientService();
    $euser = new UserService();
    $em = $es->findByUserId($_SESSION["user"]);
    $_SESSION["id"] = $em->getId();
    $_SESSION["nom"] = $em->getNom();
    $_SESSION["prenom"] = $em->getPrenom();
    $_SESSION["cin"] = $em->getCin();
    $_SESSION["tele"] = $em->getTelephone();
    $_SESSION["id_user"] = $em->getIdUser();
    $_SESSION["adresse"] = $em->getAdresse();
    $_SESSION["date_naissance"] = $em->getDateNaissance();
    $_SESSION["compteur"] = $em->getCompteur();
    $_SESSION["photo"] = $em->getPhoto();
    $_SESSION["compteur"] = $em->getCompteur();
    if($_SESSION["compteur"]>=3){
        header('location: banne.php');
    }

    $us = $euser->findById($_SESSION["id_user"]);

    $_SESSION["email"] = $us->getEmail();
    $_SESSION["role"] = $us->getRole();
    $_SESSION["password"] = $us->getPassword();    

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Acceuil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../asset/img/favicon.png" rel="icon">
  <link href="../../asset/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../../asset/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../asset/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../asset/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.7.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="top: 0";>
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo me-auto"><img src="../../asset/img/logo.jpg" alt="" class="img-fluid"></a>
     <!-- <h1 class="logo me-auto"><a href="index.html"> CHU </a></h1>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#appointment"> Rendez-vous</a></li>
          <li><a class="nav-link scrollto" href="#departments">Specialite</a></li>
          
          <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../dossiers/<?php echo $_SESSION['photo'];?>" alt="Profile" class="rounded-circle" style="height: 30px;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nom'].' '.$_SESSION['prenom']?></h6>
              <span><?php echo $_SESSION['role']?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="PatientProfile.php">
                <i class="bi bi-person"></i>
                <span>Mon Profil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="PatientProfile.php#profile-edit.active">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="../../logout.php" data-toggle="modal" data-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
        </ul>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Bienvenue au CHU  </h1>
      <h2>Prenez vos rendez-vous en-ligne sur CHUeRDV</h2>
      <a href="#departments" class="btn-get-started scrollto">Prenez rendez-vous</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>C'est quoi CHUeRDV?</h3>
              <p>
                CHUeRDV est la plateforme qui vous permez de prendre et de suivre vous rendez-vous en-ligne 
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                   
                    <i class="bx bx-calendar"></i>
                    <h4>Facilité </h4>
                    <p>Prenez un rendez-vous chez vous sans pain de transport !</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                   <i class="bx bx-building"></i>
                    <h4>Flexibilité</h4>
                    <p>Choisir le service et suivre votre demande de rendez-vous </p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-heart"></i>
                    <h4>Fiabilité</h4>
                    <p>Avoir votre consultation dans la date exacte</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

          

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>Découvrez les different service que vous pouver vous beneficier sur <b>CHUeRDV</b></p>
        </div>

        <div id="msati" class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-notes-medical"></i></div>
              <h4><a href="">Radiologie</a></h4>
              <p>Fournit des services d'imagerie diagnostique et thérapeutiques, par rayons X</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-pills"></i></div>
              <h4><a href="">Consultation</a></h4>
              <p>Communiquer avec votre medecin pour avoir votre consultation</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-ambulance"></i></div>
              <h4><a href="">Urgence</a></h4>
              <p>Le service d'urgence est disponible 24/7 sur MAYdoc.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-dna"></i></div>
              <h4><a href="">Analyses</a></h4>
              <p>CHUeRDV vous propose des analyses médicales générales et spécialisées.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-wheelchair"></i></div>
              <h4><a href="">SSR – Soins de suite et de réadaptation</a></h4>
              <p>CHUeRDV assurent la prise en soins des patients à travers le service SSR.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-heartbeat"></i></div>
              <h4><a href="">Chirurgie</a></h4>
              <p>CHUeRDV dispose des nouveau technologie de chirurgie moderne</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->
    <section id="appointment" class="appointment section-bg">
    <div class="section-title">
          <h2>Prendre un rendez-vous</h2>
          <p>Veuillez remplire le formulaire suivant pour prendre un rendez-vous.</p>
          <form class="row g-3" action="../../controller/CreateRendezVous.php" method="POST">
  <div class="col-md-4">
  <input id="patient" name ="patient" value="<?php echo $_SESSION['id']?>" hidden  >

    <label for="validationDefault01" class="form-label">Nom</label>
    <input type="text" class="form-control" id="validationDefault01" name="nom" value="<?php echo $_SESSION['nom']?>" required disabled>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="validationDefault02" name="prenom" value="<?php echo $_SESSION['prenom']?>" required disabled>
  </div>
  <div class="col-md-4">
    <label for="validationDefaultUsername" class="form-label">Email</label>
    <div class="input-group">
      <span class="input-group-text" id="inputGroupPrepend2">@</span>
      <input type="email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required  name="email" value="<?php echo $_SESSION['email']?>" disabled>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationDefault03" class="form-label">CIN</label>
    <input type="text" class="form-control" id="validationDefault03" required name="CIN" value="<?php echo $_SESSION['cin']?>" disabled>
  </div>
  <div class="col-md-4">
    <label for="validationDefault03" class="form-label">Telephone</label>
    <input type="text" class="form-control" id="validationDefault03" required name="tele" value="<?php echo $_SESSION['tele']?>" disabled>
  </div>
  
  <div class="col-md-4">
    <label for="validationDefault05" class="form-label">Fiche de reference </label>
    <input type="file" class="form-control" id="fiche" required id="fiche"  name="fiche">
  </div>
    <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Valider </button>
  </div>
</form>
  </div> 
  </section>
  
    <!-- End Appointment Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Specialites</h2>
          <p>Retrouvez ici, une liste non-exhaustive de nos spécialités.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cardiologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Neurologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Hepatologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Pediatrie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Ophtalmologie</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cardiology</h3>
                    <p class="fst-italic">La cardiologie est une spécialité médicale spécialisée dans le diagnostic et le traitement des maladies cardiaques et fait partie de la médecine interne.</p>
                    <p>Les cardiologues prennent en charge les pathologies cardiaques : malformations congénitales, troubles du rythme et de la conduction, pathologies des valves, insuffisance cardiaque, cardiomyopathies…</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Nerologie</h3>
                    <p class="fst-italic">La neurologie est une spécialité médicale s’intéressant au fonctionnement et aux maladies des systèmes nerveux central (cerveau et moelle épinière), périphérique (nerfs crâniens et nerfs des membres) et végétatif.</p>
                    <p>La neurologie englobe aussi certains aspects des disciplines connexes à la neurologie, notamment la neurochirurgie, la neuroradiologie.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Hepatologie</h3>
                    <p class="fst-italic">L’hépato-gastro-entérologie est la spécialité médicale qui s’intéresse aux organes de la digestion, leurs fonctionnements, leurs maladies et les moyens de les soigner.</p>
                    <p>Le service d’hépato-gastroentérologie assure la prise en charge de tous les patients atteints de maladies aiguës et chroniques du foie, et de tous les cancers digestifs, depuis le dépistage jusqu’au traitement.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pediatrie</h3>
                    <p class="fst-italic">En s’intéressant à l’alimentation et en suivant la croissance et l’évolution de l’enfant, la pédiatrie exerce un rôle important de prévention et de détection, et s’attache à diagnostiquer et à traiter les pathologies qui peuvent affecter sa santé.</p>
                    <p>La pédiatrie est également une spécialité permettant une relation unique « triangulaire » entre l'interne, l'enfant et ses parents</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Ophtalmologie</h3>
                    <p class="fst-italic">L’ophtalmologie est la spécialité qui traite du dépistage, du diagnostic, du traitement et de la prévention des maladies et des troubles médicaux et chirurgicaux de l’œil, de ses annexes, ainsi que des voies optiques et du système visuel.</p>
                    <p>L'ophtalmologie fait partie des spécialités médico-chirurgicales mais est intégrée au pool des spécialités chirurgicales à l'internat.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../../asset/img/departments-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->
    

  </main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>CHUeRDV</h3>
        <p>
          Centre Hospitalier Hassan II br>
          BP:1835 Atlas, Fès<br>
          Av.Hrazem , فاس 30050<br><br>
          <strong>Phone:</strong> +212 0525742222 <br>
          <strong>Email:</strong> contact@chu-fes.ma <br>
        </p>
      </div>
      <div class="col-lg-2 col-md-6 footer-links">
        <h4>       </h4>
        <ul>
          <li><i class=></i> <a href="#">         </a></li>
          <li><i class= ></i> <a href="#">          </a></li>
          <li><i class=></i> <a href="#">          </a></li>
          <li><i class=></i> <a href="#">          </a></li>
          <li><i class=></i> <a href="#">          </a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Liens</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">A propos </a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Rendez-vous</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Specialite</a></li>
        </ul>
      </div>


      <div class="col-lg-2 col-md-6 footer-links">
        <h4>       </h4>
        <ul>
          <li><i class=></i> <a href="#">         </a></li>
          <li><i class= ></i> <a href="#">          </a></li>
          <li><i class=></i> <a href="#">          </a></li>
          <li><i class=></i> <a href="#">          </a></li>
          <li><i class=></i> <a href="#">          </a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Nos Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Radiologie</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Consultation</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Urgence</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Analyses</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">Chirurgie</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#services">SSR</a></li>
        </ul>
      </div>
  </div>
</div>

<div class="container d-md-flex py-3">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>CHUeRDV</span></strong>. All Rights Reserved
    </div>
  </div>
  
</div>
</footer><!-- End Footer -->

  <!--div id="preloader"></div-->
  <!-- Logout Modal-->

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Logout" ci-dessous si vous êtes prêt à mettre fin à votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../asset/vendor/purecounter/purecounter.js"></script>
  <script src="../../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../asset/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../asset/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../asset/js/main.js"></script>

   <!-- Bootstrap core JavaScript-->
   <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>
    <script src="../../script/jquery-3.3.1.min.js"></script>
    <script src="../../script/appointement.js?v=6"></script>

</body>

</html>
<?php }else{
  header('location: ../../login.php');
}
}else{
    header('location: ../../login.php');
}
?>