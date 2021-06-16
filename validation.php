<?php

function validation($request){}

 $errors = [];

 if(empty($request['email'])){
     $errors[] = 'メールアドレスの入力は必須です！';
 }

 return $errors;

?>