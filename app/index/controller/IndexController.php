<?php

namespace app\index\controller;

use app\BaseController;
use app\Request;
use think\View;

class IndexController extends IndexBaseController
{
    public function index()
    {
        return $this->fetch();
    }

}
