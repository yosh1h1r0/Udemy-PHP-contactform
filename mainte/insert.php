<?php

require 'db_connection.php';

$params = [
    'id' => null,
    'your_name' => 'yama',
    'email' => 'tes@test.com',
    'url' => 'https://test.com',
    'gender' => '1',
    'age' => '3',
    'contact' => 'こんにち！',
    'create_at' => null
];

$count = 0;
$columns = '';
$values = '';

foreach(array_keys($params) as $key){
    if($count++>0){
        $columns .= ',';
        $values .= '.';
    }
    $columns .= $key;
    $values .= ':'.$key;
}

$sql = 'insert into contacts(?,?,?,?,?,?,?,?,)values('. $values .')';

var_dump($sql);

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

//$sql = 'insert into contacts(id,your_name,email,url,gender,age,contact,create_at)
//        values(id,your_name,email,url,gender,age,contact,create_at)';