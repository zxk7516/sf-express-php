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
//    private $access_token;
    private $access_token = 'zxkismyfater.';
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
        $this->client = new Client([
            'base_uri' => isset($config['base_uri'])? $config['base_uri']: $this::SBOX_URL,
            'verify'=> isset($config['verify']) ? $config['verify'] : false, // ssl

//            'timeout' => $config['timeout'] ? $config['timeout'] : 0,
//            'allow_redirects' => $config['allow_redirects']?  true: false,
//            'proxy' => $config['proxy']
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
//        echo $uri;
//        var_dump([
//            'head' => [
//                'transType' => 301,
//                'transMessageId'=> date('YmdHis',time()).$spe_no = sprintf('%04s', mt_rand(0,10000))
//            ]
//        ]);
        $response = $this->post($uri,[
           'head' => [
               'transType' => '301',
               'transMessageId'=> date('YmdHis',time()).$spe_no = sprintf('%04s', mt_rand(0,10000))
           ]
        ]);

        echo $response->getBody();
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
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($uri,array $data){
        return  $this->client->request('POST',$uri,[
            'headers' => $this->headers,
            'json' => $data
        ]);
    }
    public function query($uri,$code ,array $data){
//        echo $this->makeUri($uri).'<br>';
//        var_dump([
//            'head' => [
//                'transType' => $code,
//                'transMessageId'=> date('YmdHis',time()).$spe_no = sprintf('%04s', mt_rand(0,10000))
//            ],
//            'body' => $data
//
//        ]);
        $json = ($this->post($this->makeUri($uri),[
            'head' => [
                'transType' => $code,
                'transMessageId'=> date('YmdHis',time()).$spe_no = sprintf('%04s', mt_rand(0,10000))
            ],
            'body' => $data

        ]) ) ->getBody();
        return $json;
    }

    /**
     * 查询请示 rest
     * @param $uri  string 请求标识
     * @return string
     */
    public function makeUri($uri){
        return  '/rest/'.$this->version.$uri.'access_token/'.$this->access_token.'/sf_appid/'.$this->app_id.'/sf_appkey/'.$this->app_key;
    }
}