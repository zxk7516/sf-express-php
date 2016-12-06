<?php
namespace zxk\sf_express;

/**
 * Created by PhpStorm.
 * User: 曾祥康
 * Date: 2016/12/6 0006
 * Time: 10:09
 */

namespace zxk\sf_express;


/**
 * 顺风请示报文休
 * Class SF_Json_Array
 * @package zxk\sf_express
 * {
 *    "head":{
 *    "transMessageId":"201404120000000001",
 *    "transType":200
 *    },
 *    "body":{
 *       .....
 *    }
 *  }
 */
class SF_Json_Array
{
    static public function makeArray( $transMessageId,$transType,array $body){
        return [
            'head' => [
                'transMessageId' => $transMessageId,
                'transType' => $transType
            ],
            'body' => $body
        ];
    }
}