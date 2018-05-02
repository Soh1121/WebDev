<? php
    $to = $_GET['to'];
    $subject = $_GET['subject'];
    $message = $_GET['message'];
    // 【header】Fromは必須。Reply-Toは返信先。X-Mailerはメーラーの種類。
    $headers = 'From: '.$_GET['from'] . "\r\n" .
        'Reply-To: '.$_GET['from'] . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    // 【mail関数】メールの送信に成功すればTRUEを、失敗すればFALSEを返す。
    $result['success'] = mail($to, $subject, $message, $headers);

    // 【array_key_exists関数】指定したキーが配列に存在するか確認する。
    if(array_key_exists('callback', $_GET)){
        // 【header関数】HTTPヘッダー情報を送信する。
        // Content-Type：送信文字コードとコンテンツタイプを設定。
        header('Content-Type: text/javascript; charset=utf8');
        // Access-Control-Allow-Origin：アクセスを許可するURL。
        header('Access-Control-Allow-Origin: http://www.example.com/');
        // Access-Control-Max-Age：結果をキャッシュする最大秒数。
        header('Access-Control-Max-Age: 3628800');
        // Access-Control-Allow-Methods：許可されたHTTPメソッド。
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        
        $callback = $_GET['callback'];
        // 【json_encode関数】json形式に変換した文字列を返す。
        echo $callback.'('.json_encode($result).');';
    }else{
        // normal JSON string
        header('Contet-Type: application/json; charset=utf8');
        
        echo json_encode($result);
    }
?>