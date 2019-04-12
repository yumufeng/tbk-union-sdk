**淘宝联盟SDK**

淘宝联盟SDK

PHP =>7.0

`composer require yumufeng/tbk-union-sdk`

如果是在swoole 扩展下使用，支持协程并发，需要在编译swoole扩展的时候开启，系统会自动判断是否采用swoole

```./configure --enable-coroutine --enable-openssl```

## 使用

```php
<?php


$config = [
    'appkey' => '',
    'secretKey' => '',
    'session' => '',//授权接口（sc类的接口）需要带上
    'sandbox' => false,
];

$client = new \TaobaoUnionSdk\TbkFatory($config);

$param = [
   'fields' => 'num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick',
   'q' => '蚊香'
];
$res = $client->item->get($param);
print_r($res);
```

## 说明文档

| 接口名称  | 对应方法  |
| --------   | ---- |
| taobao.tbk.item.get (淘宝客商品查询)     | \$app->item->get() |
| taobao.tbk.item.recommend.get (淘宝客商品关联推荐查询)        |    \$app->item->getRecommend()  |
| taobao.tbk.item.info.get (淘宝客商品详情（简版）)        |    \$app->item->getInfo()  |
| taobao.tbk.shop.get (淘宝客店铺查询)        |    \$app->shop->get()  |
| taobao.tbk.shop.recommend.get (淘宝客店铺关联推荐查询)        |    \$app->shop->getRecommend()  |
| taobao.tbk.uatm.favorites.item.get (获取淘宝联盟选品库的宝贝信息)   |    \$app->uatm->getItemFavorites()  |
| taobao.tbk.uatm.favorites.get (获取淘宝联盟选品库列表)   |    \$app->uatm->getFavorites()  |
| taobao.tbk.ju.tqg.get (淘抢购api)    |    \$app->ju->getTqg()  |
| taobao.tbk.item.click.extract (链接解析api)    |    \$app->item->clickExtract()  |
| taobao.tbk.item.guess.like (淘宝客商品猜你喜欢)   |    \$app->item->likeGuess()  |
| taobao.tbk.dg.item.coupon.get (好券清单API【导购】)    |    \$app->dg->getCouponItem()  |
| taobao.tbk.coupon.get (阿里妈妈推广券信息查询)   |    \$app->coupon->get()  |
| taobao.tbk.tpwd.create (淘宝客淘口令)     |    \$app->tpwd->create()  |
| taobao.tbk.dg.newuser.order.get (淘宝客新用户订单API--导购)    |    \$app->dg->getOrderNewUser()  |
| taobao.tbk.sc.newuser.order.get (淘宝客新用户订单API--社交)     |    \$app->sc->getOrderNewUser()  |
| taobao.tbk.dg.optimus.material (淘宝客物料下行-导购)     |    \$app->dg->materialOptimus()  |
| taobao.tbk.dg.material.optional (通用物料搜索API（导购）)     |    \$app->dg->materialOptional()  |
| taobao.tbk.dg.newuser.order.sum (拉新活动汇总API--导购)     |    \$app->dg->sumOrderNewUser()  |
| taobao.tbk.sc.newuser.order.sum (拉新活动汇总API--社交)     |    \$app->sc->sumOrderNewUser()  |
| taobao.tbk.sc.optimus.material (淘宝客擎天柱通用物料API - 社交)     |    \$app->sc->materialOptimus()  |
| taobao.tbk.activitylink.get( 淘宝联盟官方活动推广API-媒体 )     |    \$app->content->getActivityLink()  |
| taobao.tbk.sc.activitylink.toolget( 淘宝联盟官方活动推广API-工具 )     |    \$app->sc->getActivityTool()  |
| taobao.tbk.dg.punish.order.get( 处罚订单查询 -导购-私域用户管理专用 )     |    \$app->dg->getPunishOrder()  |
| taobao.tbk.order.get( 淘宝客订单查询 )     |    \$app->order->get()  |
| taobao.tbk.relation.refund( 淘宝客维权退款订单查询-私域用户管理专用 )     |    \$app->order->getRefund()  |


## 支持

- 官方API文档： http://open.taobao.com/docs/api.htm?apiId=24515
- 淘宝客订单API： https://open.taobao.com/api.htm?docId=24527&docType=2&scopeId=11650

## License

MIT
