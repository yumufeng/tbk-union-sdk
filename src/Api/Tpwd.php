<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Tpwd extends GateWay
{

    /**
     * taobao.tbk.tpwd.create( 淘宝客淘口令 )
     * @link https://open.taobao.com/api.htm?docId=31127&docType=2
     * @param $params
     * @return mixed
     */
    public function create(array $params)
    {
        $result = $this->send('taobao.tbk.tpwd.create', $params);
        return \current($result);
    }
}