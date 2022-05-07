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
            'classnow' => "19",
            'introduceInfo1' => '公司坐落于宜兴市和桥镇，一个以制造业为主导的城镇。如今，鼎德公司正在大力发展导电纤维产品，配备国内先进的有机复合导电生产设备以及拥有丰富经验的一流工程师和技术人员，为我们的客户稳定地生产优质产品。我们的产品达到IS09001标准并可通过SGS、ITS等机构的检测。',
            'introduceInfo2' => $this->companyInfo['name'] . '是一家集生产、贸易和服务于一体的综合性公司，坚持“质量为本，客户第一”的企业理念，热诚接待与服务每一位国内外新老客户。欢迎来电咨询、洽谈及研发合作！'
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
