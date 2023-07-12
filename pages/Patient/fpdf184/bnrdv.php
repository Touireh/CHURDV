<?php
$pdo = new PDO("mysql: host=localhost;	dbname=dbname",	"root", "");
//echo "connexion :OK";
if (isset($_GET['id']))
    $id = $_GET['id'];
else
    $id = 0;
    $identite_patient = $pdo->query("select r.* , p.nom as 'npatient', p.prenom as 'ppatient', p.cin as 'cin', p.date_naissance as 'date_naissance', p.adresse as 'adresse' from `rendez-vous` r  inner join patient p on r.patient = p.id  where r.id =$id ");
    $patient = $identite_patient->fetch();
    
    $nom_prenom = strtoupper($patient['npatient'] . "  " . $patient['ppatient']);
    
    $date_naiss = ($patient['date_naissance']);
    
   $lieu_naiss = strtoupper($patient['adresse']);
    
    $cin = strtoupper($patient['cin']);
    
   // $date_insc = dateEnToDateFr($stagiaire['date_inscription']);
    
    //$num_insc = strtoupper($stagiaire['num_inscription']);
    
    
  /*  $scolarite_stagiaire = $pdo->query("SELECT id_stagiaire,annee_scolaire,classe,nom as Nom_Filiere,niveau_diplome
                                            FROM scolarite,filiere
                                            WHERE filiere.id=scolarite.id_filiere
                                            AND id_stagiaire=$ids
                                            AND annee_scolaire='$as'");
    $scolarite = $scolarite_stagiaire->fetch();*/
    
    $date = strtoupper($patient['date']);
    
    $time = strtoupper($patient['time']);
    
    //$service = strtoupper($patient['service']);
    
    
    require('fpdf.php');
    
    //Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
    $pdf = new FPDF('P', 'mm', 'A5');
    
    //Ajouter une nouvelle page
    $pdf->AddPage();
    
    // entete
    $pdf->Image('logo.jpg', 10, 5, 50, 20);
    
    // Saut de ligne
    $pdf->Ln(18);
    
    
    // Police Arial gras 16
    $pdf->SetFont('Arial', 'B', 16);
    
    // Titre
    $pdf->Cell(0, 10, 'BON DE RENDEZ-VOUS ', 'TB', 1, 'C');
    $pdf->Cell(0, 10, 'N°:', 0, 1, 'C');
    
    // Saut de ligne
    $pdf->Ln(5);
    
    // Début en police Arial normale taille 10
    
    $pdf->SetFont('Arial', '', 10);
    $h = 7;
    $retrait = "      ";
    
    $pdf->Write($h, "Je soussigne, Directeur de CHU FES  que : \n");
    
    $pdf->Write($h, $retrait . "Le patient : ");
    
    //Ecriture en Gras-Italique-Souligné(U)
    $pdf->SetFont('', 'BIU');
    $pdf->Write($h, $nom_prenom . "\n");
    
    //Ecriture normal
    $pdf->SetFont('', '');
    
    $pdf->Write($h, $retrait . "Né (e) Le : " . $date_naiss . " À : " . $lieu_naiss . "\n");
    
    $pdf->Write($h, $retrait . "CIN N° : " . $cin . " \n");
    
   // $pdf->Write($h, $retrait . "Inscrit (e) le : " . $date_insc . " Sous le N° : " . $num_insc . " \n");
    
   // $pdf->Write($h, $retrait . "Filière :  " . $service. " \n");
    
    $pdf->Write($h, $retrait . "la date de rendez-vous :  " . $date . "  \n");
    
    $pdf->Write($h, $retrait . "l'heure de rendez-vous :  " . $time . " \n");
    
    //$pdf->Write($h, $retrait . "Année de formation :  " . $as . "  \n");
    
    //$pdf->Write($h, "Poursuit ses étude en  " . $classe . "   et cela pour l'année scolaire en cours  " . $as . "  \n");
    
    //$pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");
    
    //$pdf->Cell(0, 5, 'Fait à El Attaouia Le :' . date('d/m/Y'), 0, 1, 'C');
    
    // Décalage de 20 mm à droite
    $pdf->Cell(20);
    $pdf->Cell(80, 8, "Le directeur de CHU", 1, 1, 'C');
    
    // Décalage de 20 mm à droite
    $pdf->Cell(20);
    $pdf->Cell(80, 5, "Mr blabla ", 'LR', 1, 'C');
    $pdf->Cell(20);
    $pdf->Cell(80, 5, ' ', 'LR', 1, 'C'); // LR Left-Right
    $pdf->Cell(20);
    $pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
    $pdf->Cell(20);
    $pdf->Cell(80, 5, ' ', 'LR', 1, 'C');
    $pdf->Cell(20);
    $pdf->Cell(80, 5, ' ', 'LRB', 1, 'C'); // LRB : Left-Right-Bottom (Bas)
    
    //Afficher le pdf
    $pdf->Output('', '', true);
?>