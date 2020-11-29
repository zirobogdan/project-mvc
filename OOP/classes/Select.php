<?php 
class Select{
    private $name;
    private $options = [];
    private $selectedValue;
    private $attrs = [];

    public function __construct(string $n)
    {
        $this->name = $n;
        $this->selectedValue = $_REQUEST[$this->name] ?? null;
        $this->attrs = $a;
    }

    public function addOption($v, $t)
    {
        $this->options[$v] = $t;
        return $this;
    }

    public function __toString()
    {
        $attr = '';
        foreach($this->attrs as $key=>$value){
            $attr.="$key=\"$value\"";
        }
        $str = '<select name="' . $this->name . '" '.$attr.'>';
        foreach($this->options as $v => $t){
            $str.= "<option value=\"{$v}\" ". ($v == $this->selectedValue ? 'selected' : '') . ">{$t}</option>";
        }
        $str.='</select>';
        return $str;
    }

    public function getSelectedValue()
    {
        return $this->selectedValue;
    }
}

?>