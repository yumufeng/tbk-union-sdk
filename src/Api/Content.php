<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

/**
 * 图文内容
 * Class Content
 * @package TaobaoUnionSdk\Api
 */
class Content extends GateWay
{
    /**
     * taobao.tbk.content.get( 淘宝客-推广者-图文内容输出 )
     * @link https://open.taobao.com/api.htm?spm=a2e0r.13193907.0.0.50d324adIN39nY&docId=31137&docType=2
     * @param array $params
     * @return bool
     */
    public function get(array $params)
    {
        $result = $this->send('taobao.tbk.content.get', $params);
        return isset($result['result']['data']) ? $result['result']['data'] : false;
    }

    /**
     * taobao.tbk.content.effect.get( 淘宝客-推广者-图文内容效果数据 )
     * @link https://open.taobao.com/api.htm?docId=37130&docType=2
     * @param array $params
     * @return bool
     */
    public function effect(array $params)
    {
        if (!isset($params['pid'])){
            $params['pid'] = $this->globalConfig['pid'];
        }
        $op['option'] = \json_encode($params);
        $result = $this->send('taobao.tbk.content.effect.get', $op);
        return isset($result['result']['model']) ? $result['result']['model'] : false;
    }
}