<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Dg extends GateWay
{

    /**
     * taobao.tbk.dg.newuser.order.get(  淘宝客-推广者-新用户订单明细查询 )
     * @link https://open.taobao.com/api.htm?docId=33892&docType=2
     * @param array $params
     * @return bool
     */
    public function newuser_order_get(array $params)
    {
        $result = $this->send('taobao.tbk.dg.newuser.order.get', $params);
        return $result['results']['data'] ?? false;
    }

    /**
     * taobao.tbk.dg.newuser.order.sum(淘宝客-推广者-拉新活动对应数据查询)
     * @link https://open.taobao.com/api.htm?docId=36836&docType=2
     * @param array $params
     * @return mixed
     */
    public function newuser_order_sum(array $params)
    {
        $result = $this->send('taobao.tbk.dg.newuser.order.sum', $params);
        $da = isset($result['results']['data']) ? $result['results']['data'] : false;
        return $da;
    }

    /**
     * taobao.tbk.dg.optimus.material( 淘宝客-推广者-物料精选 )
     * 官方的物料Id(详细物料id见：https://tbk.bbs.taobao.com/detail.html?appId=45301&postId=8576096)
     * @link https://open.taobao.com/api.htm?docId=33947&docType=2
     * @param array $params
     * @return bool
     */
    public function material_optimus(array $params)
    {
        $result = $this->send('taobao.tbk.dg.optimus.material', $params);
        return isset($result['result_list']['map_data']) ? $result['result_list']['map_data'] : false;
    }

    /**
     * taobao.tbk.dg.material.optional( 淘宝客-推广者-物料搜索)
     * @link https://open.taobao.com/api.htm?docId=35896&docType=2
     * @param array $params
     * @return bool
     */
    public function material_optional(array $params)
    {
        $result = $this->send('taobao.tbk.dg.material.optional', $params);
        if (empty($result)) {
            return $result;
        }
        $da['lists'] = isset($result['result_list']['map_data']) ? $result['result_list']['map_data'] : false;
        $da['total'] = $result['total_results'];
        return $da;
    }

    /**
     * taobao.tbk.dg.vegas.tlj.create( 淘宝客-推广者-淘礼金创建 )
     * @param array $params
     * @return bool
     * @link https://open.taobao.com/api.htm?docId=40173&docType=2
     */
    public function tlj(array $params)
    {
        $result = $this->send('taobao.tbk.dg.vegas.tlj.create', $params);

        return isset($result['result']['model']) ? $result['result']['model'] : false;
    }

    /**
     * taobao.tbk.dg.vegas.tlj.instance.report( 淘宝客-推广者-淘礼金发放及使用报表 )
     * @link https://open.taobao.com/api.htm?docId=43317&docType=2
     * @param $rights_id
     * @return bool
     */
    public function tlj_report($rights_id)
    {
        $params['rights_id'] = $rights_id;
        $result = $this->send('taobao.tbk.dg.vegas.tlj.instance.report', $params);
        return isset($result['result']['model']) ? $result['result']['model'] : false;
    }
}