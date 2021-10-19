<?php
function displayFootballor($reponse) {
    session_start();

    include "functions/age-generator.php";


    while ($donnees = $reponse->fetch())

    {

        echo '<div class="card text-center" style="width: 18rem;margin-right: 3rem; margin-top: 3rem">';

        echo ' <div class="card-body">
        <p>Joueur: '.$donnees["nom"]. ' '.$donnees["prenom"]. '</p>
        <p>Date de naissance: '.getAge($donnees["date_naissance"]).' ans</p>
        <p>Poste: '.$donnees["poste"].'</p>';

        if(isset($_SESSION["email"])){

            if($_SESSION["email"] == "ddechamps"){
                echo '<form action="footballor-update.php " method="post">
                         <input name="id" value='.$donnees["id"].' hidden>
                        <input name="nom" value='.$donnees["nom"].' hidden>
                        <input name="prenom" value='.$donnees["prenom"].' hidden>
                        <input name="date_naissance" value='.$donnees["date_naissance"].' hidden>
                        <input name="poste" value='.$donnees["poste"].' hidden>
                        <input type="submit" value="Modifier" class="btn btn-warning">
                    </form>
            <a href="footballor-delate.php?id='.$donnees["id"].'" class="btn btn-danger mt-3"> Supprimer</a>';
            }
        }
        echo "  </div>
         </div>";
    }
    $reponse->closeCursor(); // Termine le traitement de la requête

}


?>
