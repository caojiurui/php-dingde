<?php

namespace app\index\controller;

use app\BaseController;
use app\Request;
use think\View;

class MessageController extends IndexBaseController
{

    public function index()
    {
        return $this->fetch();
    }

}
