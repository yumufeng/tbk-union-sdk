<?php

namespace TaobaoUnionSdk;

use TaobaoUnionSdk\Api\Content;
use TaobaoUnionSdk\Api\Coupon;
use TaobaoUnionSdk\Api\Dg;
use TaobaoUnionSdk\Api\Item;
use TaobaoUnionSdk\Api\Ju;
use TaobaoUnionSdk\Api\Order;
use TaobaoUnionSdk\Api\Sc;
use TaobaoUnionSdk\Api\Shop;
use TaobaoUnionSdk\Api\Tpwd;
use TaobaoUnionSdk\Api\Uatm;

/**
 * Class TbkFatory
 * @property Coupon coupon
 * @property Dg dg
 * @property Item item
 * @property Ju ju
 * @property Order order
 * @property Sc sc
 * @property Shop shop
 * @property Tpwd tpwd
 * @property Uatm uatm
 * @property Content content
 * @package TaobaoUnionSdk
 */
class TbkFatory
{
    private $config;
    private $error;

    public function __construct($config = null)
    {
        if (empty($config)) {
            throw new \Exception('no config');
        }
        $this->config = $config;
    }

    public function __get($api)
    {
        try {
            $classname = __NAMESPACE__ . "\\Api\\" . ucfirst($api);
            if (!class_exists($classname)) {
                throw new \Exception('api undefined');
                return false;
            }
            $new = new $classname($this->config, $this);
            return $new;
        } catch (\Exception $e) {
            throw new \Exception('api undefined');
        }
    }

    public function setError($message)
    {
        $this->error = $message;
    }

    public function getError()
    {
        return $this->error;
    }
}