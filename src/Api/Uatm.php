<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Uatm extends GateWay
{


    /**
     * taobao.tbk.uatm.favorites.get( 获取淘宝联盟选品库列表 )
     * @link https://open.taobao.com/api.htm?docId=26620&docType=2
     * @param array $params
     * @return bool
     */
    public function get(array $params)
    {
        if (!isset($params['fields'])) {
            $params['fields'] = 'favorites_title,favorites_id,type';
        }

        $result = $this->send('taobao.tbk.uatm.favorites.get', $params);

        return isset($result['results']['tbk_favorites']) ? $result['results']['tbk_favorites'] : false;
    }
    /**
     * taobao.tbk.uatm.favorites.item.get (获取淘宝联盟选品库的宝贝信息)
     * @line http://open.taobao.com/docs/api.htm?apiId=26619&docType=2
     * @param array $params
     * @return array|bool|mixed
     */
    public function item(array $params)
    {
        if (!isset($params['fields'])) {
            $params['fields'] = 'num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick,shop_title,zk_final_price_wap,event_start_time,event_end_time,tk_rate,status,type';
        }

        $result = $this->send('taobao.tbk.uatm.favorites.item.get', $params);
        if (empty($result)) {
            return $result;
        }
        return [
            'lists' => $result['results']['uatm_tbk_item'],
            'total' => $result['total_results']
        ];
    }
}