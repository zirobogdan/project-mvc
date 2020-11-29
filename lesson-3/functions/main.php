<?php 
    session_start();
    $page = cleanData($_GET['page'] ?? 'home');
    $action = cleanData($_POST['action'] ?? null);  // 'sendMessage'
    if(!empty($action)){
        $action();
    }

    function cleanData($data){
        return strip_tags(trim($data));
    }

    function sendMessage(){
        $email = cleanData($_POST['email'] ?? null);
        $message = cleanData($_POST['message'] ?? null);
        $errors = [];

        if(!$email || !$message){
            if(!$email){
                $errors['email'] = 'Email is required';
            }
            if(!$message){
                $errors['message'] = 'Message is required';
            }
            setMessage('danger',$errors);
        }
        else{
            mail('ziro.bogdan00@gmail.com', 'from site',"$email \n\r $message");
            setMessage('Success','Thank!');
        }

        redirect('contacts');
        
    }


    function redirect($page){
        header('Location: index.php?page=' . $page);
        exit();
    }

    function setMessage($type,$text){
        $_SESSION['message'] = compact('type','text');
        // $_SESSION['message'] = ['type'=>$type, 'text'=>$text]
    }

    function showMessage(){
        if( isset($_SESSION['message']) ){
            extract($_SESSION['message']);
            $text = is_array($text) ? implode('<br>',$text) : $text;
            echo "<div class='alert alert-{$type}'>{$text}</div>";
            unset( $_SESSION['message']);
        }
    }

    function checkInput($name){
        return ($_SESSION['message']['text'][$name]) ?? null;
    }

    function unsetMessage(){
        if( isset($_SESSION['message']))
        unset( $_SESSION['message']);
    }
 
 
    // $_SESSION['message']['text']['email']
    // $_SESSION['message'] = [
    //     'type'=>'danger',
    //     'text'=>[
    //         'email'=>'hhk',
    //         'mess'=>'gfg'
    //     ]
    // ]
   

    function dump($arr){
        echo '<pre>' . print_r($arr,true) . '</pre>';
    }

    function makeDir($path){
        if( !file_exists($path) ){
            mkdir($path);
        }
    }

    function uploadFile(){
        $file = $_FILES['file'];

        // dump($file);

        if($file['error']!=0){
            if($file['error'] == 4){
                setMessage('danger','File is required');
            }
            elseif($file['error'] == 1){
                setMessage('danger','File is too big');
            }
            elseif($file['error'] == 2){
                setMessage('danger','File is too big');
            }
            else{
                setMessage('danger','File is too big');
            }
        }
        else{
            $typeFiles=['image/gif','image/jpeg','image/png','image/webp'];
            if($file['size']>1024*1024*10){
                setMessage('danger','File is too big');
            }
            elseif( !in_array($file['type'],$typeFiles)){
                setMessage('danger','File must be image');
            }
            else{
                makeDir('images');//создаём папку
                $fName = time() . '_' . $file['name'];
                move_uploaded_file($file['tmp_name'],'images/' . $fName);
                resizeImage($fName,'images',$file['type']);
                setMessage('success','File uploaded!');
            }
       
        }

        redirect('uploads');
    }

    function resizeImage($fName,$dir,$type){
        $f = $dir . '/' . $fName;
        $type = explode('/',$type)[1];
        $imagecreate = 'imagecreatefrom' . $type;
        $src = $imagecreate($f);
        $size = 100;//ширина и высота нового изображения
        $w_src = imagesx($src); //ширина исходного изображения
        $h_src = imagesy($src);//высота

        //Создание квадратного изображения
        $size=100;
        $dest = imagecreatetruecolor($size,$size);
        if( $w_src > $h_src ){
            imagecopyresized($dest, $src, 0,0,($w_src - $h_src)/2,0, $size,$size,$h_src,$h_src);
        }
        else{
            imagecopyresized($dest, $src, 0,0,0,($h_src - $w_src)/2, $size,$size,$w_src,$w_src);
        }
        $imagesave = 'image' . $type;
        $imagesave($dest,  "{$dir}/{$size}x{$size}_{$fName}");
        imagedestroy($dest);

        //Создание уменьшенного изображения
        $w_dest = 200;
        $h_dest = $w_dest * $h_src / $w_src;
        $dest = imagecreatetruecolor($w_dest, $h_dest);
        imagecopyresized($dest,$src,0,0,0,0,$w_dest,$h_dest,$w_src,$h_src);

        imagejpeg($dest,"{$dir}/{$w_dest}_{$fName}");
        imagedestroy($dest);
        imagedestroy($src);
    }

    function saveReview(){
        $name = cleanData($_POST['name'] ?? null);
        $review = cleanData($_POST['review'] ?? null);
        $time = time();

        if(!$name || !$review){
            setMessage('danger','All fields required!');
        }
        else{
            $f = fopen('reviews.txt','a');
            fwrite($f, "$name|$review|$time\r\n");
            fclose($f);
        }
        redirect('reviews');
    }

function showReviews(){
    // $html = file_get_contents('http://google.com');
    // $f = fopen('reviews.txt','r');
    // if($f){
    //     $html = '';
    //     while(!feof($f)){
    //         $html .= fgetc($f);
    //     }
    //     echo $html;
    // }
    // fclose($f);
    $lines = file('reviews.txt');
    $lines = array_reverse($lines);

    $perPage = 2;
    $totalPages = ceil(count($lines) / $perPage);
    $p = $_GET['p'] ?? 0;

    for($i= $p * $perPage;($i< $p *$perPage + $perPage) && $i < count($lines);$i++){
        list($name, $review, $time) = explode('|',$lines[$i]);
        echo "<div class='border p-3 m-3'>";
        echo "{$name} <small>" . date('d.m.Y H:i',trim($time)). "</small> <hr> <bloquote>$review</bloquote>";
        echo "</div>";
    }

    //Пагинация
    echo '<nav><ul class="pagination">';
    for($i=0; $i<$totalPages;$i++){
        echo "<li class='page-item ".($p==$i?'active':'')."'><a class='page-link' href='index.php?page=reviews&p={$i}'>".($i+1)."</a></li>";
    }
    echo '</ul></nav>';
}
