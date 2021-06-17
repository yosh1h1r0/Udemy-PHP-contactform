<?php

function validation($request){

 $errors = [];

 if(empty($request['email']) || !filter_var($request, FILTER_VALIDATE_EMAIL)){
     $errors[] = '「メールアドレス」の入力をして下さい';
 } 

 if(!empty($request['url'])) {
     if(!filter_var($request['url'], FILTER_VALIDATE_URL))
     $errors[] = '「ホームページ」は正しいURLを入力して下さい';
 }

 if(empty($request['password']) || 8 <mb_strlen($request['password'])){
    $errors[] = '「8文字以上のパスワード」を入力して下さい';
}

if(!isset($request['gender'])){
    $errors[] = '「性別」を選択して下さい';
}

if(empty($request['age']) || 6 < $request['age']){
    $errors[] = '「年齢」を選択して下さい';
}

if(empty($request['contact']) || 200 <mb_strlen($request['contact'])){
    $errors[] = '「問い合わせ内容」の入力又は、入力文字数は200文字以内で入力して下さい。';
}
if(empty($request['caution'])){
    $errors[] = '「注意事項」にチェックを入れて下さい';
}


 return $errors;

}
?>