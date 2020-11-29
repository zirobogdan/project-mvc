<?php
class ColorDiv extends Div{
    protected $bg;

    public function __construct(int $w,int $h,string $bg)
    {
        // $this->width = $w;
        // $this->height = $h;
        parent::__construct($w, $h);
        $this->bg = $bg;
    }

    public function getStyle()
    {
        return "width: {$this->width}px; height: {$this->height}px; border: 1px #000 solid; background : {$this->bg}";
    }
    public function square(){

    }
}