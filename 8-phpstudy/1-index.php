<?php

// print_r($_GET);
echo "こんにちは、".$_GET['name']."さん"

?>

<p>お名前を入力してください：</p>
<form>
    <input type="text" name="name">
    <input type="submit" value="送信する">
</form>