<?php
    if(!empty($_GET['page'])) {
        $page = $_GET['page'];
        if($page == '') { $require = './pages/formulaire.php'; }


        require($require);
    } else {
            require("./pages/acceuil.php");
        }
?>
