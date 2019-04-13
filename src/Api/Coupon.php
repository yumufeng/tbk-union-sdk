<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Coupon extends GateWay
{
    /**
     * taobao.tbk.coupon.get( 阿里妈妈推广券信息查询 )
     * @link https://open.taobao.com/api.htm?docId=31106&docType=2
     * @param array $params
     * @return mixed
     */
    public function get(array $params)
    {
        $result = $this->send('taobao.tbk.coupon.get', $params);

        return \current($result);
    }
}