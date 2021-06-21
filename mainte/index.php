<?php

require 'db_connection.php';

//$sql = 'select * from contacts where id = 1';
//$stmt = $pdo->query($sql);

//$result = $stmt->fetchall();

//echo '<pre>';
//var_dump($result);
//echo '</pre>';
//
$sql = 'select * from contacts where id = :id'; //プレースホルダ
$stmt = $pdo->prepare($sql);//プリペアードステートメント
$stmt->bindValue('id',1,PDO::PARAM_INT);//紐付け
$stmt->execute();

$result = $stmt->fetchall();

echo '<pre>';
var_dump($result);
echo '</pre>';

$pdo->beginTransaction();

try{

$stmt = $pdo->prepare($sql);//プリペアードステートメント
$stmt->bindValue('id',1,PDO::PARAM_INT);//紐付け
$stmt->execute();

$pdo->commit();

}catch(PDOException $e){

    $pdo->rollBack();
}


