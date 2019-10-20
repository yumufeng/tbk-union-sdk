<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Tools extends GateWay
{
    /**
     * taobao.tbk.tpwd.create( 淘宝客淘口令 )
     * @link https://open.taobao.com/api.htm?docId=31127&docType=2
     * @param $params
     * @return mixed
     */
    public function createTpwd(array $params)
    {
        $result = $this->send('taobao.tbk.tpwd.create', $params);
        return \current($result);
    }

    /**
     * taobao.tbk.activitylink.get( 淘宝联盟官方活动推广API-媒体 )
     * @link https://open.taobao.com/api.htm?docId=41918&docType=2
     * @param array $params
     * @return bool|mixed
     */
    public function getActivityLink(array $params)
    {
        $result = $this->send('taobao.tbk.activitylink.get', $params);
        return $result;
    }

    /**
     * taobao.tbk.spread.get( 淘宝客-公用-长链转短链 )
     * @link https://open.taobao.com/api.htm?docId=27832&docType=2
     * @param array $urls
     * @return bool|mixed
     */
    public function spreadGet(array $urls)
    {
        $params['requests'] = [
            'url' => $urls
        ];
        $result = $this->send('taobao.tbk.spread.get', $params);
        return $result;
    }
}