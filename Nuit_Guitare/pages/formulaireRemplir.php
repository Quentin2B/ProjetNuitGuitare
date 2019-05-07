<body id="page-top">


  <!-- Page Wrapper -->
  <?php

  require_once("db.php");

  $sqlChauffeurs = "SELECT course.Id, Date, Heure, chauffeur.Nom as cNom, chauffeur.Prenom as cPre, groupe.Nom as gNom, structure.Nom as sNom, Remarque
                              FROM `course`
                              JOIN chauffeur ON NomChauffeur = chauffeur.Id
                              JOIN groupe ON NomGroupe = groupe.Id
                              JOIN structure ON NomStructure = structure.Id
                              ORDER BY Date, SUBSTRING_INDEX(Heure, '', -1), SUBSTRING_INDEX(Heure, ' ', 1)";
  $formChauffeurs = "SELECT Id, Nom, Prenom FROM chauffeur";
  $formGroupes = "SELECT Id, Nom FROM groupe";
  $formStructures = "SELECT Id, Nom FROM structure";
  $formChauffeurs = accesBdd()->query($formChauffeurs);
  $formGroupes = accesBdd()->query($formGroupes);
  $formStructures = accesBdd()->query($formStructures);
$reponse = accesBdd()->query($sqlChauffeurs);

if(!empty($_POST['valide'])) {
  if(!empty($_POST['nomChauffeur']) && !empty($_POST['date']) && !empty($_POST['heure']) && !empty($_POST['chauffeur']) && !empty($_POST['groupe']) && !empty($_POST['structure'])) {
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $chauffeur = $_POST["chauffeur"];
    $groupe = $_POST["groupe"];
    $structure = $_POST["structure"];
    $remarque = $_POST["remarque"];

    $sqlAjoutChauffeur = "INSERT INTO `course` (`Id`, `Date`, `Heure`, `NomChauffeur`, `NomGroupe`, `NomStructure`, `Remarque`) VALUES (NULL, '".$date."', '".$heure."', '".$chauffeur."', '".$groupe."', '".$structure."', '".$remarque."');";
    echo ($sqlAjoutChauffeur);
    accesBdd()->query($sqlAjoutChauffeur);
    header('Location: formulaireRemplir.php');
    exit;
  }
}
?>
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Nuit de la guitare </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - lis-->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>logistique manager</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        smart menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?page=formulairefill"  >
          <i class="fas fa-fw fa-folder"></i>
          <span>Remplir</span>
        </a>

      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=formulaireConsult">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Consulter</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=DataBaseUpdate">
          <i class="fas fa-fw fa-table"></i>
          <span>Mettre à jours</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">





          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Antoine mucchielli</span>
                <img class="img-profile rounded-circle" src="../images/profil.png">
              </a>

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Remplir un nouveau formulaire</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> pdf feature</a>
          </div>
          <div class="row">


            <div class="container">

               <div class="card o-hidden border-0 shadow-lg my-5">
                 <div class="card-body p-0">
                   <!-- Nested Row within Card Body -->
                   <div class="row">
                      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                     <div class="col-lg-7">
                       <div class="p-5">

                         <form name="FormCrea" action="index.php?page=formulairefill" method="post">
                           <div class="form-group row">
                             <div class="col-sm-6 mb-3 mb-sm-0">
                               Choisir Groupe : <select id="idGroupe">

                                      <?php

                                        $reponse = accesBdd()->query("SELECT Id, Nom FROM groupe ORDER BY Nom");

                                        while($donnee = $reponse->fetch())
                                          {
                                        ?>

                                        <option value="<?php echo $donnee['Id']?>" ><?php echo $donnee['Nom']; ?></option>

                                        <?php }

                                        $reponse->closeCursor();

                                      ?>
                                    </select>
                             </div>
                             <br><br>
                             <div class="col-sm-6">
                               Date du concert du Groupe : <input type="date" class="form-control form-control-user" name="date" placeholder="Date Concert">
                            <br><br>
                            </div>
                             <div class="col-sm-6">
                               Lieu d'arrivée : <select id="structure">

                                      <?php

                                        $reponse = accesBdd()->query("SELECT Id, Nom FROM structure ORDER BY Nom");

                                        while($donnee = $reponse->fetch())
                                          {
                                        ?>

                                        <option value="<?php echo $donnee['Id']?>" ><?php echo $donnee['Nom']; ?></option>

                                        <?php }

                                        $reponse->closeCursor();

                                      ?>
                                    </select>
                           </div>
                           <div class="col-sm-6">
                             Heure d'arrivée du Groupe : <input type="time" class="form-control form-control-user" name="time" placeholder="Heure Arrivée">
                           <br>
                           <div >
                             Choisir chauffeur  : <select id="nomChauffeur">

                                    <?php

                                      $reponse = accesBdd()->query("SELECT Id, Nom FROM chauffeur ORDER BY Nom");

                                      while($donnee = $reponse->fetch())
                                        {
                                      ?>

                                      <option value="<?php echo $donnee['Id']?>" ><?php echo $donnee['Nom']; ?></option>

                                      <?php }

                                      $reponse->closeCursor();

                                    ?>
                                  </select>

                           </div>
                           <br><br>
                           <div >
                             Remarques : <textarea class="form-control form-control-user" name="remarque" size=6 placeholder="Remarques">Remarques</textarea>
                         </div>
                          <input type="submit" name="valide" value="Valider formulaire" class="btn btn-primary">
                         </form>
                         <hr>


                       </div>
                     </div>
                   </div>
                 </div>
               </div>

             </div>

             <!-- Bootstrap core JavaScript-->
             <script src="vendor/jquery/jquery.min.js"></script>
             <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

             <!-- Core plugin JavaScript-->
             <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

             <!-- Custom scripts for all pages-->
             <script src="js/sb-admin-2.min.js"></script>

          </div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; none :p</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->





  <!-- Bootstrap core JavaScript-->
  <script src="../assets/js/sb-admin-2.js"></script>
  <script src="../assets/js/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assets/js/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/js/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/chart-area-demo.js"></script>
  <script src="../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>

<?php
  if(!empty($_POST['valide'])) {

    if(!empty($_POST['NomGroupe'])) {
      if(!empty($_POST['EffectifGroupe'])) {
        if(!empty($_POST['DateConcert'])) {
          if(!empty($_POST['LieuArrivee'])) {
            $nomGroupe = ($_POST['NomGroupe']);
            $effectifGroupe = ($_POST['EffectifGroupe']);
            $dateConcert = ($_POST['DateConcert']);
            $lieuArrivee = ($_POST['LieuArrivee']);

            $db->query("INSERT INTO groupe SET Nom='". $nomGroupe ."', NbPersonne='". $effectifGroupe ."',DateConcert='". $dateConcert ."'
              ,LieuArrivee='" . $lieuArrivee . "'");

          } else { echo 'Il Faut indiquer le lieu arrivée'; }
        } else { echo 'Il faut indiquer une date de concert'; }
      } else { echo 'Il faut indiquer effectif du groupe à transporter'; }
    } else { echo 'Il faut indiquer le nom du groupe.'; }
  }
  ?>
