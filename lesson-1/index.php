<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

    <?php
        $name = 'Katya';
        $age = 25;
        $email = 'katya@gmail.com';

        $ar = compact('name','age','email');
        // $ar = ['name'=>$name , 'age'=>$age, 'email'=>$email];
        f($ar);
        echo '<pre>' . print_r($ar, true) . '</pre>';

      
        function f($data){
            extract($data);
            echo $name . ' from function <br>';
            // echo $data['name'] . ' from function <br>';
        }
        	

        /* function test($a){
            $a++;
            return $a; 
        }
        $age = test($age); */
        
        /* function test(){
            global $age;
            $age++;
        }
        test(); */
        
        function test(&$a){
            $a++;
        }

        Test($age);
        echo $age . ' после функции <br>';


        echo '<hr>';
        $a = 10;
        $b = $a;
        $a++;
        echo $b;

        function hello(){
            echo'HELLO!';
        }
        
        $func = 'hello';
        $func();
    ?>




        <hr>


    <?php 
        $name = 'Vasya';
        $age = intval('20 years');
        echo is_numeric($age) ? 'ok' : 'error';
        echo '<br>';

        echo 'Hello, ' . $name . '<br>';//точка обозначает конкатинацию(ПЛЮС)
        echo "Hello, $name <br>";
        echo "Age: {$age}years <br>";

        define('ROLE','loh');//КОНСТАНТА
        echo $name .'-'. ROLE . '<br>';

        if(isset($email))
        echo $email;
        else
            echo 'No email';

        echo '<br>';

        echo isset($email) ? $email : 'No email';
        echo '<br>';
        var_dump($name);
        echo '<br>';
    ?>
    

    <h1><?= $name ?></h1>
    <h1><?= $name.', '.$age ?></h1>
    <h1><?=$age > 18 ? 'ok' : 'no' ?></h1>

    <?php
         if(ROLE=='admin'){
    ?>
        <p>Много HTML для админа</p>
    <?php     
        }
        else{
    ?>
        <p>Много HTML для НЕ админа</p>
    <?php
        }
    ?>

    <?php if(ROLE=='admin'): ?>
        <p>Много HTML для админа</p>
    <?php else: ?>
        <p>Много HTML для НЕ админа</p>
    <?php endif ?>

    <?php
        $users = ['Petya', 'Vasya', 'Kolya'];
        $users[] = 'Katya';
        // unset($users[1]);
        
        array_splice($users, 1, 1);
        echo count($users) . '<br>';//кол-во элементов в массиве
        var_dump( is_array($name));
        echo '<br>';
        echo implode(', ', $users);
        echo '<ol><li>' . implode('</li><li>',$users) . '</li></ol>';
        
        echo '<pre>' . print_r($users,true) . '</pre>';//вывод массива

        $user = 'Vasya Pupkin';
        $dataUser = explode(' ', $user);//разбиваем строку на элементы массива
        echo '<pre>' . print_r($dataUser,true) . '</pre>';

        list($firstname, $lastname) = $dataUser;//создаём переменные и инициализируем их элементами массива
        echo $firstname;

        list(,, $year) = explode('.','23.11.2020');
        echo $year;
        echo '<br>'; 

        $countries = [
            'USA'     => 252,
            'Ukraine' => 37,
            'Austria' => 22,
            'Romania' => 26,
        ];

        ksort($countries);

        echo '<pre>' . print_r($countries, true) . '</pre>';

        foreach($countries as $country => $population){
            echo "$country: $population mln <br>";
        }

 
        $files = ['pic2.jpg','pic1.jpg','pic3.jpg','pic10.jpg',];
        natsort($files);
        echo '<pre>' . print_r($files, true) . '</pre>';

        $cart = [
            [
                'name' => 'Headphones',
                'price'=>  210,
                'img'  => '1.jpg',
                'qty'  =>  2
            ],
            [
                'name' => 'Case',
                'price'=>  150,
                'img'  => '2.jpg',
                'qty'  =>  5
            ],
            [
                'name' => 'Comp',
                'price'=>  2000,
                'img'  => '3.jpg',
                'qty'  =>  1
            ],
        ];

    ?>

    <table class="table">
        <thead class="thead-dark"
>
            <tr>
                <th>#</th>
                <th>Img</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sum</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cart as $index => $product): ?>
            <tr>
                <td><?= $index+1 ?></td>
                <td> <img src="images/<?= $product['img'] ?>" style = "width:100px">  </td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['qty'] ?></td>
                <td><?= $product['qty']* $product['price'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>



</body>
</html>