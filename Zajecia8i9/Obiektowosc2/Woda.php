<?php
class Woda extends Pokemon {
    function __construct($nazwa,$hp_max,$damage){
        parent::__construct( $nazwa,$hp_max,$damage);
        $this->rodzaj='Woda';
        $this->slabosc='Piorun';
        $this->odpornosc='Ogien';
    }

}
