<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Content extends GateWay
{

    /**
     * taobao.tbk.activitylink.get( 淘宝联盟官方活动推广API-媒体 )
     * @link https://open.taobao.com/api.htm?docId=41918&docType=2
     *
     */
    public function getActivityLink(array $params)
    {
        $result = $this->send('taobao.tbk.activitylink.get', $params);
        return $result;
    }
}