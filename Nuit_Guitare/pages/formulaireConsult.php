
<body id="page-top">
  <?php require_once("db.php");?>

  <!-- Page Wrapper -->
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
      <h1 class="h3 mb-0 text-gray-800">Prochaines Courses</h1>
      <a href="#" id="cmd" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> pdf feature</a>
    </div>
    <div class="row">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Heure</th>
            <th scope="col">Chauffeur</th>
            <th scope="col">Artiste</th>
            <th scope="col">Lieu arrivee</th>
            <th scope="col">Remarques</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
      <tbody id="filledTbody">
        <?php
        $sqlGroupes = "SELECT  course.Id as cId, Date, Heure, chauffeur.Nom as cNom, chauffeur.Prenom as cPre, groupe.Nom as gNom, structure.Nom as sNom, Remarque
                                    FROM `course`
                                    JOIN chauffeur ON NomChauffeur = chauffeur.Id
                                    JOIN groupe ON NomGroupe = groupe.Id
                                    JOIN structure ON NomStructure = structure.Id
                                    ORDER BY Date, SUBSTRING_INDEX(Heure, '', -1), SUBSTRING_INDEX(Heure, ' ', 1)";
        $reponse = accesBdd()->query($sqlGroupes);

        while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
        {
        ?>
        <tr>
            <td data-label="Date"><?php echo $donnees['Date'];?></td>
            <td data-label="Heure"><?php echo $donnees['Heure'];?></td>
            <td data-label="Nom du chauffer"><?php echo ($donnees['cPre'] . " " . $donnees['cNom']);?></td>
            <td data-label="Groupe"><?php echo $donnees['gNom'];?></td>
            <td data-label="Structure"><?php echo $donnees['sNom'];?></td>
            <td data-label="Remarque"><?php echo $donnees['Remarque'];?></td>
            <td data-label="Supprimer">
              <button onclick="actionDelete(<?php echo $donnees["cId"];?>);" title='Supprimer'><img src='img/croix.png' alt='Supprimer' /></button>
            </td>
        </tr>
        <?php
        } //fin de la boucle, le tableau contient toute la BDD

         ?>
      </tbody>
      </table>
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


<script type="text/javascript">
  function actionDelete(id){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         refresh();
      }
    };
    xhttp.open("GET", "./pages/supprimerCourse.php" + "?Action=Suppression&id=" + id, true);
    xhttp.send();
  }
</script>

</body>
