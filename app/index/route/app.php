<?php

use think\facade\Route;

Route::get('product/showproduct', 'product/showproduct');
Route::get('product/:classifyId', 'product/index');
Route::rule('message/sendEmail','message/sendEmail')->method('post');