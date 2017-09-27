<?php

namespace backend\thirdparty\wxapp;

class WxApp
{
    public static function Encrypt($appid, $sessionKey, $encryptedData, $iv)
    {
        $data = array();
        return array();

        $pc = new WXBizDataCrypt($appid, $sessionKey);
        $errCode = $pc->decryptData($encryptedData, $iv, $data );

        if ($errCode == 0) {
            return $data;
        }else{
            return array();
        }
    }
}