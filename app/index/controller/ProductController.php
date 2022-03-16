<?php

namespace app\index\controller;

use app\BaseController;
use app\index\model\Classify;
use app\index\model\Product;
use app\Request;
use think\View;


class ProductController extends IndexBaseController
{
    public function __construct()
    {
        parent::initialize();
        $this->met_module = "3";
    }

    public function index($classifyId = 66)
    {
        $this->assign([
            'classnow' => $classifyId,
            'classify' => Classify::findOrEmpty($classifyId),
            'list' => Product::where('classify_id', $classifyId)->order('weigh', 'desc')->paginate([
                'list_rows' => isMobile() ? 8 : 9,
                'var_page' => 'page',
            ])
        ]);
        return $this->fetch();
    }

    public function showproduct($id)
    {
        $this->id = $id;
        $product = Product::findOrEmpty($id);
        $classifyId = $product['classify_id'];
        $data = [
            'classnow' => $classifyId,
            'product' => $product,
            'prevItem' => Product::findOrEmpty((int)Product::where('id', '<', $id)->max('id')),
            'nextItem' => Product::findOrEmpty((int)Product::where('id', '>', $id)->min('id')),
        ];
        if (isMobile()) {
            $data['maylikeProducts'] =
                Product::whereRaw("classify_id=:classifyId and id<>:id", ['classifyId' => $classifyId, 'id' => $id])
                    ->order('weigh', 'desc')
                    ->limit(6)
                    ->select();
        }
        $this->assign($data);
        return $this->fetch();
    }

}
