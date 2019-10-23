<?php

require './vendor/autoload.php';
header("content-type: application/json;charset=UTF-8");


$config = [
    'appkey' => '25085171',
    'secretKey' => 'f66bd449316c3e7c958b83e821d2bb6b',
    'pid' => 'mm_29563340_122900348_29874650260', //默认推广位
    'session' => '61011267a0f75da4f1753e1ac2a4d58fa111a3a1a6ede79602540452',//授权接口（sc类的接口）需要带上
    'sandbox' => true,
];

$client = new \TaobaoUnionSdk\TbkFatory($config);

$result = $client->content->effect([
    'content_id' => '9440815'
]);

if ($result == false) {
    var_dump($client->getError());
}

echo json_encode($result);
