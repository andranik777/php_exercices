<?php
    function CheckUser(){
        session_start();
        if(!isset($_SESSION["user"])){
            header("Location:login.php");
        }

    }


    function connectUser(){
        $nom = $email = $prenom ="";
        session_start();
        $email = $_SESSION["email"];
        $nom = $_SESSION["nom"];
        $prenom = $_SESSION["prenom"];

    }
?>