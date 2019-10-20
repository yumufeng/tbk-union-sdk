<?php


namespace TaobaoUnionSdk\Api;


use TaobaoUnionSdk\Tools\GateWay;

class Sc extends GateWay
{
    /**
     * taobao.tbk.sc.invitecode.get( 淘宝客-公用-私域用户邀请码生成 )
     * @link https://open.taobao.com/api.htm?docId=38046&docType=2
     * @param array $params
     * @return bool
     */
    public function inviteCode(array $params)
    {
        $result = $this->send('taobao.tbk.sc.invitecode.get', $params);
        return isset($result['data']) ? $result['data'] : false;
    }

    /**
     * taobao.tbk.sc.publisher.info.get( 淘宝客-公用-私域用户备案信息查询 )
     * @link https://open.taobao.com/api.htm?docId=37989&docType=2
     * @param array $params
     * @return bool|mixed
     */
    public function publisherInfoGet(array $params)
    {
        $result = $this->send('taobao.tbk.sc.publisher.info.get', $params);
        if (empty($result)) {
            return $result;
        }
        return \current($result);
    }

    /**
     * taobao.tbk.sc.publisher.info.save( 淘宝客-公用-私域用户备案 )
     * @link https://open.taobao.com/api.htm?docId=37988&docType=2
     * @param array $params
     * @return bool|mixed
     */
    public function publisherInfoSave(array $params)
    {
        $result = $this->send('taobao.tbk.sc.publisher.info.save', $params);
        if (empty($result)) {
            return $result;
        }
        return \current($result);
    }
}