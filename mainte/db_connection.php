<?php

const DB_HOST = 'mysql:dbname=contact_test;host=localhost;charset=utf8';
const DB_USER = 'yoshi';
const DB_PASSWORD = 'yotti1192';

//変更する
$pdo = new PDO(DB_HOST,DB_USER,DB_PASSWORD);


try{
    $pdo = new PDO(DB_HOST,DB_USER,DB_PASSWORD,[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//必須
        PDO::ATTR_EMULATE_PREPARES => false, //SQLインジェクション対策 SQL文改案されない為に
    ]);
echo '接続完了';
} catch(PDOException $e){
    echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}
