<?php

function randomStatusColor($status){

    $color = [
        '0' => 'danger',
        '1' => 'info',
        '2'  => 'success',
    ];

    return $color[$status];
}

function statusName($stdName){

    $setName = [
        '0' => 'Panding',
        '1' => 'Processing',
        '2'  => 'Success',
    ];

    return $setName[$stdName];
}


?>