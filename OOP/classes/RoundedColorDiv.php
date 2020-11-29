<?php
class RoundedColorDiv extends ColorDiv{
    protected $radius;

    public function __construct(int $w,int $h, string $bg , int $r)
    {
        parent::__construct($w, $h, $bg);
        $this->radius = $r;
    }

    public function getStyle()
    {
        return parent::getStyle() . "; border-radius: {$this->radius}px";
    }
}