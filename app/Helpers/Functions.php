<?php

function randomStatusColor($status){

    $color = [
        'success' => 'success',
        'pending' => 'danger',
        'done'  => 'info',
        'shipped' => 'warning',
        
       
    ];

    return $color[$status];
}


?>