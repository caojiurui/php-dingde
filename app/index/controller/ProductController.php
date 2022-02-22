<?php

namespace app\index\controller;

use app\BaseController;
use app\Request;
use think\View;

class ProductController extends IndexBaseController
{

    public function __construct()
    {
        parent::initialize();
        $this->met_module = "3";
    }

    public function index()
    {
        $this->assign([
            'classnow' => "3",
        ]);
        return $this->fetch();
    }

    public function showproduct()
    {
        $this->assign([
            'classnow' => "66",
        ]);
        return $this->fetch();
    }

}
