<?php

function GetMode(){
    if (isset($_GET["mode"])) {
        $color = $_GET["mode"];
        return  $color;
    }

}

function SetMode($color){
    if (isset($_GET["mode"])) {
        setcookie("mode", $color, time() + 3600);
    }
}

?>