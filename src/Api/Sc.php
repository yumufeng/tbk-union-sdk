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


    /**
     * taobao.tbk.sc.newuser.order.sum( 拉新活动汇总API--社交 )
     * @link https://open.taobao.com/api.htm?docId=36836&docType=2
     * @param array $params
     * @return mixed
     */
    public function sumOrderNewUser(array $params)
    {
        $result = $this->send('taobao.tbk.sc.newuser.order.sum', $params);
        $da = $result['results']['data'] ?? false;
        return $da;
    }

    /**
     * taobao.tbk.sc.optimus.material( 淘宝客擎天柱通用物料API - 社交 )
     * @link https://open.taobao.com/api.htm?docId=33947&docType=2
     * @param array $params
     * @return bool
     */
    public function materialOptimus(array $params)
    {
        $result = $this->send('taobao.tbk.sc.optimus.material', $params);
        return $result['result_list']['map_data'] ?? false;
    }
}