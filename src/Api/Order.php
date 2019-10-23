<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Order extends GateWay
{
    /**
     * taobao.tbk.order.details.get( 淘宝客-推广者-所有订单查询 )
     * @link https://open.taobao.com/api.htm?docId=43328&docType=2
     * @param array $da
     * @return bool
     */
    public function get(array $da)
    {
        $result = $this->send('taobao.tbk.order.details.get', $da);
        return isset($result['data']) ? $result['data'] : false;
    }

    /**
     * taobao.tbk.relation.refund( 淘宝客-推广者-维权退款订单查询 )
     * @link https://open.taobao.com/api.htm?docId=40121&docType=2
     * @param array $da
     * @return bool
     */
    public function refund(array $da)
    {
        $params['search_option'] = \json_encode($da);
        $result = $this->send('taobao.tbk.relation.refund', $da);
        return isset($result['result']['data']) ? $result['result']['data'] : false;
    }

    /**
     * taobao.tbk.dg.punish.order.get( 淘宝客-推广者-处罚订单查询 )
     * @Link https://open.taobao.com/api.htm?docId=42050&docType=2
     * @param array $da
     * @return array|bool|mixed
     */
    public function punish(array $da)
    {
        $params['af_order_option'] = \json_encode($da);
        $result = $this->send('taobao.tbk.dg.punish.order.get', $params);
        if (empty($result)) {
            return $result;
        }
        return [
            'lists' => $result['data']['results'],
            'count' => $result['data']['total_count']
        ];
    }
}