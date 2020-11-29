<?php
abstract class Div implements Element{
    protected $width;
    protected $height;

    private static $count = 0;
    const BORDER_COLOR = 'RED';

    public function __construct(int $w, int $h)
    {
        $this->width = $w;
        $this->height = $h;
        self::$count++;
    }

    public static function getCount(){
        return self::$count;
    }

    public function getStyle()
    {
        return "width: {$this->width}px; height: {$this->height}px; border: 1px ".self::BORDER_COLOR." solid;";
    }

    public function show(){
        echo '<div style="'. $this->getStyle() . '"></div>'; 
    }
    public function remove(){
        
    }
    abstract public function square();
}

