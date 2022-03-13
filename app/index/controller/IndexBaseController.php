<?php
/**
 * 前台基类
 */

declare (strict_types=1);

namespace app\index\controller;

use app\index\model\Classify;
use Exception;
use app\BaseController;
use think\View;

class IndexBaseController extends BaseController
{

    /**
     * 视图变量
     */
    protected View $view;

    //前端使用，可忽略
    protected $met_module = "";     //当前页面所属模块
    protected $id = "";             //当前页面ID（仅详情页有）

    public function __construct()
    {
        $this->initialize();
    }

    // 初始化
    protected function initialize()
    {
        parent::initialize();
        // 初始化view
        $this->view = app()->make(View::class);
    }

    /**
     * 模板赋值
     * @param $name
     * @param null $value
     * @return View
     */
    protected function assign($name, $value = null): View
    {
        return $this->view->assign($name, $value);
    }

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
            'navbar' => $this->getNavbarArray(),
            'lang' => 'cn',
            'met_module' => $this->met_module,
            'id' => $this->id,
        ]);
        return $this->view->fetch($template, $vars);
    }

    protected function getNavbarArray()
    {
        return [
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
                        'key' => 'about',
                        'name' => '公司简介',
                        'href' => '/index/about',
                    ],
                    [
                        'key' => 'about/about2',
                        'name' => '企业文化',
                        'href' => '/index/about/about2',
                    ]
                ]
            ], [
                'key' => 'product',
                'name' => '导电纤维产品',
                'href' => '/index/product',
                'children' => Classify::select()->each(function ($item, $key) {
                    $item['key'] = 'product/' . $item['id'];
                    $item['href'] = '/index/product/' . $item['id'];
                })
            ], [
                'key' => 'laboratory',
                'name' => '实验检测',
                'href' => '/index/laboratory',
                'children' => [
                    [
                        'key' => 'laboratory',
                        'name' => '实验室',
                        'href' => '/index/laboratory',
                    ],
                    [
                        'key' => 'laboratory/reports',
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
}
