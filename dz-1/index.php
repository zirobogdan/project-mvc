<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <?php 
    $links = [
        'Google' => 'http://google.com',
        'Facebook' => 'http://facebook.com',
        'Twitter' => 'http://twitter.com',
        'Amazon' => 'http://amazon.com'
    ];
    ?>
    
    <nav class="navbar navbar-dark bg-dark">
    <a href=<?= $links['Google']?>>Google</a> 
    <a href=<?= $links['Facebook']?>>Facebook</a> 
    <a href=<?= $links['Twitter']?>>Twitter</a> 
    <a href=<?= $links['Amazon']?>>Amazon</a> 
    </nav>

    <?php 
    $links = [
        'Home'      => 'http://site.ua',
        'Shop'      => [
            'Woman' => 'http://site.ua/woman',
            'Man' => 'http://site.ua/man',
            'Children' => 'http://site.ua/children',
        ],
        'Contacts'   => 'http://site.ua/contacts',
    ];
    ?>
    
    <nav class="menu">
    <ul>
        <li>
            <a href=<?=$links['Home']?>>Home</a>
        </li>
        <li>
            <span class = "shop"> <a href=<?=$links['Home']?>>Shop</a> </span>
            <ul>
                <li><a href=<?=$links['Shop']['Woman']?>>Woman</a></li>
                <li><a href=<?=$links['Shop']['Man']?>>Man</a></li>
                <li><a href=<?=$links['Shop']['Children']?>>Children</a></li>
            </ul>
        </li>
        <li>
            <a href=<?= $links['Contacts']?>>Contacts</a>
        </li>
    </ul>
</nav>

<?php
  
  ?>


</body>
</html>