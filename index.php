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

$result = $client->tpwd->create([
    'text' => '【小树苗】儿童牙膏无氟可吞咽牙膏',
    'url' => 'https://uland.taobao.com/coupon/edetail?e=O60EAyHyKIpt3vqbdXnGlivNjFRkusPB5djj77wlO1yRouJg2hy9lJ7clY2Hw1o40khhwrZzASf9g1RlPpGU2hmFTDIT3kLkWOGP4KauORrEQlnWllxAq7Da9SMviYqQfo0s4juXT4zk4UQqwowTnTclmaPT%2FN8Oi5zCOSkadsc%3D&af=1&pid=mm_29563340_122900348_29874650260',
    'logo' => 'http://imgproxy.18cap.cn/imgextra/i3/1060894880/*o1*c*n01n8*p*b*g41lv5*jdeej6r_!!1060894880.jpg_400x400.jpg'
]);

if ($result == false) {
    var_dump($client->getError());
}

echo json_encode($result);
