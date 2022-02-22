<?php

namespace app\index\controller;

use app\BaseController;
use app\Request;
use think\View;

class LaboratoryController extends IndexBaseController
{

    public function __construct()
    {
        parent::initialize();
        $this->met_module = "5";
    }

    public function index()
    {
        $this->assign([
            'classnow' => "75",
        ]);
        return $this->fetch();
    }

    public function reports()
    {
        $this->assign([
            'classnow' => "76",
        ]);
        return $this->fetch();
    }

}
