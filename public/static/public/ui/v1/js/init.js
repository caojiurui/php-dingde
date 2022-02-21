define(function (require, exports, module) {
    require('effects/font-awesome/css/font-awesome.min.css');
    var common = require('common');   			//全局库
    if (IsMobile) {
        require.async('effects/include/ini_mobile');
    } else {
        require.async('effects/include/ini');   			//系统功能
    }
    require('tem/js/own');			            //模板JS文件
});