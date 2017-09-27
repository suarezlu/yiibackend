<?php

namespace backend\modules\wxapp\controllers;

use Yii;
use backend\thirdparty\wxapp\WxApp;
use common\models\WxappUser;

class UserController extends AuthController
{
    public function actionAccesstoken()
    {
        if (Yii::$app->request->isPost) {
            $postData  = json_decode(file_get_contents("php://input"), true);
            Yii::trace(json_encode($postData));
            if ($postData && isset($postData['code']) && $postData['code']) {
                $getParam = array(
                    'appid' => 'wx2b3611e0fc3cec3f',
                    'secret' => 'a2f4953e646fc810bc6ced9617aac2ab',
                    'js_code' => $postData['code'],
                    'grant_type' => 'authorization_code'
                );
                $rData = $this->_httpGet("https://api.weixin.qq.com/sns/jscode2session", $getParam);
                if ($rData) {
                    $wxappUser = WxappUser::findOne(array('openid' => $rData['openid']));
                    if (!$wxappUser) {
                        $wxappUser = new WxappUser();
                        $wxappUser->openid = $rData['openid'];
                    }

                    $accessToken = md5($rData['session_key']);

                    $wxappUser->nick_name = $postData['userInfo']['nickName'];
                    $wxappUser->gender = $postData['userInfo']['gender'];
                    $wxappUser->language = $postData['userInfo']['language'];
                    $wxappUser->city = $postData['userInfo']['city'];
                    $wxappUser->province = $postData['userInfo']['province'];
                    $wxappUser->country = $postData['userInfo']['country'];
                    $wxappUser->avatar_url = $postData['userInfo']['avatarUrl'];
                    $wxappUser->access_token = $accessToken;
                    $wxappUser->update_time = time();
                    $wxappUser->save();

                    return array(
                        'error' => 200,
                        'msg' => '',
                        'access_token' => $accessToken
                    );
                }
            }
        }

        return array(
            'error' => 500,
            'msg' => '错误！'
        );
    }

    private function _httpGet($url, $data = array()){
        $query = $comma = '';
        if($data){
            foreach($data as $k=>$v){
                $query .= $comma . $k . '=' .$v;
                $comma = '&';
            }
            $url .= '?' . $query;
        }
        $ch = curl_init();
        $option = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1
        );
        curl_setopt_array($ch,$option);
        $r_data = curl_exec($ch);
        curl_close($ch);
        if($r_data){
            return json_decode($r_data, true);
        }else
            return array();
    }
}