<?php
class Money{
    private $grn;
    private $kop;

    public function __construct(int $g,int $k)
    {
        $this->grn = $k >=100 ? ++$g : ($k < 0 ? --$g :$g);
        $this->kop = $k >=100 ? $k %100 : ( $k < 0 ? 100 + $k : $k);
    }
    public function __toString()
    {
        return $this->grn . ' грн ' . $this->kop . ' коп <br>';
    }
    public function setGrn($g)
    {
        $this->grn = $g;
        return $this;
    }
    public function setKop(int $k)
    {
        $this->kop = $k;
        return $this;
    }
    public function add(Money $obj)
    {
        //if ($obj instanceof Money)
        return new Money( $this->grn + $obj->grn, $this->kop + $obj->kop);
    }
    public function reduce(Money $obj)
    {
        $g = $this->grn - $obj->grn;
        $k = $this->kop - $obj->kop;
        if($k<0){
            $g--;
            $k+=100;
        }
        return new Money( $this->grn - $obj->grn, $this->kop - $obj->kop);
    }
}