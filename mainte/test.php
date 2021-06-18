<?php

  $contactFile = '.contact.dat';
//
//    //ファイルを丸ごと読み込み
//    $fileContents = file_get_contents($contactFile);
//
//    //echo $fileContents;
//
//    //ファイルに書き込み（上書きする）
//    //file_put_contents($contactFile,'テステス');
//
//    //$addtext = 'チェクチェク' . "\n";
//
//    //ファイルに書き込み(追加する)
//    //file_put_contents($contactFile,$addtext,FILE_APPEND);
//
//    $allData = file($contactFile);
//
//    foreach($allData as $lineData){
//        $lines = explode(',', $lineData);
//        echo $lines[0]. '<br>';
//        echo $lines[1]. '<br>';
//        echo $lines[2]. '<br>';
//        echo $lines[3]. '<br>';
//}

$contents = fopen($contactFile, 'a+');

$addtext = '１行追記' . "\n";

fwrite($contents,$addtext);

fclose($contents);


