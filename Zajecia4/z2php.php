<?php
$podStrony=array(
    array('nazwa'=>'Menu', 'link'=>'menu','tresc'=>''),
    array('nazwa'=>'O nas', 'link'=>'onas','tresc'=>'Witaj nas stronie'),
    array('nazwa'=>'Regulamin', 'link'=>'regulamin','tresc'=>'Regulamin strony to: '),
    array('nazwa'=>'Kontakt', 'link'=>'kontakt','tresc'=>'Numer telefonu: 123 456 789')
);
foreach ($podStrony as $pod){
    echo "<a href='z2php.php?link={$pod['link']}'>{$pod['nazwa']}</a><br>";
}
if(isset($_GET['link'])){
    $wybrana=null;
    foreach ($podStrony as $pod){
        if($pod['link']==$_GET['link']){
            $wybrana=$pod;
            break;
        }
    }

    if($wybrana!=null){
        echo '<br>'.'<title>'.$wybrana['nazwa'].'</title>';
        echo $wybrana['tresc'];
    }else {
        echo '<br>'.'Wybrana podstrona nie istnieje';
    }
}else echo '<br>'.'Wybierz podstronę z menu';




