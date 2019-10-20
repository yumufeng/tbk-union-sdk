<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Ju extends GateWay
{
    /**
     * taobao.tbk.ju.tqg.get( 淘抢购api )
     * @link https://open.taobao.com/api.htm?docId=27543&docType=2
     * @param array $params
     * @return array|bool|mixed
     */
    public function tqg(array $params)
    {
        if (!isset($params['fields'])) {
            $params['fields'] = 'click_url,pic_url,reserve_price,zk_final_price,total_amount,sold_num,title,category_name,start_time,end_time';
        }

        $result = $this->send('taobao.tbk.ju.tqg.get', $params);
        if (empty($result)) {
            return $result;
        }
        return [
            'lists' => $result['results']['results'],
            'total' => $result['total_results']
        ];
    }
}