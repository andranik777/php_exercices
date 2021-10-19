<?php
if(isset($errors)){
    foreach ($errors as $error){
        echo('<small id="emailHelp" class="form-text text-muted">'.$error.'</small>');
    }
}
?>