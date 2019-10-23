<?php

namespace TaobaoUnionSdk\Api;

use TaobaoUnionSdk\Tools\GateWay;

class Item extends GateWay
{
    /**
     * taobao.tbk.item.recommend.get( 淘宝客商品关联推荐查询 )
     * @link https://open.taobao.com/api.htm?docId=24517&docType=2
     * @param array $param
     * @return bool|mixed
     */
    public function recommend(array $param)
    {
        if (!isset($param['fields'])) {
            $param['fields'] = 'num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url';
        }
        $result = $this->send('taobao.tbk.item.recommend.get', $param);
        return isset($result['results']['n_tbk_item']) ? $result['results']['n_tbk_item'] : false;
    }

    /**
     * taobao.tbk.item.info.get (淘宝客商品详情（简版）)
     * @link https://open.taobao.com/api.htm?docId=24518&docType=2
     * @param $num_iids
     * @param int $platform
     * @param string $ip
     * @return bool|mixed
     */
    public function get($num_iids, $platform = 1, $ip = '')
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
     * taobao.tbk.item.word.get( 淘宝客-推广者-商品出词 )
     * @link https://open.taobao.com/api.htm?docId=37538&docType=2
     */
    public function word(array $params)
    {
        $result = $this->send('taobao.tbk.item.word.get', $params);
        return \current($result);
    }

    /**
     * taobao.tbk.privilege.get( 淘宝客-服务商-单品券高效转链 )
     * @link https://open.taobao.com/api.htm?docId=28625&docType=2
     * @param array $params
     * @return bool
     */
    public function privilegeGet(array $params)
    {
        $result = $this->send('taobao.tbk.privilege.get', $params);
        return isset($result['result']['data']) ? $result['result']['data'] : false;
    }
}