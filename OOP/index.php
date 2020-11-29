<?php
require 'classes/Point.php';
require 'classes/Money.php';
require 'classes/Select.php';
require 'classes/Div.php';
require 'classes/ColorDiv.php';
require 'classes/RoundedColorDiv.php';

$p1 = new Point;
$p1->x = 10;
$p1->y = 20;

// echo $p1->x . ' ' . $p1->y . '<br>';
$p1->info();

$p2 = new Point;
$p2->info();

$fly = new Money(3000, 50);
echo $fly->setGrn(2000)->setKop(90);
$bus = new Money(300, 60);
$taxi = new Money(50,60);

$summa = $fly->add($bus)->add($taxi);
echo $summa;

$discount = new Money(10,20);
$total = $summa->reduce($discount);
echo $total;

$m = new Select('month', ['style'=>'padding: 10px; color:red', 'class'=>'form-control']);
$m->addOption(0,'JAN');
$m->addOption(1,'FEB');
$m->addOption(2,'MAR');
$m->addOption(3,'APR');
$m->addOption(4,'MAY');

$y = new Select('year');
for($i = 1950; $i < date('Y'); $i++){
    $y->addOption($i, $i);
}

echo $m->getSelectedValue() . '<br>';
echo $y->getSelectedValue() . '<br>';

?>

<form action="index.php" method="POST">
    <div> Month: <?= $m ?></div>
    <div> Year: <?= $y ?></div>
    <button>Send</button>
</form>

<?php
// $div = new Div(50,50);
// $div->show();


$colorDiv = new ColorDiv(50,50,'#f90');
$colorDiv->show();

$rColorDiv = new RoundedColorDiv(50,50, '#0ff', 20);
$rColorDiv->show();

echo Div::getCount();

echo Div::BORDER_COLOR;
