<?php
require './vendor/autoload.php';
header("content-type: application/json;charset=UTF-8");


$config = [
    'appkey' => '25085171',
    'secretKey' => '',
    'pid' => '', //默认推广位
    'session' => '',//授权接口（sc类的接口）需要带上
    'sandbox' => false,
];

$client = new \TaobaoUnionSdk\TbkFatory($config);

//$result = $client->sc->publisherInfoSave([
//    'inviter_code' => 'XJCFRV',
//    'info_type' => 1
//]);

$result = $client->sc->inviteCode([
    'relation_app' => 'common',
    'code_type' => 1
]);

//$result = $client->sc->publisherInfoGet([
//    'info_type' => 1,
//    'relation_app' => 'common'
//]);

if ($result == false) {
    var_dump($client->getError());
}

echo json_encode($result);
