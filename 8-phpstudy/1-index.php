<?php

// print_r($_GET);
if($_POST){
    echo "こんにちは、".$_POST['name']."さん";
}
?>

<p>お名前を入力してください：</p>
<form method="post">
    <input type="text" name="name">
    <input type="submit" value="送信する">
</form>