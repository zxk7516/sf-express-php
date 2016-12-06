<?php
/**
 * Created by PhpStorm.
 * User: 曾祥康
 * Date: 2016/12/6 0006
 * Time: 10:21
 */
require_once 'vendor/autoload.php';
use zxk\sf_express\SF_API_Client;
use zxk\sf_express\SF_API_Uri;
use zxk\sf_express\itm\Order;
use zxk\sf_express\SF_API_code;
$c = new SF_API_Client(
    [
        'base_uri' => SF_API_Client::SBOX_URL
    ]
    , null, '9999999', 'keyshldjfslkjfds', 'v1.0'
);
$c->set_access_token();

//下单
$o = new Order();
$o->orderId = date('YmdHis',time()).$spe_no = sprintf('%04s', mt_rand(0,10000));
$o->expressType = '1';
$o->cargoInfo = array(
    'cargo' => 'iphone5s',
    'cargoAmount' => '4670.00',
    'cargoCount' => '1000',
    'cargoTotalWeight' => '121000',
    'cargoUnit' => '部',
    'cargoWeight' => '121.00',
    'parcelQuantity' => '1'
);
$o->deliverInfo = array(
    'address' => '上地',
    'city' => '朝阳',
    'company' => '京东',
    'contact' => '李卡卡',
    'country' => '中国',
    'mobile' => '13612822894',
    'province' => '北京',
    'shipperCode' => '787564',
    'tel' => '010-95123669'
);
$o->consigneeInfo = array(
    'address' => '世界第一广场',
    'city' => '深圳',
    'company' => '顺丰',
    'contact' => '黄飞鸿',
    'country' => '中国',
    'mobile' => '18588413321',
    'province' => '广东',
    'shipperCode' => '518100',
    'tel' => '075533915561'
);
$o_array = json_decode(json_encode($o),true); //　将object转化为array
$res = $c->query(SF_API_Uri::URL_order,SF_API_code::CODE_order , $o_array );
//echo $res;

// 订单查询 () 路由增量查询 电子运单图片下载接口 参数都是order_id
$res = $c->query(SF_API_Uri::URL_query_order,SF_API_code::CODE_query_order,[
    'orderId' => '201404120000000000000001',
]);
//
echo $res;