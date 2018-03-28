<?php

// mail()
// $emailTo = "rob@percival.com";
$emailTo = "";
$subject = "コースの修了証について";
$body = "修了証の出力方法を教えてください";
$headers = "";

if(mail($emailTo, $subject, $body, $headers)){
    echo "送信に成功しました！";
} else {
    echo "送信に失敗しました！";
}

?>

