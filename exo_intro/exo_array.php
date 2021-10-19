<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$adressesMail = [
    'aureliendelorme1@gmail.com',
    'smithcrank@gmail.com',
    '148547@supinfo.com',
    'aurelien.delorme@orange.fr',
    'test@yahoo.com',
    'bonjour@msn.com',
    'adelorme@humanbooster.com',
    'test@yahoo.com',
    'test@yahoo.com',

];

function addressIndex($arr){

    $newArr = [];
    $finalArr =[];
    $count =0;
    $pourcent = 0;

    foreach ($arr as $val){
        $mail = explode( '@', $val );
        array_push($newArr, $mail[1]);
    }

    $uniqArr = array_unique($newArr);

    foreach ($uniqArr as $elem){
         $count=0;
                foreach ($newArr as $item){
                    if($elem == $item ){
                        $count++;
                    }
            }

        $pourcent = round($count/count($arr)*100,2) ;
        array_push($finalArr,[$elem,$count,$pourcent]);

    }

    arsort($finalArr);


    return $finalArr;
}
$elo = addressIndex($adressesMail);

foreach ($elo as $arr){
    foreach ($arr as $key=>$value){
        echo $value;
        echo "<br>";
    }
}

var_dump($elo);
?>
</body>
</html>

