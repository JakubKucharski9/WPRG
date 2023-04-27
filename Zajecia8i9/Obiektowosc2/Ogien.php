<?php
class Ogien extends Pokemon {
    function __construct($nazwa,$hp_max,$damage){
        parent::__construct( $nazwa,$hp_max,$damage);
        $this->rodzaj='Ogien';
        $this->slabosc='Woda';
        $this->odpornosc='Piorun';
    }

}
