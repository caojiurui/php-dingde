<?php

namespace app\index\controller;

use app\BaseController;
use app\Request;
use think\View;

class ProductController extends IndexBaseController
{

    public function index()
    {
        return $this->fetch();
    }

    public function showproduct()
    {
        return $this->fetch();
    }

}
