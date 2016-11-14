<?php
return array(

    /* 模块相关配置 */
    'DEFAULT_MODULE' => 'Home',
    'MODULE_DENY_LIST'   => array('Common','User'),
//    'URL_ROUTER_ON' => true,

    /* 加载扩展配置文件 */
    'LOAD_EXT_CONFIG' => 'db',

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => false,    //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3,        //URL模式  默认关闭伪静态
    'VAR_URL_PARAMS'       => '',       // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/',      //PATHINFO URL分割符
    'URL_HTML_SUFFIX'       => 'html',  // URL伪静态后缀设置

    'DATE_FORMAT' =>'Y-m-d H:i:s',      //时间格式

    /* JSON返回中文编码 */
    'JSON_UNESCAPED_UNICODE' => true,   // PHP 5.4以上才支持

    /* session保存在数据库 */
//    'SESSION_OPTIONS'=>array(
//        'type'=> 'db',      //session采用数据库保存
//        'expire'=>1440,     //session过期时间，如果不设就是php.ini中设置的默认值
//    ),
//    'SESSION_TABLE'=>'art_session', //必须设置成这样，如果不加前缀就找不到数据表，这个需要注意
);