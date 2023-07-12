<?php

if(session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
if ($_SESSION["user"]) {
    if ($_SESSION['role'] == "secretaire") {

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo me-auto"><img src="asset/img/logo.jpg" style="width: 130px;"></a>

      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="img/<?php echo $_SESSION['photo']?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Dr. <?php echo $_SESSION['nom']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?></h6>
              <span>secretaire</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="secretaire-profile.php">
                <i class="bi bi-person"></i>
                <span>Mon Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="secretaire-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="historique.php">
                <i class="bi bi-question-circle"></i>
                <span>Historique</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnection</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
          <a class="nav-link collapsed" href="secretaire-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
          <a class="nav-link " href="historique.php">
          <i class="bi bi-question-circle"></i>
          <span>Rendez-vous</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Liste des rendez-vous </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Rendez-vous</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
    $con=mysqli_connect('localhost', 'root','', 'dbname');

    if(!$con){ // Contrôler la connexion
      $MessageConnexion = die ("connection impossible");
    }else{ 
          $id=$_GET['id'];
          if(isset($_POST['submit'])){
              $date=$_POST['date'];
              $time=$_POST['time'];
              $medecin=$_POST['medecin'];
              $service=$_POST['service'];
              $specialite=$_POST['specialite'];
              
              $sql="update `rendez-vous` set  id='$id', service='$service', specialite='$specialite', date='$date' ,time='$time', medecin='$medecin' 
              where id=$id ";
              $result=mysqli_query($con,$sql);

              if($result){
                header('location:historique.php');
              }else{
                die(mysqli_error($con));
              }
        }
    }
    ?>
    <?php
           $selectt = " select * from `service` ";
           $resultt= mysqli_query($con,$selectt); 
            
    ?>
     <?php
           $selec = " select * from `specialite` ";
           $res= mysqli_query($con,$selec); 
            
    ?>
    <section class="section dashboard">
      <?php
        $id=$_GET['id'];
        
        $sqll= " select r.* , p.nom as 'npatient', p.prenom as 'ppatient' from `rendez-vous` r  inner join patient p on r.patient = p.id  where r.id =$id ";
        $result= mysqli_query($con,$sqll);
        $row=mysqli_fetch_assoc($result);
        $npatient=$row['npatient'];
        $ppatient=$row['ppatient'];
        $fiche=$row['fiche'];
        $date=$row['date'];
        $time=$row['time'];
        $medecin=$row['medecin'];
       
        $service=$row['service'];
        $specialite=$row['specialite'];
        
        ?> 
      <form method="POST">
      <fieldset disabled>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom</label>
    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $npatient ?>" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Prenom</label>
    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $ppatient ?>" >
  </div>
  </fieldset>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fiche d'information</label>
    <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $fiche ?>" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Date</label>
    <input type="date" class="form-control" id="exampleInputPassword1" name='date'value="<?php echo $date ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Time</label>
    <input type="time" class="form-control" id="exampleInputPassword1" name="time" value="<?php echo $time ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Docteur</label>
    <input type="texte" class="form-control" id="exampleInputPassword1" name="medecin" value="<?php echo $medecin ?>" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Service</label>
  <select class="form-select" aria-label="Default select example" name="service" value="<?php echo $service?>">
  <option selected> Choisir l'Hopitale</option>
  <?php
           foreach($resultt as $key => $value){?>
            <option value="<?=$value['id'];?>"><?=$value['libelle'] ;?> </option>
            <?php } ?>
  </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Specialite</label>
    <select class="form-select" aria-label="Default select example" name="specialite" value="<?php echo $specialite?>">
  <option selected> Choisir la specialite</option>
  <?php
           foreach($res as $key => $value){?>
            <option value="<?=$value['id'];?>"><?=$value['libelle'] ;?> </option>
            <?php } ?>
  </select>
  </div>
 
  <br>
  <button type="submit" class="btn btn-primary" name="submit">Valider</button>
</form>

    </section>
        

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CHUeRDV</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Realised by <a href="./index.php">TOUIREH HIBA</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="script/jquery-3.3.1.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="script/tables.js"></script>

</body>

</html>
<?php
    } else {
        include_once './login.php';
    }
} else {
    header('Location:./login.php');
}
?>