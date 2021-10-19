<?php
function passwordValid($element){
    $rep = preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$_POST["password"]);
    if($rep ==0){
        return false;
    }
    else{
        return true;
    }
}
?>