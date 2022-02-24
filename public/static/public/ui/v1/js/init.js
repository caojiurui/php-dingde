/*
    采用SeaJS模块化架构，本文件为入口模块。
    require        |用于载入JS或CSS文件,可用已配置路径"tem"(当前模板目录路径)
    -------------------------------
    已默认载入Jquery 1.11.1
    -------------------------------
    可用全局变量：
    met_weburl     |网站网址
    lang           |当前语言
    classnow       |当前页面所属栏目ID
    id             |当前页面ID（仅详情页有）
    met_module     |当前页面所属模块
    met_skin_user  |当前所用模板目录名称
    MetpageType    |页面位置，1为首页，2为列表页，3为详情页
    -------------------------------
    var common = require('common'); //公用库，加载后才支持JQuery以及一些方法
    common.listpun(整体元素,列表元素,最小宽度);//自适应排版
    common.metHeight(元素);//等高
*/
define(function (require, exports, module) {
    require('effects/font-awesome/css/font-awesome.min.css');
    var common = require('common');   			//全局库
    if (IsMobile) {
        require.async('effects/include/ini_mobile');
    } else {
        require.async('effects/include/ini');   			//系统功能
    }
    require('tem/js/own');			            //模板JS文件

    //留言板提交
    $('#messageForm').submit(function (event) {
        if (!$('[name="姓名"]').val()) {
            alert("请填写您的姓名");
            return false;
        } else if (!$('[name="留言内容"]').val()) {
            alert("请填写留言内容");
            return false;
        } else if (!$('[name="联系电话"]').val() && !$('[name="电子邮箱"]').val()) {
            alert("请任意提供一个联系方式");
            return false;
        }
        event.preventDefault();
        var form = $(this);
        var formData = new FormData(this);
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: formData,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json', //返回数据形式json
            success: function (data) {
                alert("留言成功")
            }
        })
    });
});