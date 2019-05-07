<body id="page-top">

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
        <a class="nav-link collapsed" href="index.php?page=divulairefill"  >
          <i class="fas fa-fw fa-folder"></i>
          <span>Remplir</span>
        </a>

      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=divulaireConsult">
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

            <!-- Nav Item - User Indivation -->
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
            <h1 class="h3 mb-0 text-gray-800">Ajout d'éléments</h1>
            <a href="#" id="cmd" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> pdf feature</a>
          </div>

          <h3>Modification des Chauffeurs enregistrés dans la base de données</h3> <a href='../menu_admin.php' title='Retour au Menu'><img src='img/home.png' alt='Retour au menu' /></a><br>

          <div class="grid-x grid-padding-x">
               <div class="medium-6 cell">
                 <table class="responsive-card-table unstriped" border=4>
                         <tr>
                             <th>id</th>
                             <th>Nom</th>
                             <th>Prénom</th>
                             <th>Téléphone</th>
                             <!--<th>Couleur</th>-->
                             <th>Supprimer</th>
                         </tr>

                         <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
                         $sqlChauffeurs = 'SELECT * FROM chauffeur';
                         $reponse = accesBdd()->query($sqlChauffeurs);
                         while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                         {
                         ?>
                             <tr>
                                 <td data-label="Id"><?php echo $donnees['Id'];?></td>
                                 <td data-label="Nom"><?php echo $donnees['Nom'];?></td>
                                 <td data-label="Prénom"><?php echo $donnees['Prenom'];?></td>
                                 <td data-label="Téléphone"><?php echo $donnees['Telephone'];?></td>
                                <!-- <td data-label="Couleur"><?php //echo $donnees['Couleur'];?></td> -->
                                 <td data-label="Supprimer">
                                   <button onclick="actionDeleteC(<?php echo $donnees["Id"];?>);" title='Supprimer'><img src='img/croix.png' alt='Supprimer' /></button>
                                 </td>
                             </tr>
                         <?php
                         } //fin de la boucle, le tableau contient toute la BDD
                      ?>
                     </table>
             </div>

             <div class="medium-6 cell" id="PageDroite">
               <h2> Ajout d'un nouveau chauffeur </h2>
                   <div name="AjoutChauffeur" >

                     <label>Nom (obligatoire)</label>
                     <input type="text" name="nomChauffeur" id="nomChauffeur" placeholder="Nom du Chauffeur" size="4"/><br>

                     <label>Prénom</label>
                     <input type="text" name="prenomChauffeur" id="prenomChauffeur" placeholder="Prénom du Chauffeur" size="4"/><br>

                     <label>Téléphone</label>
                     <input type="text" name="telephoneChauffeur" id="telephoneChauffeur" placeholder="Numéro de téléphone du chauffeur" size="4"/><br>

                     <!--<label>Couleur</label>
                     <input type="color" name="couleurChauffeur" id="couleurChauffeur" value="#ffffff" size="4"/><br>-->


                     <input type="submit" value="Ajouter" name="valide">

                   </div>

             </div>


        </div>

        <h3>Modification des Groupes enregistrés dans la base de données</h3> <a href='../menu_admin.php' title='Retour au Menu'><img src='img/home.png' alt='Retour au menu' /></a><br>

        <div class="grid-x grid-padding-x">
             <div class="medium-6 cell">
               <table class="responsive-card-table unstriped" border=4>
                       <tr>
                           <th>id</th>
                           <th>Nom</th>
                           <th>Nombre Personnes</th>
                           <th>Date de concert</th>
                           <th>Lieu d'arrivée</th>
                           <th>Supprimer</th>
                       </tr>

                       <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
                       $sqlChauffeurs = 'SELECT * FROM groupe';
                       $reponse = accesBdd()->query($sqlChauffeurs);
                       while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                       {
                       ?>
                           <tr>
                               <td data-label="Id"><?php echo $donnees['Id'];?></td>
                               <td data-label="Nom"><?php echo $donnees['Nom'];?></td>
                               <td data-label="Nombre Personnes"><?php echo $donnees['NbPersonne'];?></td>
                               <td data-label="Date de Concert"><?php echo $donnees['DateConcert'];?></td>
                               <td data-label="Lieu d'arrivée"><?php echo $donnees['LieuArrivee'];?></td>
                               <td data-label="Supprimer">
                                 <button onclick="actionDeleteG(<?php echo $donnees["Id"];?>);" title='Supprimer'><img src='img/croix.png' alt='Supprimer' /></button>
                               </td>
                           </tr>
                       <?php
                       } //fin de la boucle, le tableau contient toute la BDD
                    ?>
                   </table>
           </div>

           <div class="medium-6 cell" id="PageDroite">
             <h2> Ajout d'un nouveau groupe </h2>
                 <div name="AjoutGroupe">

                   <label>Nom (obligatoire)</label>
                   <input type="text" name="nomGroupe" id="nomGroupe" placeholder="Nom du Groupe" size="4"/><br>

                   <label>Nombre de personnes dans l'équipe</label>
                   <input type="number" name="nbPersGroupe" id="nbPersGroupe" placeholder="Nombre de personnes dans le groupe et l'équipe" size="4"/><br>

                   <label>Date du concert</label>
                   <input type="date" name="dateGroupe" id="dateGroupe" value="2019-01-01" placeholder="Date de leur concert" size="4"/><br>

                   <label>Lieu d'arrivée</label>
                   <input type="text" name="lieuGroupe" id="lieuGroupe" placeholder="Lieu d'arrivée du Groupe" size="4"/><br>


                   <input type="submit" value="Ajouter" name="valide">

                 </div>

           </div>

         </div>

         <h3>Modification des Structures enregistrées dans la base de données</h3> <a href='../menu_admin.php' title='Retour au Menu'><img src='img/home.png' alt='Retour au menu' /></a><br>

         <div class="grid-x grid-padding-x">
              <div class="medium-6 cell">
               <table class="responsive-card-table unstriped" border=4>
                        <tr>
                            <th>id</th>
                            <th>Catégorie</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <!--<th>Mail</th>-->
                            <th>Supprimer</th>
                        </tr>

                        <?php //On affiche les lignes du tableau une à une à l'aide d'une boucle
                        $sqlChauffeurs = 'SELECT * FROM structure';
                        $reponse = accesBdd()->query($sqlChauffeurs);
                       while($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
                       {
                       ?>
                           <tr>
                               <td data-label="Id"><?php echo $donnees['Id'];?></td>
                               <td data-label="Catégorie"><?php echo $donnees['Categorie'];?></td>
                               <td data-label="Nom"><?php echo $donnees['Nom'];?></td>
                               <td data-label="Adresse"><?php echo $donnees['Adresse'];?></td>
                               <td data-label="Téléphone"><?php echo $donnees['Telephone'];?></td>
                               <!--<td data-label="Mail"><?php //echo $donnees['Mail'];?></td>-->
                                <td data-label="Supprimer">
                                 <button onclick="actionDeleteS(<?php echo $donnees["Id"];?>);" title='Supprimer'><img src='img/croix.png' alt='Supprimer' /></button>
                               </td>
                           </tr>
                       <?php
                       } //fin de la boucle, le tableau contient toute la BDD
                    ?>
                   </table>
           </div>

           <div class="medium-6 cell" id="PageDroite">
             <h2> Ajout d'une nouvelle structure </h2>
                 <div id="AjoutStructure" >

                   <label>Catégorie</label>
                   <select name="categorie" id="categorie">
                     <option value="scene"> Scène </option>
                     <option value="aeroport"> Aéroport </option>
                     <option value="hotel"> Hôtel </option>
                     <option value="restaurant"> Restaurant </option>
                     <option value="divers"> Divers </option>
                   </select>

                   <label>Nom (obligatoire)</label>
                   <input type="text" name="nomStruct" id="nomStruct" placeholder="Nom de la Structure" size="4"/><br>

                   <label>Adresse</label>
                   <input type="text" name="adresseStruct" id="adresseStruct" placeholder="Adresse de la Structure" size="4"/><br>

                   <label>Téléphone</label>
                   <input type="text" name="telephoneStruct" id="telephoneStruct" placeholder="Téléphone de la Structure" size="4"/><br>

                   <!--<label>Mail</label>
                   <input type="text" name="mailStruct" id="mailStruct" placeholder="Mail de la Structure" size="4"/><br>-->

                   <button onclick="ajouterS();" name="valide">Valider</button>

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
             <script type="text/javascript">
               function actionDeleteC(id){
                 var xhttp = new XMLHttpRequest();
                 xhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                      console.log("no");
                   }
                 };
                 xhttp.open("GET", "./pages/supprimerChauffeurs.php" + "?Action=Suppression&id=" + id, true);
                 xhttp.send();
               }

               function actionDeleteG(id){
                 var xhttp = new XMLHttpRequest();
                 xhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                    console.log("no");
                   }
                 };
                 xhttp.open("GET", "./pages/supprimerGroupes.php" + "?Action=Suppression&id=" + id, true);
                 xhttp.send();
               }

               function actionDeleteS(id){
                 var xhttp = new XMLHttpRequest();
                 xhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                      console.log("no");
                   }
                 };
                 xhttp.open("GET", "./pages/supprimerStructures.php" + "?Action=Suppression&id=" + id, true);
                 xhttp.send();
               }

               function ajouterS(){
                 var xhttp = new XMLHttpRequest();
                 var nS = document.getElementById("nomStruct").value;
                 var adS =  document.getElementById("adresseStruct").value;
                 var telS =  document.getElementById("telephoneStruct").value;
                 var catS =  document.getElementById("categorie").value;
                 xhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                      console.log("no");
                   }
                 };
                 xhttp.open("GET", "./pages/ajouterStructures.php" + "?Action=AJouter&nomStruct="+nS + "&adresseStruct="+adS+"&telephoneStruct="+telS+"&categorie="+catS, true);
                 xhttp.send();
               }
             </script>

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
