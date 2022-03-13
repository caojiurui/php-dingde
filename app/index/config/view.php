<?php
// +----------------------------------------------------------------------
// | 模板设置
// +----------------------------------------------------------------------

return [
    // 字符替换
    'tpl_replace_string' => [
        '__DOMAIN__' => env('domain', 'http://www.dingde.vip'),
        '__STATIC__' => env('static_path', '/static'),
        '__ADMIN__' => env('resource_path', 'http://admin.dingde.vip'),
    ],
    //模版布局
    'layout_on' => true,
    'view_path' => app_path() . '/view/'
];
