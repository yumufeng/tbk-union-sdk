**淘宝联盟SDK**

淘宝联盟SDK

PHP =>7.0

`composer require yumufeng/tbk-union-sdk`

如果是在swoole 扩展下使用，支持协程并发，需要在编译swoole扩展的时候开启，系统会自动判断是否采用swoole

```./configure --enable-openssl```

## 使用

```php
<?php


$config = [
    'appkey' => '',
    'secretKey' => '',
    'session' => '',//授权接口（sc类的接口）需要带上
    'sandbox' => false,
];

$client = new \TaobaoUnionSdk\TbkFatory($config);

$num_iids = ''; //商品ID
$platform = 1; //平台
$ip = '' ;//ip

$res = $client->item->get($num_iids,$platform,$ip);
print_r($res);
```

## 说明文档

- 私域参考：https://open.taobao.com/api.htm?docId=37988&docType=2&scopeId=14474
- 淘宝客API： https://open.taobao.com/api.htm?docId=24517&docType=2

## License

MIT
