<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//echo "salut les gens";

class Car {
    public $color;
    public $model;
    public function __construct($color, $model){
        $this->color = $color;
        $this->model = $model;
    }
    private function message(){
        return "Ma voiture est de couleur " . $this->color . " " . "de marque " . $this ->color;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message();
    }


}

$myCar = new Car("red","Audi");

echo $myCar -> getMessage();


//phpinfo();

?>

<br>
<?php
$bmw = new Car("Black","Bmw");

echo $bmw ->getMessage()
?>
<br>


<?php
    $nom = "HAKOBYAN";
    $prenom = "Andrnaik";
    $age = 25;
?>
<h3>Bonjour je m'appelle <?php
    echo $nom . " " .$prenom;
    ?> j'ai <?php echo $age?> ans</h3>

<?php
echo var_dump($nom);
echo strlen($nom)
?>



</body>
</html>