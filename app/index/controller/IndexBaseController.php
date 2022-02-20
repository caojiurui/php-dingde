<?php
/**
 * 前台基类
 */

declare (strict_types=1);

namespace app\index\controller;

use Exception;
use app\BaseController;
use think\Model;
use think\View;

class IndexBaseController extends BaseController
{

    /**
     * 渲染模板
     * @param string $template
     * @param array $vars
     * @return string
     * @throws Exception
     */
    protected function fetch(string $template = '', array $vars = []): string
    {
        // 赋值后台变量
        $this->assign([
            'navbar' => $this->navbar
        ]);
        return $this->view->fetch($template, $vars);
    }

    private $navbar = [
        [
            'key' => 'index',
            'name' => '首页',
            'href' => '/index/index',
        ],
        [
            'key' => 'about',
            'name' => '关于我们',
            'href' => '/index/about',
            'children' => [
                [
                    'key' => 'index/about',
                    'name' => '公司简介',
                    'href' => '/index/about',
                ],
                [
                    'key' => 'index/about/about2',
                    'name' => '企业文化',
                    'href' => '/index/about/about2',
                ]
            ]
        ], [
            'key' => 'product',
            'name' => '导电纤维产品',
            'href' => '/index/product',
            'children' => [
                [
                    'key' => 'index/product',
                    'name' => '导电纱线 长丝',
                    'href' => '/index/product',
                ],
                [
                    'key' => 'index/product/product2',
                    'name' => '复合纱',
                    'href' => '/index/product/product2',
                ]
            ]
        ], [
            'key' => 'laboratory',
            'name' => '实验检测',
            'href' => '/index/laboratory',
            'children' => [
                [
                    'key' => 'index/laboratory',
                    'name' => '实验室',
                    'href' => '/index/laboratory',
                ],
                [
                    'key' => 'index/laboratory/reports',
                    'name' => '实验报告',
                    'href' => '/index/laboratory/reports',
                ]
            ]
        ], [
            'key' => 'message',
            'name' => '联系我们',
            'href' => '/index/message',
        ]
    ];
}
