<?php
namespace zxk\sf_express;
/**
 * Created by PhpStorm.
 * User: 曾祥康
 * Date: 2016/12/6 0006
 * Time: 9:28
 */
use GuzzleHttp\Client;
class SF_API_Client{
    const SBOX_URL =  'https://open-sbox.sf-express.com';
    const PROD_URL = 'https://open-prod.sf-express.com';

    private $client;
    private $app_id;
    private $app_key;
    private $access_token;
    private $version = "v1.0";
    public $headers = [
        'Content-Type'=>'application/json;charset=UTF-8'
        // , ......
    ];

    /**
     * SF_API_Client constructor.
     * @param $config
     * $client = new Client([
     *         'base_uri'        => 'http://www.foo.com/1.0/',
     *         'timeout'         => 0,
     *         'allow_redirects' => false,
     *         'proxy'           => '192.168.16.1:10'
     * ]);
     * @param $headers  array   头
     * @param $app_id string    应用id
     * @param $app_key string   应用key
     * @param $version string   版本
     */
    public function __construct($config,$headers,$app_id,$app_key,$version)
    {
        $client = new Client([
            'base_uri' => isset($config['base_uri'])? $config['base_uri']: $this::SBOX_URL,
            'timeout' => $config['timeout'],
            'allow_redirects' => $config['allow_redirects'],
            'proxy' => $config['proxy']
        ]);
        $this->app_id = $app_id;
        $this->app_key = $app_key;
        $this->version = $version;
        if (is_array($headers) && !empty($headers))
        {
            $this->headers = $headers;
        }
    }
    public function set_access_token(){
        $uri = '/public/'.$this->version.'/security/access_token/sf_appid/'.$this->app_id.'/sf_appkey/'.$this->app_key;
        $response = $this->post($uri,[
           'head' => [
               'transType' => 301,
               'transMessageId'=> date('YYYYmmddHHiiss',time()).$spe_no = sprintf('-%04s', mt_rand(0,10000))
           ]
        ]);
    }
    public function refressh_access_token(){
        $uri = '/public/'.$this->version.'/security/access_token/sf_appid/'.$this->app_id.'/sf_appkey/'.$this->app_key;
        $response = $this->post($uri,[
            'head' => [
                'transType' => 301,
                'transMessageId'=> date('YYYYmmddHHiiss',time()).$spe_no = sprintf('-%04s', mt_rand(0,10000))
            ]
        ]);
    }

    /**
     * @param $uri
     * @param array $data
     */
    public function post($uri,array $data){
        return  $this->client->request('POST',$uri,$data);
    }
    public function query($uri,array $data){
        $json = ($this->post($uri,$data) ) ->getBody();
    }
    public static function makeUri($uri,$app_id,$app_key,$access_token,$version){
        $type = 'rest'; //$isAuth? '/public' : '/rest';
        if (strlen($access_token)>5) $access_token = 'access_token/'.$access_token;
        $url = $type.'/'.$version.$uri.$access_token.'/sf_appid/'.$app_id.'/sf_appkey/'.$app_key;
        return $url;
    }

    const URL_order = '/order/';//快速下单
    const URL_query_order = '/order/query/';//订单查询
    const URL_filter_order= '/filter/';//订单筛选
    const URL_route= '/route/query/';//路由查询
    const URL_route_inc= '/route/inc/query/';//路由增量查询
    const URL_digi_freight= '/waybill/image/';//电子运单图片下载
    const URL_basic_service= '/product/basic/query/';//基础服务查询
    const URL_additional_service= '/product/additional/query/';//附加服务查询

        // 安全类
    const URL_access_token= '/security/access_token/';//申请访问令牌
    const URL_query_token= '/security/access_token/query/';//查询访问令牌
    const URL_refresh_token= '/security/refresh_token/';//刷新访问令牌

        //仓库类
    const URL_vendor= '/wms/vendor/';    //    供应商
    const URL_goods_list= '/wms/goods/';//商品目录
    const URL_stock_in= '/wms/purchase/order/';//入库单（采购订单）
    const URL_stock_query= '/wms/inventory/query/';//库存查询
    const URL_stock_in_status= '/wms/purchase/order/status/query/';//入库单状态查询
    const URL_stock_in_detail_push= '/wms/purchase/order/push/';//入库单明细推送
    const URL_stock_out= '/wms/sales/order/';//出库单（销售订单）
    const URL_stock_out_detail= '/wms/sales/order/query/';//出库单明细查询
    const URL_stock_out_status= '/wms/sales/order/status/query';//出库单状态查询
    const URL_stock_out_detail_push= '/wms/sales/order/push/';//出库单明细推送
    const URL_stock_out_invoice = '/wms/sales/order/invoice/';//出库单发票
    const URL_order_cancel = '/wms/sales/order/cancel/';//取消订单（销售订单）
}