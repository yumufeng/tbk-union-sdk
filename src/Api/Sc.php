<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Sc extends GateWay
{

    /**
     * taobao.tbk.sc.newuser.order.get( 淘宝客新用户订单API--社交 )
     * @link https://open.taobao.com/api.htm?docId=33897&docType=2
     * @param array $params
     * @return bool
     */
    public function getNewUserOrder(array $params)
    {
        $result = $this->send('taobao.tbk.sc.newuser.order.get', $params);
        return isset($result['results']['data']) ? $result['results']['data'] : false;
    }
}