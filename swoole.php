<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/19
 * Time: 10:32
 */
error_reporting(E_ALL);
require './vendor/autoload.php';
class  swooleDemo
{
    public function __construct()
    {
        $http = new \swoole_http_server("0.0.0.0", 10000);
        $http->set(array(
            'worker_num' => 2,
            'dispatch_mode' => 2,
            'reload_async' => true,
            'max_wait_time' => 50,
            'daemonize' => 0,
            'max_request' => 20000
        ));
        $http->on('Start', [$this, 'onStart']);
        $http->on("request", [$this, 'onRequest']);
        $http->start();
    }
    public function onStart(\swoole_server $server)
    {
        echo "swoole is start 0.0.0.0:10000" . PHP_EOL;
    }
    public function onRequest(\swoole_http_request $request, \swoole_http_response $response)
    {

        $config = [
            'appkey' => '25085171',
            'secretKey' => '',
            'pid' => 'mm_29563340_122900348_29874650260', //默认推广位
            'session' => '',//授权接口（sc类的接口）需要带上
            'sandbox' => false,
        ];
        $client = new \TaobaoUnionSdk\TbkFatory($config);
        $params = [
            'material_id' => 26200,
            'page_size' => 10,
            'page_no' => 1,
            'adzone_id' => 29874650260
        ];
        $result = $client->dg->material_optimus($params);
        if ($result == false) {
            var_dump($client->getError());
        }
        $response->end(json_encode($result));
    }
}
new swooleDemo();