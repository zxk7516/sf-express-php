<?php
namespace zxk\sf_express;

/**
 * Created by PhpStorm.
 * User: 曾祥康
 * Date: 2016/12/6 0006
 * Time: 11:16
 */
class SF_API_code
{
    const CODE_order= '200';//快速下单
    const CODE_order_result= '201'; //订单结果通知
    const CODE_query_order= '203';//订单查询
    const CODE_filter_order= '204';//订单筛选
    const CODE_digi_freigt= '205';//电子运单图片下载
    const CODE_route= '501';//路由查询
    const CODE_order_push= '500';//路由推送
    const CODE_route_inc= '504';//路由增量查询
    const CODE_basic_service= '250';//基础服务查询
    const CODE_additional_service= '251';//附加服务查询

        // 安全类
    const CODE_access_token= '300';//申请访问令牌
    const CODE_query_token= '301';//查询访问令牌
    const CODE_refresh_token= '302';//刷新访问令牌

        //仓库类
    const CODE_vendor= '600';    //    供应商
    const CODE_goods_list= '601';//商品目录
    const CODE_stock_in= '602';//入库单（采购订单）
    const CODE_stock_query= '607';//库存查询
    const CODE_stock_in_status= '604';//入库单状态查询
    const CODE_stock_in_detail_push= '610';//入库单明细推送
    const CODE_stock_out= '603';//出库单（销售订单）
    const CODE_stock_out_detail= '605';//出库单明细查询
    const CODE_stock_out_status= '606';//出库单状态查询
    const CODE_stock_out_detail_push= '609';//出库单明细推送
    const CODE_stock_out_invoice= '611';//出库单发票
    const CODE_order_cancel= '608';//取消订单（销售订单）

}