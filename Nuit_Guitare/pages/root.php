<?php
    if(!empty($_GET['page'])) {
        $page = $_GET['page'];
        if($page == 'register') { $require = './pages/register.php'; }
        if($page == 'characters') { $require = './pages/characters.php'; }
        if($page == 'view') { $require = './pages/view.php'; }
        if($page == 'create') { $require = './php/PageCreatAffichage.php'; }

        require($require);
    } else {
            require("./pages/acceuil.php");
        }
?>
