<?php
class Point{
    public $x = 0;
    public $y = 0;

    public function  __construct($a = 0, $b = 0)
    {
        $this->setX($a);
        $this->y = $b;
    }
    
    public function info()
    {
        echo $this->x . ':' . $this->y . '<br>';
    }

    public function setX($x)
    {
        if( is_numeric($x)){
            $this->x = $x;
        }
        else{
            die('Value must be numeric');
        }
    }
    public function getX()
    {
        return $this->x;
    }
}

/*Инкапсуляция - скрытие внутренней реализации от других компонентов. Например, доступ к скрытой переменной может предоставляться не напрямую, а с помощью методов для чтения (геттер) и изменения (сеттер) её значения.
    Спецификаторы:
        public - свойство или метод доступны за пределами класса
        private - свойство или метод не доступны за пределами класса
        protected - свойство или метод не доступны за пределами классаБно доступны в класса-наследниках*/