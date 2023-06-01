<?php
class hinhchunhat{
    public $dai;
    public $rong;

    public function __construct($ts_dai,$ts_rong){
        $this->dai = $ts_dai;
        $this->rong = $ts_rong;
    }

    public function getDai(){
        return $this->dai;
    }
  
    public function setDai($ts_dai){
        $this->dai = $ts_dai;
    }
    public function getRong(){
        return $this->rong;
    }
  
    public function setRong($ts_rong){
        $this->rong = $ts_rong;
    }

    public function getChuvi(){
        return ($this->dai + $this->rong)*2;
    }
    public function getDientich(){
        return $this->dai * $this->rong;
    }
}
$HCN = new hinhchunhat(30,20);

$HCN -> setDai(2);
$HCN -> setRong(1);

echo $HCN -> getChuvi();
echo '<br>';
echo $HCN -> getDientich();


