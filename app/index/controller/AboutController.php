<?php

namespace app\index\controller;

use think\App;
use think\View;

class AboutController extends IndexBaseController
{

    public function __construct()
    {
        parent::initialize();
        $this->met_module = "1";
    }

    public function index()
    {
        $this->assign([
            'classnow' => "19"
        ]);
        return $this->fetch();
    }

    public function about2()
    {
        $this->assign([
            'classnow' => "70"
        ]);
        return $this->fetch();
    }

}
