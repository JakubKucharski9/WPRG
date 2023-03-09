<?php
$zdanie='ruskie pierogi';
$nie=['ruskie','rusek','ruska'];
function cenzura($zdanie, $nie){

    $cen=str_replace($nie,'*****',$zdanie);
    return $cen;
}
echo cenzura($zdanie, $nie);