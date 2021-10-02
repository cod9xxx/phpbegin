<?php

$heroHealth = 100;
$shotgunHit = rand(30, 130);
$heroHealth -= $shotgunHit;

if($heroHealth < 0) {
    echo 'Вы убиты';
}
else {
    echo 'Вы выжили';
}

