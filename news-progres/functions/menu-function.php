<?php
    function displayMenu($array){
       foreach ($array as $element){
          echo '<a class="nav-item nav-link " href="'.$element["url"].'">'.$element["nom"] .'</a>';

       }
    }
?>