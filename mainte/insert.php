<?php

function insertContact($request){
require 'db_connection.php';

$params = [
    'id' => null,
    'your_name' => $request['your_name'],
    'email' => $request['email'],
    'url' => $request['url'],
    'gender' => $request['gender'],
    'age' => $request['age'],
    'contact' => $request['contact'],
    'created_at' => null
];

$count = 0;
$columns = '';
$values = '';

foreach(array_keys($params) as $key){
    if($count++>0){
        $columns .= ',';
        $values .= ',';  //.と間違えないように
    }
    $columns .= $key;
    $values .= ':'.$key;
}

$sql = 'insert into Contacts ('. $columns .')values('. $values .')';

var_dump($sql);

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

}