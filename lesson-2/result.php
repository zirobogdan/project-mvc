<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // $firstname = isset( $_GET['firstname'] ) ? $_GET['firstname'] : 'anonim';
    $firstname = $_GET['firstname'] ?? 'anonim';
    // echo htmlspecialchars($firstname) . '<br>' ; //выводит теги
    $color = $_GET['agree'] ?? 'red';
    echo '<span style = "color: '.$color.'">' . strip_tags($firstname) . '</span><br>'; //удаление тегов

    $langs= array_map('strip_tags',($_GET['langs'] ?? []) );
    $bg = $_GET['bg'] ?? '';
    echo "<div style='background:$bg'>";
    echo implode(',',$langs) . '<br>';
    echo '</div>'
    ?>


</body>
</html>