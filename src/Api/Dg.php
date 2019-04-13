<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Dg extends GateWay
{
    /**
     * taobao.tbk.dg.item.coupon.get( 好券清单API【导购】 )
     * @link https://open.taobao.com/api.htm?docId=29821&docType=2
     * @param array $params
     * @return bool|mixed
     */
    public function getCouponItem(array $params)
    {
        $result = $this->send('taobao.tbk.dg.item.coupon.get', $params);
        if (empty($result)) {
            return $result;
        }
        return [
            'lists' => $result['results']['tbk_coupon'],
            'total' => $result['total_results']
        ];
    }

    /**
     * taobao.tbk.dg.newuser.order.get( 淘宝客新用户订单API--导购 )
     * @link https://open.taobao.com/api.htm?docId=33892&docType=2
     * @param array $params
     * @return bool
     */
    public function getNewUserOrder(array $params)
    {
        $result = $this->send('taobao.tbk.dg.newuser.order.get', $params);
        return isset($result['results']['data']) ? $result['results']['data'] : false;
    }
}