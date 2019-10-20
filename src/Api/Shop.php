<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Shop extends GateWay
{
    /**
     * taobao.tbk.shop.get( 淘宝客店铺查询 )
     * @link https://open.taobao.com/api.htm?docId=24521&docType=2
     * @param array $param
     * @return array|bool|mixed
     */
    public function get(array $param)
    {
        if (!isset($param['fields'])) {
            $param['fields'] = 'user_id,shop_title,shop_type,seller_nick,pict_url,shop_url';
        }
        $result = $this->send('taobao.tbk.shop.get', $param);
        if (empty($result)) {
            return $result;
        }
        return [
            'lists' => $result['results']['n_tbk_shop'],
            'total' => $result['total_results']
        ];
    }

    /**
     * taobao.tbk.shop.recommend.get(淘宝客店铺关联推荐查询)
     * @link https://open.taobao.com/api.htm?docId=24522&docType=2
     * @param array $param
     * @return bool|mixed
     */
    public function recommend(array $param)
    {
        if (!isset($param['fields'])) {
            $param['fields'] = 'user_id,shop_title,shop_type,seller_nick,pict_url,shop_url';
        }
        $result = $this->send('taobao.tbk.shop.recommend.get', $param);
        return isset($result['results']['n_tbk_shop']) ? $result['results']['n_tbk_shop'] : false;
    }
}