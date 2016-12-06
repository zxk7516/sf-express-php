<?php
namespace zxk\sf_express;

/**
 * Created by PhpStorm.
 * User: 曾祥康
 * Date: 2016/12/6 0006
 * Time: 11:20
 */
class SF_API_Response {

const EX_CODE_OPENAPI_0100='输入校验异常';
const EX_CODE_OPENAPI_0101=' APPID 不存在';
const EX_CODE_OPENAPI_0102=' APPKEY 不存在';
const EX_CODE_OPENAPI_0103=' 访问令牌不存在';
const EX_CODE_OPENAPI_0104=' 更新令牌不存在';
const EX_CODE_OPENAPI_0105=' 访问令牌过期';
const EX_CODE_OPENAPI_0106=' 更新令牌过期';

const EX_CODE_OPENAPI_0200=' 操作成功';
const EX_CODE_OPENAPI_0400=' 操作失败';

const EX_CODE_OPENAPI_0420=' 不存在该订单号对应的订单信息';
const EX_CODE_OPENAPI_0500=' 系统异常';
const EX_CODE_OPENAPI_0212=' 无效帐户状态';
const EX_CODE_OPENAPI_0300=' 验证输入参数异常';
const EX_CODE_OPENAPI_0403=' 获取用户权限失败';
const EX_CODE_OPENAPI_0404=' 重复下单';
const EX_CODE_OPENAPI_0405=' 查询非客户所有订单';
const EX_CODE_OPENAPI_0406=' 生产电子运单图片失败';
const EX_CODE_OPENAPI_0407=' 未有数据生成电子运单';
const EX_CODE_OPENAPI_0425=' 订单信息有误';
const EX_CODE_OPENAPI_0426=' 调用地址筛单异常';
const EX_CODE_OPENAPI_0444=' 查询路由信息不存在';
const EX_CODE_OPENAPI_0445=' 该订单号非本系统的订单或者运单不存在';
const EX_CODE_OPENAPI_0446=' 该订单号尚未申请路由增量接口';
}