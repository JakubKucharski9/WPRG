<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data1=$_POST['zakres1'];
    $data2=$_POST['zakres2'];
    $osob=$_POST['los'];
    $kraj=$_POST['kraj'];
    if($data1>$data2){
        echo 'Data startu jest po dacie zakończenia';
    }else{
        $tab=array(
            "Turcja"=>400,
            "Bulgaria"=>450,
            "Grecja"=>500,
            "Maroko"=>550
        );
        $datetime1=new DateTime($data1);
        $datetime2=new DateTime($data2);
        $roznica = $datetime1->diff($datetime2);
        $dni_pobytu = $roznica->format('%a');
        $cena=$dni_pobytu*$tab[$kraj]*$osob;
        echo $cena;
    }


}
