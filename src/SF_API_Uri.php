<?php
namespace zxk\sf_express;

/**
 * Created by PhpStorm.
 * User: 曾祥康
 * Date: 2016/12/6 0006
 * Time: 11:13
 */
class SF_API_Uri
{
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