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
        return $result['results']['data'] ?? false;
    }

    /**
     * taobao.tbk.dg.optimus.material( 淘宝客物料下行-导购 )
     * @link https://open.taobao.com/api.htm?docId=33947&docType=2
     * @param array $params
     * @return bool
     */
    public function materialOptimus(array $params)
    {
        $result = $this->send('taobao.tbk.dg.optimus.material', $params);
        return $result['result_list']['map_data'] ?? false;
    }

    /**
     * taobao.tbk.dg.material.optional( 通用物料搜索API（导购） )
     * @link https://open.taobao.com/api.htm?docId=35896&docType=2
     * @param array $params
     * @return bool
     */
    public function materialOptional(array $params)
    {
        $result = $this->send('taobao.tbk.dg.material.optional', $params);
        $da['lists'] = $result['result_list']['map_data'] ?? false;
        $da['total'] = $result['total_results'];
        return $da;
    }

    /**
     * taobao.tbk.dg.newuser.order.sum( 拉新活动汇总API--导购 )
     * @link https://open.taobao.com/api.htm?docId=36836&docType=2
     * @param array $params
     * @return mixed
     */
    public function sumOrderNewUser(array $params)
    {
        $result = $this->send('taobao.tbk.dg.newuser.order.sum', $params);
        $da = $result['results']['data'] ?? false;
        return $da;
    }
}