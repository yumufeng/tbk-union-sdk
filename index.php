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

$result = $client->dg->material_optimus([
    'page_size' => 10,
    'page_no' => 1,
    'adzone_id' => 98491150375,
    'material_id' => 26203
]);

if ($result == false) {
    var_dump($client->getError());
}

echo json_encode($result);
