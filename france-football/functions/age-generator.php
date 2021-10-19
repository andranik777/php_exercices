<?php

function getAge($birth_date){
    $date1 = date_create(date("Y-m-d"));
    $date2 = date_create($birth_date);
    return date_diff($date1, $date2)->format('%y');
}

?>