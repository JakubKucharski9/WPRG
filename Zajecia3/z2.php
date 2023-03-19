<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $liczba=$_POST['liczba'];
    if(filter_var($liczba, FILTER_VALIDATE_INT) && $liczba>0){
        print lp($liczba);
    }
}
function lp($a){
    $d=0;
    $i=0;
    for ($f=2;$f<=sqrt($a);$f++){
        if($a%$f==0){
            $d++;
        }
        $i++;
    }
    if($d!=0){
        return "Liczba ".$a." nie jest liczbą pierwszą, iteracji: ".$i;
    }
    else return "Liczba ".$a." jest liczbą pierwszą, iteracji: ".$i;

}