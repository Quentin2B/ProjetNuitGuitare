<?php
require_once("./pages/db.php");
    if(!empty($_GET['page'])) {
        $page = $_GET['page'];

        if($page == 'formulairefill') {
          $require = './pages/formulaireRemplir.php';
        }
        elseif($page == 'formulaireConsult')
            {
                $require = './pages/formulaireConsult.php';
            }
        elseif($page == 'DataBaseUpdate')
            {
                    $require = './pages/DataBaseUpdate.php' ;
            }
        else {
          $require = './pages/acceuil.php';
        }
        require($require);
    }


    else {
            require("./pages/acceuil.php");
        }
?>
