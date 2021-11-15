<?php

function stars(int $eval): void {
    for($i = 1; $i <= $eval; $i++) {
        echo '<i class="bi bi-star-fill"></i>';
    }
    // echo $i;
    for(; $i <= 5; $i++) {
        echo '<i class="bi bi-star"></i>';
    }
}

// Création du fonction de dump
function dump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}