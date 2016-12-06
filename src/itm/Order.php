<?php
namespace zxk\sf_express\itm;

/**
 * Class Order 订单接口订单数据（顺风文档版本v1.1.1 P12)
 */
class Order {
    /**
     * @var string(56) 订单ID max_len 56, 同一订单号不能重复提交
     */
    public $orderId;

    /**
     * @var string(5) 快件产品类别
    1 标准快递
    2 顺丰特惠
    3 电商特惠
    5 顺丰次晨
    6 顺丰即日
    7 电商速配
    15 生鲜速配
     */
    public  $expressType;

    /**
     * @var number(1)   是否下 call（通知收派员上门取件）
    1 下 call
    0 不下 call【默认值】
     */
    public  $isDoCall = 0;

    /**
     * @var string(2)    是否需要签回单号
    1 需要
    0 不需要【默认值】
     */
    public  $needReturnTrackingNo = '0';

    /**
     * @var number(1)     付款方式：
    1 寄方付/寄付月结【默认值】
    2 收方付
    3 第三方付
     */
    public  $payMethod = 1;

    /**
     * @var string(100) 备注，最大长度 30 个汉字
     */
    public  $remark = '';

    /**
     * @var string(18)   要求上门取件开始时间，格式：YYYY-MM-DD
    HH24:MM:SS，示例：2012-7-30 09:30:00，
    默认值为系统收到订单的系统时间
     */
    public  $sendStartTime = '';

    /**
     * @var string(20) 顺丰月结卡号 10 位数字
     */
    public  $custId;


    /**
     * @var string(20) 月结卡号对应的网点，如果付款方式为第三方支付，则必填
     */
    public  $payArea;

    /**
     * @var number(1)   是否申请运单号
    1 申请【默认值】
    0 不申请
     */
    public  $isGenBillNo = 1;

    /**
     * @var number(1)    是否生成电子运单图片
    1 生成【默认值】
    0 不生成
     */
    public  $isGenEletricPic = 1;

    /**
     * 商品信息
     * @type array
     * @example
    array (
    'cargo' => 'iphone5s',//名称
    'cargoAmount' => '4670.00',//金额
    'cargoCount' => '1000',//数量
    'cargoTotalWeight' => '121000',//总量
    'cargoUnit' => '部',//单位
    'cargoWeight' => '121.00',//单重
    'parcelQuantity' => '1',//包裹数
    )
     */
    public  $cargoInfo = array();

    /**
     * 发货信息
     * @type array
     * @example
     *  array (
    'address' => '世界第一广场',
    'city' => '深圳',
    'company' => '顺丰',
    'contact' => '黄飞鸿',
    'country' => '中国',
    'mobile' => '18588413321',
    'province' => '广东',
    'shipperCode' => '518100',
    'tel' => '075533915561',
    )
     */
    public  $deliverInfo = array();

    /**
     * 收货人信息
     * @type array
     * @example
     *  array ('address' => '..',city' => '深圳',company' => '顺丰',contact' => '..',country' => '中国',mobile' => '..',
    'province' => '广东',shipperCode' => '518100','tel' => '075533915561',)
     */
    public  $consigneeInfo = array();

    /**
     * 添加服务
     * @type array
     * @example
    服务名称    参数           介绍
    COD         String(20) 否 代收货款，value代收货款值，上限为20000，以原寄地所在区域币种为准，如中国大陆为人民，香港为港币，保留1位小数，如 99.9 。value1为代收货款协议卡号（可能与月结卡号相同），如选择此服务，须增加CUSTID字段
    CUSTID      String(30) 否 代收货款月结卡号，如果选择 COD 增值服务，必填
    INSURE      String(30) 否 保价，value为声明价值(即该包裹的价值)
    MSG         String(30) 否 签收短信通知，value 为手机号码
    PKFREE      String(30) 否 包装费，value 为包装费费用.
    SINSURE     String(30) 否 特殊保价，value 为服务费.
    SDELIVERY   String(30) 否 特殊配送，value为服务特殊配送服务费.
    SADDSERVICE String(30) 否 特殊增值服务，value 特殊增值服务费
    array (
    0 =>  array ( 'name' => 'CUSTID', 'value' => '7551878519')
    1 =>  ...
    )
     */
    public   $addedServices = array();

    public function __construct()
    {
        $this->custId = '1234134143';
        $this->payArea = '蔬菜批发中心';
        $this->isGenBillNo = '1';
        $this->isGenEletricPic =  '1';
    }

}

