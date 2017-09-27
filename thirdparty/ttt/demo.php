<?php

include_once "wxBizDataCrypt.php";


$appid = 'wx2b3611e0fc3cec3f';
$sessionKey = 'qaeDghXdoOy1Nb2SYTdCpA==';

$encryptedData="aVacfD/J1jQp7TzQasYIn4AMSWAUx2hUmmjuSXdKFIoq9DIKfm47UO/pPtNbQ3JTBcPUBZcMNounLbz7IeiS/Z+olhMu6QqezCw4w93Pz3pjHKn2RxfoP+Qv96KCsfUDeSBeYsq7q0G6X03bkV3+22+zJl3poPqMLKwZz/Da8GZaTkqPXGNcyg7sQLdCROhrGjcZShH1ZaNQVXwnr/WXEeJR4vQn/aR8tOD23P5i1OiPXmJWSeTucvrBizPBK49r+4FKSWhCNwMRm3xIK7BdwLbBmv8BmKKEdkU9KRXKb1+8pgqrh/akbPy+yG/Bp8e4CDqvgaUrXEBkKXG2eOtzfuSEuSkxL6Ugb/995dYMXkMZt0iGD11W9ZwuNUB/jubbM5eUcXea3jBWmxcC5gm4d0zQn6d7jjX4wxra5ZjnguWg0EkabKmIJ3TTIk6vLanW5CMN5Ak9AKAXv4E4oPh3l6IcpJ2JoTHZTWhTa8eFaYs=";

$iv = 'M5HEuhKT66L7lVGgPg9QEQ==';

$pc = new WXBizDataCrypt($appid, $sessionKey);
$errCode = $pc->decryptData($encryptedData, $iv, $data );

if ($errCode == 0) {
    var_dump($data);
    //print($data . "\n");
} else {
    print($errCode . "\n");
}


//{
//    "appid": "wx2b3611e0fc3cec3f",
//    "session_key": "qaeDghXdoOy1Nb2SYTdCpA==",
//    "encryptedData": "aVacfD/J1jQp7TzQasYIn4AMSWAUx2hUmmjuSXdKFIoq9DIKfm47UO/pPtNbQ3JTBcPUBZcMNounLbz7IeiS/Z+olhMu6QqezCw4w93Pz3pjHKn2RxfoP+Qv96KCsfUDeSBeYsq7q0G6X03bkV3+22+zJl3poPqMLKwZz/Da8GZaTkqPXGNcyg7sQLdCROhrGjcZShH1ZaNQVXwnr/WXEeJR4vQn/aR8tOD23P5i1OiPXmJWSeTucvrBizPBK49r+4FKSWhCNwMRm3xIK7BdwLbBmv8BmKKEdkU9KRXKb1+8pgqrh/akbPy+yG/Bp8e4CDqvgaUrXEBkKXG2eOtzfuSEuSkxL6Ugb/995dYMXkMZt0iGD11W9ZwuNUB/jubbM5eUcXea3jBWmxcC5gm4d0zQn6d7jjX4wxra5ZjnguWg0EkabKmIJ3TTIk6vLanW5CMN5Ak9AKAXv4E4oPh3l6IcpJ2JoTHZTWhTa8eFaYs=",
//    "iv": "M5HEuhKT66L7lVGgPg9QEQ=="
//}