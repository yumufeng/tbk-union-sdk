<?php
require './vendor/autoload.php';
header("content-type: application/json;charset=UTF-8");


$config = [
    'appkey' => '25085171',
    'secretKey' => 'f66bd449316c3e7c958b83e821d2bb6b',
    'pid' => 'mm_29563340_122900348_29874650260', //默认推广位
    'session' => '',//授权接口（sc类的接口）需要带上
    'sandbox' => false,
];

$client = new \TaobaoUnionSdk\TbkFatory($config);

$result = $client->tools->spreadGet([
    [
        'url' => 'https://uland.taobao.com/quan/detail?sellerId=4051125533&activityId=8a18f770d12849f2bfcdc31c418e8a5c'
    ],
    [
        'url' => 'http://temai.taobao.com'
    ]
]);

if ($result == false) {
    var_dump($client->getError());
}

echo json_encode($result);
