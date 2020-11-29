<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
<?php 
$errors = [];
$name = strip_tags($_POST['name'] ?? null);
$gender = strip_tags($_POST['gender'] ?? null);
$langs = array_map('strip_tags',$_POST['langs'] ?? []);

if( count($_POST) != 0){
if( !$name){
    $errors['name'] = 'Name is required';
}
elseif( strlen($name) < 2){
    $errors['name'] = 'Name too short';
}
}

$countErrors = count($errors);
if($countErrors > 0 ){
    echo'<div style="color:red">' . implode('<br>',$errors) . '</div>';
}
?>

<form action="index.php" method="POST">
    <input type="text" name="name" value="<?php if($countErrors ) echo $name; ?>"> <br>

    <input type="radio" name="gender" value="male" <?php if (( $countErrors && $gender =='male') || count($_POST)==0) echo 'checked' ?>> Male <br>
    <input type="radio" name="gender" value="female"<?php if( $countErrors && $gender =='female') echo 'checked' ?>> Female <br>


    <select name="langs[]" id="" multiple>
        <option value="ru" <?= ($countErrors && in_array('ru',$langs) )? 'selected':''?>>rus</option>
        <option value="ua" <?= ($countErrors && in_array('ua',$langs) )? 'selected':''?>>ukr</option>
        <option value="en" <?= ($countErrors && in_array('en',$langs) )? 'selected':''?>>eng</option>
    </select>

    <button>Send</button>
</form>











<?php 
    if(isset( $_GET['error'])){
        echo 'Form invalid';
    }
?>



<form action="mail.php" method="POST">
    <input type="text" name="name"> <br>
    <input type="email" name="email"> <br>
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <br>
    <button>Send</button>
</form>


<a href="result.php?firstname=Katya">Katya</a>

<form action="result.php">
    <input type="text" name="firstname"> <br>
    <input type="checkbox" name="agree" value="green">Agree <br>

    <p>Languages:</p>
    <input type="checkbox" name="langs[]" value="ukr">Ukr<br>
    <input type="checkbox" name="langs[]" value="ru">Rus<br>
    <input type="checkbox" name="langs[]" value="en">Eng<br>

    <select name="bg" id="">
        <option value="#f00">red</option>
        <option value="#0f0">green</option>
        <option value="#00f">blue</option>
    </select>

    <button>Send</button>
    </form>
</body>
</html>