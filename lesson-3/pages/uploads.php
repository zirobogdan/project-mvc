<h1>Uploads</h1>
<?php showMessage() ?>
<form action="index.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    <input type="file" name="file">
    <input type="hidden" name="action" value="uploadFile">
    <button class="btn btn-primary">SEND</button>
</form>

<?php

// $files = glob('images/*.{jpg,png,gif,jpeg}', GLOB_BRACE);
// dump($files);

// $files = scandir('images');

// foreach($files as $file){
//     if($file != '.' && $file != '..' && !is_dir("images/$file"))
//     echo "<img src='images/$file'>";
// }

$handle = opendir('images');

while( ($file = readdir($handle)) !== false){
    if($false !='.' && $file !='..' && !is_dir("images/$file"))
    echo "<img src='images/$file'>";
}

?>