<?php

function upploadImage(){
    $image_link ="";
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['avatar']) and $_FILES['avatar']['error'] == 0) {


        // Testons si le fichier n'est pas trop gros
        if ($_FILES['avatar']['size'] <= 1000000) {
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['avatar']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                // On peut valider le fichier et le stocker définitivement
                $image_link = 'uploads/' .uniqid()."-". basename($_FILES['avatar']['name']);
                setcookie("image", $image_link, time()+(3600*24));
                move_uploaded_file($_FILES['avatar']['tmp_name'], $image_link);
                echo "L'envoi a bien été effectué !";
                return true;
            } else {
                echo('J\'accepte que les images ...');
                return false;
            }
        } else {
            echo('le fichier est trop lourd pour un petit serveur ... ');
            return false;
        }
    }
}







?>