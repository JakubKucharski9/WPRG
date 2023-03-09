<?php
$rodzaj='trap';
$a=3;
$b=5;
$h=39;

function pole($rodzaj, $a, $b, $h){
    switch ($rodzaj){
        case 'prost': return prost($a,$b); break;
        case 'troj': return troj($a,$h); break;
        case 'trap': return trap($a,$b,$h); break;
    }
}
function prost($a, $b){
    return $a*$b;
}
function troj($a,$h){
    return $a*$h/2;
}
function trap($a,$b,$h){
    return ($a+$b)*$h/2;
}

echo pole($rodzaj,$a,$b,$h);