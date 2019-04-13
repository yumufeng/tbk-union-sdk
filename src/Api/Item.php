<?php

namespace TaobaoUnionSdk\Api;

use TaobaoUnionSdk\Tools\GateWay;

class Item extends GateWay
{

    /**
     * taobao.tbk.item.get( 淘宝客商品查询 )
     * @link https://open.taobao.com/api.htm?docId=24515&docType=2
     * @param array $param
     * @return bool|mixed
     */
    public function get(array $param)
    {
        if (!isset($param['fields'])) {
            $param['fields'] = 'num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick';
        }
        $result = $this->send('taobao.tbk.item.get', $param);
        if (empty($result)) {
            return $result;
        }
        return [
            'lists' => $result['results']['n_tbk_item'],
            'total' => $result['total_results']
        ];
    }

    /**
     * taobao.tbk.item.recommend.get( 淘宝客商品关联推荐查询 )
     * @link https://open.taobao.com/api.htm?docId=24517&docType=2&scopeId=11655
     * @param array $param
     * @return bool|mixed
     */
    public function getRecommend(array $param)
    {
        if (!isset($param['fields'])) {
            $param['fields'] = 'num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url';
        }
        $result = $this->send('taobao.tbk.item.recommend.get', $param);
        return isset($result['results']['n_tbk_item']) ? $result['results']['n_tbk_item'] : false;
    }

    /**
     * taobao.tbk.item.info.get (淘宝客商品详情（简版）)
     * @link https://open.taobao.com/api.htm?docId=24518&docType=2&scopeId=11655
     * @param $num_iids
     * @param int $platform
     * @param string $ip
     * @return bool|mixed
     */
    public function getInfo($num_iids, $platform = 1, $ip = '')
    {
        $params = [
            'num_iids' => $num_iids,
            'platform' => $platform,
            'ip' => $ip
        ];
        $result = $this->send('taobao.tbk.item.info.get', $params);
        return isset($result['results']['n_tbk_item']) ? $result['results']['n_tbk_item'] : false;
    }

    /**
     * taobao.tbk.item.click.extract( 链接解析api )
     * @link https://open.taobao.com/api.htm?docId=28156&docType=2
     * @param $click_url
     * @return bool|mixed
     */
    public function extractClick($click_url)
    {
        $params['click_url'] = $click_url;
        $result = $this->send('taobao.tbk.item.click.extract', $params);
        return $result;
    }

    /**
     * taobao.tbk.item.guess.like( 淘宝客商品猜你喜欢 )
     * @link https://open.taobao.com/api.htm?docId=29528&docType=2
     * @param array $params
     * @return bool|mixed
     */
    public function guessLike(array $params)
    {
        $result = $this->send('taobao.tbk.item.guess.like', $params);
        return $result;
    }
}