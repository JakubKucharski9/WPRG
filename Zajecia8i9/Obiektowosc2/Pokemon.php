<?php
class Pokemon{
    public $nazwa;
    public $rodzaj;
    public $hp_max;
    public $hp_aktualne;
    public $damage;
    public $slabosc;
    public $odpornosc;
    public function getName(){
        return $this->nazwa;
    }
    public function getDmgGiven(){
        return $this->damage;
    }
    public function __construct($nazwa,$hp_max,$damage){
        $this->nazwa=$nazwa;
        $this->hp_aktualne=$hp_max;
        $this->damage=$damage;
    }
    public function atak(Pokemon $przeciwnik){
        if($przeciwnik ->rodzaj ==$this->slabosc){
            $dmg=$this->damage+10;
            $przeciwnik->hp_aktualne-=$dmg;
        }
        elseif($przeciwnik ->rodzaj ==$this->odpornosc){
            $dmg=$this->damage-10;
            $przeciwnik->hp_aktualne-=$dmg;
        }
    }
}