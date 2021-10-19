<?php
function categoryChecker($reponse) {
    echo '<table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOM</th>
                <th scope="col">Description</th>


            </tr>
            </thead>
            <tbody>';
    while ($donnees = $reponse->fetch())
    {
        echo'<tr>
                  <td>'.$donnees["id"].'</td>
                  <td>'.$donnees["nom"].'</td>
                  <td>'.$donnees["description"].'</td>
             </tr>';
    }
    $reponse->closeCursor(); // Termine le traitement de la requête

    echo " </tbody>
        </table>";
}
?>