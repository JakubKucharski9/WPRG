<?php
class Walka{
    public $poke1;
    public $poke2;
    public function __construct($poke1,$poke2)
    {
        $this->poke1=$poke1;
        $this->poke2=$poke2;
    }

    public function go(){
        while($this->poke1->hp_aktualne >0 && $this->poke2->hp_aktualne >0 ){
            $p1=$this->poke1->nazwa;
            $p2=$this->poke2->nazwa;

            $temp1=$this->poke2->hp_aktualne;
            $this->poke1->atak($this->poke2);
            $dmg1=$temp1-$this->poke2->hp_aktualne;
            if($this->poke2->hp_aktualne<0){
                echo "$p2 dostal $dmg1 od $p1\n";
                echo "$p1 wygral";
                return false;
            }
            echo "$p2 dostal $dmg1 od $p1\n";


            $temp2=$this->poke1->hp_aktualne;
            $this->poke2->atak($this->poke1);
            $dmg2=$temp2-$this->poke1->hp_aktualne;
            if($this->poke1->hp_aktualne<0){
                echo "$p1 dostal $dmg2 od $p2\n";
                echo "$p2 wygral";
                return false;
            }
            echo "$p1 dostal $dmg2 od $p2\n";
        }
    }
}
