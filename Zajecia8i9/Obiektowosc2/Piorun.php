<?php
class Piorun extends Pokemon {
    function __construct($nazwa,$hp_max,$damage){
        parent::__construct( $nazwa,$hp_max,$damage);
        $this->rodzaj='Piorun';
        $this->slabosc='Ogien';
        $this->odpornosc='Woda';
    }
}
