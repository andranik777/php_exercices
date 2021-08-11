<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("public/global-stylesheets.php ");?>

</head>
<body>

<?php
include("composant/navbar.php")
?>





<?php
$produit = [
    ["titre" =>"pantalon",
        "description"=> "Notre marque de fabrique fait peau neuve : un style workwear, une coupe carotte intemporelle et féminine, une ceinture large",
        "prix" => "27.80",
        "image" =>"img/pantalon-femme.jpeg"
    ],
    ["titre" =>"jupe",
        "description"=> "Notre marque de fabrique fait peau neuve : un style workwear, une coupe carotte intemporelle et féminine, une ceinture large",
        "prix" => "35",
        "image" =>"img/jupe-femme.jpeg"

    ],    ["titre" => "short homme",
        "description"=> "Notre marque de fabrique fait peau neuve : un style workwear",
        "prix" => "50",
        "image" =>"img/short-homme.jpg"

    ],

];

foreach ($produit as $item){
   include("composant/ mignature-product.php ");

}

?>
<?php
include("composant/footer.php");
include ("public/global-scripts.php");

?>
</body>
</html>