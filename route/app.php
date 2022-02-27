<?php
use think\facade\Route;

Route::miss(function() {    //MISS路由
    return '404 Not Found!';
});