<?php
    if(!empty($_GET['page'])) {
        $page = $_GET['page'];
        
        if($page == 'formulairefill') { $require = './pages/formulaireRemplir.php'; }


        require($require);
    } else {
            require("./pages/acceuil.php");
        }
?>
