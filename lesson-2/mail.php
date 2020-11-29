<?php
$name = strip_tags($_POST['name'] ?? null);
$email = strip_tags($_POST['email'] ?? null);
$message = strip_tags($_POST['message'] ?? null);

if ( !$name || !$email || !$message){
    header('Location: index.php?error=1');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    


    $mess = "<strong>Name:</strong>$name,<br>\n\rEmail:$email,<br>\n\r$message";
    $to = 'ziro.bogdan00@gmail.com';
    $subject = 'Mail from site';
    $headers = 'Content-type: text/html; charset=utf-8';

    if( mail($to, $subject, $mess) ){
        echo 'Thank!';
    }
    else{
        echo 'Error!Try again.';
    };
    ?>
</body>
</html>