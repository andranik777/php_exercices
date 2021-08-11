<?php
function deleteProduct($array,$elementPanier){
    $index =  $elementPanier;
    array_splice($array,$index);
    return $array;
}
?>