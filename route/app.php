<?php
use think\facade\Route;

Route::miss(function() {    //MISS·��
    return '404 Not Found!';
});