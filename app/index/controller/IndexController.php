<?php

namespace app\index\controller;

use app\BaseController;
use app\index\model\Classify;
use app\index\model\Product;
use app\Request;
use think\View;

class IndexController extends IndexBaseController
{
    public function __construct()
    {
        parent::initialize();
        $this->met_module = "10001";
    }

    public function index()
    {
        $this->assign([
            'classnow' => "10001",
            'classifyList' => Classify::select(),
            'productList' => Product::select()
        ]);
        return $this->fetch();
    }

}
