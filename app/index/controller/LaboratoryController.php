<?php

namespace app\index\controller;

use app\BaseController;
use app\Request;
use think\View;

class LaboratoryController extends IndexBaseController
{

    public function index()
    {
        return $this->fetch();
    }

    public function reports()
    {
        return $this->fetch();
    }

}
