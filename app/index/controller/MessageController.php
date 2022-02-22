<?php

namespace app\index\controller;

use app\BaseController;
use app\Request;
use think\View;

class MessageController extends IndexBaseController
{

    public function __construct()
    {
        parent::initialize();
        $this->met_module = "7";
    }

    public function index()
    {
        $this->assign([
            'classnow' => "25",
        ]);
        return $this->fetch();
    }

}
