<?php

function randomStatusColor($status){

    $color = [
        'success' => 'success',
        'pending' => 'danger',
        'return'  => 'info',
        'shipped' => 'warning',
       
    ];

    return $color[$status];
}


?>